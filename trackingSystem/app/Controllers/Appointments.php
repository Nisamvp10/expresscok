<?php
namespace App\Controllers;
use App\Models\BookedSpecialtiesModel;
use CodeIgniter\Controller;
use App\Models\ServiceModel;
use App\Models\BranchesModel;
use App\Models\UserModel;
use App\Models\AppointmentModel;
use App\Controllers\Notification;
use App\Models\ClientsModel;
use Config\Database;

class Appointments extends Controller {
    protected $serviceModel;
    protected $branchModel;
    protected $userModel;
    protected $appointmentModel;
    protected $clientsModel;
    protected $role;
    protected $db;
    protected $bookedSpecialtiesModel;
    function __construct() {

        $this->db = Database::connect();
        $this->serviceModel = new ServiceModel();
        $this->branchModel = new BranchesModel();
        $this->userModel =  new UserModel();
        $this->appointmentModel = new AppointmentModel();
        $this->clientsModel =  new ClientsModel();
        $this->bookedSpecialtiesModel = new BookedSpecialtiesModel();
        $this->role = session('user_data')['role'];
    }

    function index () {
        $page = (haspermission('','view_appointments') ? "Appointments" : lang('Custom.accessDenied'));
        return view('admin/appointments/index',compact('page'));
    }

    function booking () {
        $page = (haspermission('','create_appointment') ? "Create Appointment" : lang('Custom.accessDenied'));
        $staff = [
            'booking_status' => 1
        ];
        if ($this->role == 2) {
            $staff['store_id'] = getStore();
        }
        if ($this->role == 5) {
            $staff['id'] = session('user_data')['id'];
        }
        $usersStaff  = $this->userModel->select('id,name')->where($staff)->findAll();
        $branches = $this->branchModel->where('status','active')->findAll();
        $services = $this->serviceModel->where('is_active' , 1)->findAll();
        $specialiesServices =[];
        return view('admin/appointments/booking',compact('page','services','branches','usersStaff','specialiesServices'));

    }
    public function edit($id) {
        
        $page = (haspermission('','create_appointment') ? "Create Appointment" : lang('Custom.accessDenied'));
        if($id) {
            $id = decryptor($id);
            $db = \Config\Database::connect();

            $builder = $this->db->table('appointments a') 
            ->select('a.price,a.id,a.booking_status,c.phone,a.booking_date, a.time, a.note,c.name ,s.id as staff_id,b.id as branch')
            ->select('GROUP_CONCAT(sr.name ORDER BY sr.name SEPARATOR ", ") as specialties')
            ->join('clients as c', 'a.client_id = c.id')
            ->join('users as s', 'a.staff_id = s.id')
            ->join('booked_specialties as bs','a.id= bs.booking_id')
            ->join('services as sr','bs.specialties_id= sr.id')
            ->join('branches as b','s.store_id= b.id')
            ->where('a.id',$id)
            ->groupBy('a.id')
            ->get()->getRow();
            $data = $builder;//$this->appointmentModel->getApp('id',$id)->first();;

            $specialiesServices = $this->bookedSpecialtiesModel->getBkspecialites($id);
           
        }
        $staff = [
            'booking_status' => 1
        ];
        if ($this->role == 2) {
            $staff['store_id'] = getStore();
        }
        if ($this->role == 5) {
            $staff['id'] = session('user_data')['id'];
        }
        $usersStaff  = $this->userModel->select('id,name')->where($staff)->findAll();
        $branches = $this->branchModel->where('status','active')->findAll();
        $services = $this->serviceModel->where('is_active' , 1)->findAll();
        return view('admin/appointments/booking',compact('page','services','branches','usersStaff','data','specialiesServices'));
    }
    function save() {

        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => lang('Custom.invalidRequest')
            ]);
        }

        if(!hasPermission('','create_appointment')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => lang('Custom.accessDenied')
            ]);
        }
        $notifications = new Notification();
        $bookedSpecialtiesModel = new BookedSpecialtiesModel();

        $rules = [
            'phone' => 'required|min_length[5]|max_length[100]',
            'booking_date' => 'required',
            'booking_time' => 'required',
            'staff' => 'required',
            'booking_status' => 'required',
            'specialties' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $this->validator->getErrors()
            ]);
        }
        $phone = $this->request->getPost('phone');
        $appointmentId = decryptor($this->request->getPost('appointmentId'));
        $client = $this->clientsModel->select('id,name')->where('phone',$phone)->get()->getRow();

        $validSuccess = false;
        $validMsg = '';

        if (!empty($client->id)) {

            $price = 0;
            $duration = 0;
            $bookedSpecialties = [];
            $updateSpecialities = [];
            $selectedServices = $this->request->getPost('specialties');
            foreach ($selectedServices as $service) {
                
                $serviceResult = $this->serviceModel->select('price,duration')->where('id',$service)->get()->getRow();
                $price += $serviceResult->price;
                $duration += $serviceResult->duration;
                $bookedSpecialties[] =['specialties_id' => $service];

            }

            $data = [
                'client_id' => $client->id,
                'staff_id'  => $this->request->getPost('staff'),
                'duration'  => $duration,
                'price'     => $price,
                'booking_status' => $this->request->getPost('booking_status'),
                'booking_date' => date('Y-m-d'),strtotime($this->request->getPost('booking_date')),
                'time'      => $this->request->getPost('booking_time'),
                'note'      => $this->request->getPost('notes'),
            ];

            if($appointmentId) {
                //update 
                
                $existing = $this->bookedSpecialtiesModel->where('booking_id',$appointmentId)->findAll();
                $existingIds = array_column($existing,'specialties_id');

                $newIds = array_column($bookedSpecialties,'specialties_id');
                $toDelete = array_diff($existingIds, $newIds);
                
                if (!empty($toDelete)) {
                    $this->bookedSpecialtiesModel
                        ->where('booking_id', $appointmentId)
                        ->whereIn('specialties_id', $toDelete)
                        ->delete();
                }
                $toInsert = array_diff($newIds, $existingIds);

                foreach ($toInsert as $specialtyId) {
                    $this->bookedSpecialtiesModel->insert([
                        'booking_id'     => $appointmentId,
                        'specialties_id' => $specialtyId
                    ]);
                }

                if ($this->appointmentModel->update($appointmentId,$data)) {
                    $validSuccess = true;
                    $validMsg = "Updated Successfully";
                }else {
                    $validMsg = "Somthing went wrong Please try agin later";
                }

            }else {
                if ($lastid = $this->appointmentModel->insert($data)) {
                    $notifications->notify($this->request->getPost('staff'),$client->name);
                    foreach ($bookedSpecialties as &$sp) {
                        $sp['booking_id'] = $lastid;
                    }
                    
                    $bookedSpecialtiesModel->insertBatch($bookedSpecialties);

                    $validSuccess = true;
                    $validMsg = "Booking has been confirmed";
                }else{
                    $validMsg = lang('Custom.tryAgain');
                }
            }
            
        }else {
            $validMsg = "Please Choose Valid Client";
        }

        return $this->response->setJSON(['success' => $validSuccess,'message' => $validMsg]);
    }

