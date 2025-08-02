<?php
namespace App\Models;
use CodeIgniter\Model;

class BookedSpecialtiesModel extends Model {

    protected $table = "booked_specialties";
    protected $allowedFields = ['booking_id','specialties_id'];
    protected $primaryKey = 'id';
    

    function getBkspecialites($bookingid) {

        $builder = $this->db->table('booked_specialties as b')
            ->select('s.name,s.id')
            ->join('services as s','s.id = b.specialties_id')
            ->where('b.booking_id',$bookingid);
        return $query = $builder->get()->getResultArray();
    }
}