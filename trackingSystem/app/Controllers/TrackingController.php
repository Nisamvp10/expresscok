<?php
namespace App\Controllers;
use App\Controller;
use App\Models\OrderModel;
use App\Models\OrderTrackingModel;

class TrackingController extends BaseController {

    public function trackingInfo($trackingId) {
        $orderModel = new OrderModel();
        $OrderTrackingModel = new OrderTrackingModel();
        $orderTimeline = [];
        $orderInfos = [];

        $order = $orderModel->where('tracking_id',$trackingId)->first();
        if($order) {

            $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://shipway.in/api/getOrderShipmentDetails',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => '',
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                "username":"JOSEPH",
                "password":"3e7e37ba6b4918724360639e8e94e14f",
                "order_id":"'.$trackingId.'"
                
                }',
                ));
                
                $response = curl_exec($curl);
                curl_close($curl);
                $apiTracking = json_decode($response);

            $orderInfo = $OrderTrackingModel->where('order_id',$order['id'])->orderBy('id desc')->findAll();

            foreach($orderInfo as $info) {
                $orderTimeline[] = [
                    'location' => $info['location'],
                    'remark'   => $info['remark'],
                    'track_date' => $info['track_date'],
                    'source'  => 'db',
                    'id' => $info['id']
                ];
            }

            if (isset($apiTracking->response->scan) && is_array($apiTracking->response->scan)) {
                foreach ($apiTracking->response->scan as $api) {
                    $mergedTimeline[] = [
                        'location'    => $api->location,
                        'remark'      => $api->status_detail,
                        'track_date'  => $api->time,
                        'source'      => 'api',
                    ];
                }
            }

             usort($mergedTimeline, callback: function ($a, $b) {
                return strtotime($b['track_date']) - strtotime($a['track_date']);
            });
            

            $order['tileline'] = $mergedTimeline;
            $order['orderInfo'] = $apiTracking;
        }
        
      return $order;


    }

}