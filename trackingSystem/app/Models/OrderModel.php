<?php
namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model {
    protected $table = 'orders';
    protected $allowedFields = ['tracking_id','customer_name','email','phone','address','description','estimated_date'];
    protected $primaryKey = 'id';

    public function getOrderWithTracking($orderId) {
        $order = $this->db->table('orders')
         ->select('orders.*')
         ->where('orders.id', $orderId)
         ->get()
         ->getResult();
        if(!$order) {
            return null;
        }

        $builder = $this->db->table( 'order_tracking');
        $builder->where('order_id',$orderId);
        $builder->orderBy('id','desc');
        $tracking = $builder->get()->getResultArray();

        $order['timeline'] = $tracking;

        return $order;
    }
}
