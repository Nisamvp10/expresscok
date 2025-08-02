<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0"><?= $page ?? '' ?></h1>
            <div>
                <a href="<?= base_url('appointments') ?>" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Appoinments
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-4">
    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100 transition-all hover:shadow-md">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Appointments</p>
                <h3 class="text-2xl font-semibold mt-1"><?= $totalAppintments ?></h3>
                <div class="flex items-center mt-2">
                    <span class="mr-1 text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up "><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline><polyline points="16 7 22 7 22 13"></polyline></svg>
                    </span>
                    <span class="text-sm text-green-500">+ <?=$growth;?> %</span>
                    <span class="text-xs text-gray-400 ml-1">from last period</span>
                </div>
            </div>
            <div class="p-3 rounded-full bg-blue-50">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar text-blue-500"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100 transition-all hover:shadow-md">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Clients</p>
                <h3 class="text-2xl font-semibold mt-1"><?= $totalClients ?></h3>
                <div class="flex items-center mt-2">
                    <span class="mr-1 text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up "><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline><polyline points="16 7 22 7 22 13"></polyline></svg>
                    </span>
                    <!-- <span class="text-sm text-green-500">+12.5%</span>
                    <span class="text-xs text-gray-400 ml-1">from last period</span> -->
                </div>
            </div>
            <div class="p-3 rounded-full bg-blue-50">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users text-green-500"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100 transition-all hover:shadow-md">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Revenue</p>
                <h3 class="text-2xl font-semibold mt-1"><?= $totalRevenue ?></h3>
                <div class="flex items-center mt-2">
                    <span class="mr-1 text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-dollar-sign text-purple-500"><line x1="12" x2="12" y1="2" y2="22"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                    </span>
                    <span class="text-sm text-green-500">+12.5%</span>
                    <span class="text-xs text-gray-400 ml-1">from last period</span>
                </div>
            </div>
            <div class="p-3 rounded-full bg-blue-50">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-dollar-sign text-purple-500"><line x1="12" x2="12" y1="2" y2="22"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
            </div>
        </div>
    </div>
    
   
</div>

<!-- Task Distribution & Recent Tasks -->
<div class="row">
    <!-- Priority Distribution Chart -->
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Tasks by Priority</h5>
            </div>
            <div class="card-body">
                <div id="priority-chart" style="height: 300px;"></div>
            </div>
        </div>
    </div>
    
    <!-- Status Distribution Chart -->
    <div class="col-lg-4">
         <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Recent Notifications</h5>
                <a href="<?= base_url('dashboard/notifications') ?>" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body p-0">
                <?php if (empty($unreadNotifications)): ?>
                    <div class="text-center py-4">
                        <i class="bi bi-bell-slash text-muted" style="font-size: 2rem;"></i>
                        <p class="mb-0 mt-2">No new notifications</p>
                    </div>
                <?php else: ?>
                    <div class="list-group list-group-flush">
                        <?php foreach ($unreadNotifications as $notification): ?>
                            <a href="<?= base_url('dashboard/notifications/mark-as-read/' . $notification['id']) ?>" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Task Notification</h6>
                                    <small><?= timeAgo($notification['created_at']) ?></small>
                                </div>
                                <p class="mb-1"><?= $notification['message'] ?></p>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Tasks -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Today's Appointments</h5>
                <a href="<?= base_url('appointments') ?>" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Branch</th>
                                <th>Staff</th>
                                <th>Status</th>
                                <th>Service</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($todayAppointments)): ?>
                                <tr>
                                    <td colspan="5" class="text-center py-4">No Appoinments found</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($todayAppointments as $appintment):  ?>
                                    <tr>
                                        <td>
                                            <a href="<?= base_url('dashboard/tasks/view/') ?>" class="text-decoration-none text-dark">
                                                <?= $appintment['name'] ?>
                                            </a>
                                        </td>
                                        <td><?= $appintment['branch_name'] ?></td>
                                        <td>
                                           <?= $appintment['staff_name'] ?>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill 
                                                <?= $appintment['booking_status'] == 1 ? 'bg-info' : 
                                                   ($appintment['booking_status'] == 2 ? 'bg-primary' : ($appintment['booking_status'] == 3 ?'bg-warning' : 'bg-danger')) ?>">
                                                   <?php 
                                                   $status = $appintment['booking_status'];
                                                   if($status == 1 ){
                                                        $statusText = "Confirm";
                                                   }else if($status == 2) {
                                                     $statusText = "Completed";
                                                   }elseif($status == 3) {
                                                    $statusText = "Pending";
                                                   }else{
                                                    $statusText = "Declined";
                                                   }?>
                                                <?= ucfirst(str_replace('_', ' ', $statusText)) ?>
                                            </span>
                                        </td>
                                        <td><?=$appintment['specialties']; ?></td>
                                        <td> <a href="<?=site_url('appointments/edit/'.encryptor($appintment['id']));?>">Edit</a> </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- My Tasks & Notifications -->
    
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  
</script>
<?= $this->endSection() ?>

<?php
// Helper function to format time ago

?>