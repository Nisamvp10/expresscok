<?php
namespace App\Models;

use CodeIgniter\Model;

class OrderTrackingModel extends Model
{
    protected $table = 'order_tracking';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'track_date', 'location', 'status', 'remark'];

    
}
