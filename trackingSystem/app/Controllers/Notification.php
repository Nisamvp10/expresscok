<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\NotificationModel;

class Notification extends Controller{
    function notifications(){
        $notifications = new NotificationModel();

        $role = session('user_data')['role'];
        
        if ($role != 1) 
        {
            $notify = ($role == 2 ? $notifications->getBranchNotifications()  : ($role ==5 ? $notifications->getStaffNotifications() : NULL) );
        }else
        {
            $notify = $notifications->where('is_read',0)->findAll();
        }     

       
        return $this->response->setJSON([
            'unread_count' => count($notify) ?? 0
        ]);
    }
    function load() {
        $notifications = new NotificationModel();
        $notify = $notifications->getBranchNotifications();

        return $this->response->setJSON([
            'notifications' => $notify,
        ]);

    }
    function notify($staffId,$name){
        $notificationModel = new NotificationModel();
        $notificationModel->insert([
            'user_id' => $staffId,
            'type'    => 'appointment',
            'title'   => 'New Appointment Booked',
            'message' => 'A new appointment has been booked by .'.$name
        ]);
    }
}