<?php
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\OrderModel;
use App\Models\OrderTrackingModel;
use Config\Services;
class TrackingController extends Controller {
    protected $orderModel;
    protected $OrderTrackingModel;
    function __construct() {
        $this->orderModel = new OrderModel();
        $this->OrderTrackingModel = new OrderTrackingModel();
    }

     public function clearCache()
    {
        $cache = Services::cache();

        if ($cache->clean()) {
            return $this->response->setJSON(['status' => 200, 'message' => 'Cache cleared successfully']);
        } else {
            return $this->response->setJSON(['status' => 500, 'message' => 'Failed to clear cache']);
        }
    }

    public function index() {

        $page = "Orders";
        $data = '';
        return view('admin/tracking/index',compact('page', 'data'));
    }

    function create() {
         $page = "Add new Order";
        $data = '';
        return view('admin/tracking/create',compact('page', 'data'));
    }

    public function store() {
        $validation = \Config\Services::validation();

        $rules = [
            'customer_name' => 'required|min_length[3]',
            'tracking_id'   => 'required|numeric|min_length[5]'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors()
            ]);
        }

        $orderModel = new OrderModel();
        $data = [
            'customer_name'   => $this->request->getPost('customer_name'),
            'email'           => $this->request->getPost('email'),
            'phone'           => $this->request->getPost('phone'),
            'address'         => $this->request->getPost('address'),
            'description'     => $this->request->getPost('description'),
            'tracking_id'     => $this->request->getPost('tracking_id'),
            'estimated_date'  => $this->request->getPost('estimated_date')
        ];

        $id = $orderModel->insert($data);

        return $this->response->setJSON([
            'success' => true,
            'order_id' => $id,
            'message' => 'New Customer Adedd'
        ]);
            
    }
    public function search()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid Request']);
        }
        if(!haspermission(session('user_data')['role'],'view_tracking')) {
             return $this->response->setJSON(['success' => true, 'orders'=>[], 'message' => 'Permission Denied']);
        }

        $search = $this->request->getGet('search');
        $filter = $this->request->getGet('filer') ?? 0;
        
        // if (!empty($filter) && $filter !== "all") {
        //     $branches = $this->orderModel->where('status', $filter);
        // }     
        $orders = $this->orderModel->orderBy('id', 'DESC')->findAll(); 
        foreach ($orders as &$order) {
            $order['encrypted_id'] = encryptor($order['id']);
        }
        // Filter if search term provided
        if ($search) {
            $orders = array_filter($orders, function ($order) use ($search) {
                $search = strtolower($search);
                return strpos(strtolower($order['customer_name']), $search) !== false 
                    || strpos(strtolower($order['tracking_id']), $search) !== false;
            });
        }
        return $this->response->setJSON([
            'success' => true,
            'orders' => array_values($orders)  
        ]);
    }

    function getOrder() {

        if(!haspermission(session('user_data')['role'],'view_tracking')) {
             return $this->response->setJSON(['success' => true, 'orders'=>[], 'message' => 'Permission Denied']);
        }

        if(!$this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'message' => "Invalid Request"]);
        }
        $valid[]  = ['status' => 404, 'msg' => []];
        $orderId = $this->request->getPost('orderId');
        if($orderId) {
            $mergedTimeline = [];
            $orderId = decryptor($orderId);
            $order = $this->orderModel->find($orderId);
           $trakingId = $order['tracking_id'] ?? '';
            // api Tracking 
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
                "order_id":"'.$trakingId.'"
                
                }',
                ));
                
                $response = curl_exec($curl);
                curl_close($curl);
               // $api = json_decode($response);
                
            $timeline = $this->OrderTrackingModel->where('order_id',$orderId)->orderBy('track_date','desc')->findAll();
                foreach($timeline as $items) {
                    $mergedTimeline[] = [
                        'location' => $items['location'],
                        'remark'   => $items['remark'],
                        'track_date' => $items['track_date'],
                        'source'  => 'db',
                        'id' => $items['id']
                    ];
                }

                $apiTracking = json_decode(json: $response); // object
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

            if($order) {
                $order['timeline'] = $mergedTimeline;
            }
            if($apiTracking) {
                $order['apitrack'] = $apiTracking;
            }
           
            $valid['results'] = $order;
            $valid['status'] = 200;
        }else{
            $valid['msg'] ="Invalid OrderId Pls try again ";
        }

        return $this->response->setJSON($valid);
    }

    public function statusSave() {
        if(!haspermission(session('user_data')['role'],'view_tracking')) {
             return $this->response->setJSON(['success' => true, 'orders'=>[], 'message' => 'Permission Denied']);
        }
        $validate [] = ['status' => false ,'message' => [] ];

        if(!$this->request->isAJAX()) {
            $validate['msg'] = 'Invalid Request';
        }else{
            $rules = [
                 'orderStatus' => 'required',
                 'orderLocation' => 'required|min_length[2]',
                 'orderRemark'  => 'required|min_length[3]',
            ];

            if(!$this->validate($rules)) {
                $validate['errors'] = $this->validator->getErrors();
            }else{
                $status = $this->request->getPost('orderStatus');
                $location = $this->request->getPost('orderLocation');
                $remark = $this->request->getPost('orderRemark');

                $date = $this->request->getPost('orderdate');
                $time = $this->request->getPost('ordertime');
                $datetime = date('Y-m-d H:i:s', strtotime("$date $time"));

                $data = [
                    'order_id' => $this->request->getPost('orderId'),
                    'track_date' => $datetime,
                    'location' => $location,
                    'status' => $status ?? '',
                    'remark' => $remark
                ];

                if($this->OrderTrackingModel->insert($data)) {
                    $validate['status'] = true;
                    $validate['orderId'] = encryptor( $this->request->getPost('orderId'));
                    $validate['message'] = "Status Updated";
                }
            }
        }
        return  $this->response->setJSON(body: $validate);
    }

    function spotUpdate() {

        $trackId    = $this->request->getPost('track_id');
        $location   = $this->request->getPost('location');
        $remark     = $this->request->getPost('remark');
        $status     = $this->request->getPost('orderStatus');

        $date = $this->request->getPost('track_date');
        $time = $this->request->getPost('ordertime');
        $trackDate = date('Y-m-d H:i:s', strtotime("$date $time"));

       
        $this->OrderTrackingModel->update($trackId, [
            'location'    => $location,
            'remark'      => $remark,
            'status'      => $status,
            'track_date'  => $trackDate
        ]);

        return $this->response->setJSON([
            'status' => 200,
            'data' => [
                'location' => $location,
                'remark' => $remark,
                'track_date' => $trackDate
            ]
        ]);
    }

    public function deleteTrackSpot()
    {
        $id = $this->request->getPost('id');
        $deleted = $this->OrderTrackingModel->delete($id);

        if ($deleted) {
            return $this->response->setJSON(['status' => 200, 'message' => 'Deleted successfully']);
        } else {
            return $this->response->setJSON(['status' => 500, 'message' => 'Delete failed']);
        }
    }

}