public function load()
{
    if(!$this->request->isAJAX()) {
        //return $this->response->setJSON(['success' => false,'message'=> lang('Custom.invalidrequest')]);
    }
    $start = $this->request->getGet('start'); // example: 2025-04-27T00:00:00+05:30
    $end   = $this->request->getGet('end');   // example: 2025-06-08T00:00:00+05:30

    // Optional: convert to standard date format
    $startDate = date('Y-m-d', strtotime($start));
    $endDate   = date('Y-m-d', strtotime($end));
    $appointments = $this->appointmentModel->getAppointments();
    //echo $this->appointmentModel->getLastQuery(); exit();

    $events = [];

    foreach ($appointments as $appt) {
        $events[] = [
            'title' => $appt['specialties'],//. " - " . $appt['client_name'],
            'client' => $appt['name'],
            'start' => $appt['booking_date'] . 'T' . $appt['time'],
            'time' => date("g:i A",strtotime($appt['time'])) ,
            'end'   => $appt['booking_date'] . 'T' ,//. $appt['end_time'], // optional
            'branch' => $appt['branch_name'],
            'extendedProps' => [
                'staff' => $appt['staff_name'],
                'status' => $appt['booking_status'],//($appt['booking_status'] == 1 ? 'Active' : ($appt['booking_status'] == 2 ? 'Completed' : 'Pending')),
            ]
        ];
    }
    return $this->response->setJSON($events);
}

} 
