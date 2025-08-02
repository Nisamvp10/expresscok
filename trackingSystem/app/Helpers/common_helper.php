<?php

if (!function_exists('updateImage')) {
    function updateImage($url)
    {
       $url =  str_replace(base_url(), '', $url);
       
        if (file_exists($url)) {
            unlink($url);
        }
    }
}

if(!function_exists('getStore')) {
    function getStore() {
        $db = \Config\Database::connect();
        $userRole = session('user_data')['role'];
        $userId = session('user_data')['id'];
        $branchId = '';

        if($userRole != 1) {

            $queryStore = $db->table('users as u')
                    ->select('u.store_id')
                    ->where('id',$userId)->get()->getRow();
            $queryBranch = $db->table('branches')
                    ->select('id')
                    ->where('id',$queryStore->store_id)->get()->getRow();
            
            $branchId =  $queryBranch->id;
        
        }                
        return $branchId ?? false;
    }
}

if (!function_exists('timeAgo')) {
    function timeAgo($datetime, $full = false)
    {
        $timezone = new DateTimeZone('Asia/Kolkata'); // ✅ Set your app's timezone

        $now = new DateTime('now', $timezone);
        $ago = new DateTime($datetime, $timezone);

        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $units = [
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        ];

        $result = [];
        foreach ($units as $k => $text) {
            if ($diff->$k) {
                $result[] = $diff->$k . ' ' . $text . ($diff->$k > 1 ? 's' : '');
            }
        }

        if (!$full) {
            $result = array_slice($result, 0, 1);
        }

        return $result ? implode(', ', $result) . ' ago' : 'just now';
    }

}
