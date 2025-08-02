<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
    <!-- titilebar -->
    <div class="flex items-center justify-between">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-0">
                <h1 class="h3 mb-0"><?= $page ?? '' ?></h1>
                <?php
                if(haspermission(session('user_data')['role'],'create_branch')) { ?>
                <div>
                    <a href="<?= base_url('admin/create/order') ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i> Add New Order
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div><!-- closee titilebar -->

    <!-- body -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden p-4">
        <div class="flex flex-col md:flex-row gap-4 mb-6">
    
            <!-- Column 1: Search Input -->
            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search text-gray-400">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
                </div>
                <input type="text" id="searchInput" placeholder="Search branch by name, or location..." class="pl-10 pr-3 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>
            
            <!-- Column 2: Status Dropdown -->
            <div class="w-full md:w-48">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-filter text-gray-400">
                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                    </svg>
                    </div>
                    <select id="filerStatus" class="pl-10 pr-3 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none">
                    <option value="all">Account Status</option>
                    <option value="0">Active</option>
                    <!-- <option value="on leave">On Leave</option> -->
                    <option value="1">Inactive</option>
                    </select>
                </div>
            </div>
            </div>
            <!-- table -->
             <div class="overflow-x-auto">
                <div id="clientsTable"></div>
            </div>
            <!-- close table -->
</div><!-- body -->
<?= view('modal/orderdetailmodal') ;?>
<?= $this->endSection(); ?>
<?= $this->section('scripts') ?>
    <script>
        $(document).ready(function() {

            function loadClients(search = '') {
                let filer = $('#filerStatus').val();
                $.ajax({
                    url: "<?= site_url('order/search') ?>",
                    type: "GET",
                    data: { search: search,filer:filer },
                    dataType: "json",
                    success: function(response) {
                        
                        if (response.success) {
                            renderTable(response.orders);
                        }
                    }
                });
            }

            function renderTable(orders){
                let html = '';

                if (orders.length === 0) {
                    html += `
                        <div class="text-center py-8">
                            <h3 class="text-lg font-medium text-gray-700">No Order found</h3>
                            <p class="text-gray-500 mt-1">Try adjusting your search</p>
                        </div>
                    `;
                }else{
                    html += `
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tracking Id</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estimate Date</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">description </th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                    `;
                    orders.forEach(order => {
              
                let joinedDate = new Date(order.estimated_date).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });

                        html += `
                            <tr class="hover:bg-gray-50">
                                <td class="px-2 py-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        ${order.customer_name ? 
                                           
                                            `<div class="h-9 w-9 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                                <span class="text-blue-600 font-medium">${order.customer_name.charAt(0)}</span>
                                            </div>`:  `<img class="h-9 w-9 rounded-full mr-3" src="${order.customer_name}" alt="${order.customer_name}">` 
                                        }
                                        <div class="text-sm font-medium text-gray-900">${order.customer_name}</div>
                                    </div>
                                </td>
                                <td class="px-2 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">${order.tracking_id}</div>
                                </td>
                                <td class="px-2 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">${joinedDate}</div>
                                </td>
                                 <td class="px-2 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">${order.description}</div>
                                </td>
                              
                             
                                <td class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium">
                                    <a data-id="${order.encrypted_id}" data-bs-toggle="modal"  data-bs-target="#orderModal" onclick="orderDetail(this)" class="text-blue-600 hover:text-blue-800 mr-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye "><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>
                                    <a href="<?=base_url('branches/edit/');?>${order.encrypted_id}" class="text-blue-600 hover:text-blue-800 mr-3">View</a>
                                </td>
                            </tr>
                        `;
                    });
                    

                    html += `</tbody></table>`;
                }
                $('#clientsTable').html(html);
            }
            loadClients();

            $('#searchInput').on('input',function(){
                let value = $(this).val();
                loadClients(value);
            })
            $('#filerStatus').on('change',function(){
                let value = $('#searchInput').val();
                loadClients(value);
            })
        });

        function orderDetail(e) {
            let orderId = $(e).data('id')
            if(orderId) {
                $.ajax({
                    method : 'POST',
                    url: '<?=base_url('order/order-info');?>',
                    data: {orderId: orderId},
                    dataType:'Json',
                    success:function(res) {
                       if(res.status == 200) {
                        renderOrder(res);
                       }
                    }
                })
            }
        }
        function renderOrder(order) {
        let html = '';
        let location = '';
        let lastStatus = '';
     
        if (order.results =='') {
            html += `
                <div class="text-center py-8">
                    <h3 class="text-lg font-medium text-gray-700">No Order found</h3>
                </div>
            `;
        } else {
              
           // $.each(order.results,function(i,result){
           
                result = order.results;
                 if (result.timeline && result.timeline.length > 0) {
                  const first = result.timeline[0];
                    location = first.location;
                    lastStatus = first.remark;
                }

                html += `
                    <div class="flex items-center justify-between p-6 border-b">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Order Details</h2>
                            <p class="text-gray-600">Tracking ID: #${result.tracking_id}</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button type="button" onclick="toggleTimeline()" class="p-2 hover:bg-gray-100 rounded-lg transition-colors" title="Toggle Timeline">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 20h9M16.5 3.5a2.12 2.12 0 013 3L7 19l-4 1 1-4z" />
                                </svg>
                            </button>
                            <button type="button" data-bs-dismiss="modal" class="p-2 hover:bg-gray-100 rounded-lg transition-colors" title="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M18 6L6 18M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="p-6 space-y-6">
                        <!-- Order Summary -->
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-gray-900">Order Summary</h3>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium border bg-orange-100 text-orange-800 border-orange-200">${lastStatus}</span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <p class="text-sm text-gray-600">Order Date</p>
                                    <p class="font-medium">${result.orderdate}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Estimated Delivery</p>
                                    <p class="font-medium">${result.estimated_date}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Current Location</p>
                                    <p class="font-medium">${location || 'N/A'}</p>
                                </div>
                            </div>
                        </div>

                  

                        <!-- Customer and Product Info -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="bg-white border rounded-lg p-4">
                                <div class="flex items-center mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <h3 class="font-semibold text-gray-900">Customer Information</h3>
                                </div>
                                <div class="space-y-2 text-sm">
                                    <p><span class="font-medium">Name:</span> ${result.customer_name}</p>
                                    <p><span class="font-medium">Email:</span> ${result.email}</p>
                                    <p><span class="font-medium">Phone:</span> ${result.phone}</p>
                                    <p><span class="font-medium">Address:</span> ${result.address}</p>
                                </div>
                            </div>

                            <div class="bg-white border rounded-lg p-4">
                                <div class="flex items-center mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 22V12"></path><path d="m3.3 7 8.7 5 8.7-5"></path><path d="m7.5 4.27 9 5.15"></path><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"></path></svg>
                                    <h3 class="font-semibold text-gray-900">Product Information</h3>
                                </div>
                                <div class="space-y-2 text-sm">
                                    <p><span class="font-medium">Description:</span> ${result.description}</p>
                                </div>
                            </div>
                        </div>


                        <!-- Order Timeline (Initially Hidden) -->
                        <div id="orderTimeline" class=" bg-white border rounded-lg p-4">
                            <h3 class="font-semibold text-gray-900 mb-2">Order Timeline</h3>
                            <ul class="space-y-2 text-sm">`;
                           if(result.timeline.length > 0) {
                                result.timeline.forEach(track => {
                                    let fullDateTime = track.track_date; // e.g., "2025-08-01 15:30:00"
                                    let [datePart, timePart] = fullDateTime.split(' ');
                                    
                                    html += `
                                    <li class="border-l-2 border-blue-500 pl-4 relative mb-4" data-id="${track.id}">
                                        <div class="absolute left-[-8px] top-2 w-3 h-3 bg-blue-500 rounded-full"></div>

                                        <!-- Display mode -->
                                        <div class="ml-4 pl-2 space-y-1 timeline-display">
                                            <p><strong>Location:</strong> <span class="location-text">${track.location}</span></p>
                                            <p><strong>Remark:</strong> <span class="remark-text">${track.remark}</span></p>
                                            <p><strong>Date:</strong> <span class="date-text">${track.track_date}</span></p>
                                            ${track.source =="db" ?`
                                            <button type="button" class="text-blue-600 hover:underline editBtn">Edit</button>
                                            <button type="button" class="text-red-600 hover:underline deleteBtn"><i class="bi bi-trash"></i></button>` :'' }
                                        </div>

                                        <!-- Edit mode (initially hidden) -->
                                        <form class="ml-4 pl-2 space-y-2 hidden timeline-edit">
                                            <input type="hidden" name="track_id" value="${track.id}">
                                             <div style="display:none">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" name="orderStatus" id="orderStatus">
                                                <option ${(track.status == "pending" ? 'selected' :'')} value="pending">Pending</option>
                                                <option ${(track.status == "confirmed" ? 'selected' :'')} value="confirmed">Confirmed</option>
                                                <option ${(track.status == "processing" ? 'selected' :'')} value="processing">Processing</option>
                                                <option ${(track.status == "shipped" ? 'selected' :'')} value="shipped">Shipped</option>
                                                <option ${(track.status == "in_transit" ? 'selected' :'')} value="in_transit">In Transit</option>
                                                <option ${(track.status == "out_for_delivery" ? 'selected' :'')} value="out_for_delivery">Out for Delivery</option>
                                                <option ${(track.status == "delivered" ? 'selected' :'')} value="delivered">Delivered</option>
                                                <option ${(track.status == "cancelled" ? 'selected' :'')} value="cancelled">Cancelled</option>
                                            </select>
                                            <div class="invalid-feedback" id="orderStatus_error"></div>
                                        </div>
                                            <div>
                                                <label class="text-xs text-gray-500">Location</label>
                                                <input type="text" name="location" value="${track.location}" class="border px-2 py-1 rounded w-full">
                                            </div>
                                            <div>
                                                <label class="text-xs text-gray-500">Remark</label>
                                                <input type="text" name="remark" value="${track.remark}" class="border px-2 py-1 rounded w-full">
                                            </div>
                                                <div>
                                          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                 <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                                                 <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="${datePart}"  name="track_date">
                                                 <div class="invalid-feedback" id="orderLocation_error"></div>
                                            </div>
                                             <div>
                                                 <label class="block text-sm font-medium text-gray-700 mb-2">Time</label>
                                                 <input type="time" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"  name="ordertime" value="${timePart}">
                                                 <div class="invalid-feedback" id="oordertime_error"></div>
                                            </div>
                                          </div>
                                        </div>
                                            <div class="flex gap-2">
                                                <button type="submit" class="bg-primary px-3 py-1 bg-green-600 text-white rounded">Save</button>
                                                <button type="button" class="cancelBtn text-red-500">Cancel</button>
                                            </div>
                                        </form>
                                    </li>`;
                                });
                            }
                            html += `</ul>
                        </div>
                        <!-- Update Order Status Form Section -->
                        <div id="orderStatusForm" class="bg-blue-50 rounded-lg p-4 hidden">
                            <div class="bg-blue-50 rounded-lg p-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-truck text-blue-600 mr-2"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path><path d="M15 18H9"></path><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path><circle cx="17" cy="18" r="2"></circle><circle cx="7" cy="18" r="2"></circle></svg>Update Order Status</h3>
                                <form class="space-y-4" id="orderStatus" >
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <input type="hidden" name="orderId" value="${result.id}" />
                                        <div style="display:none">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" name="orderStatus" id="orderStatus">
                                                <option value="pending">Pending</option>
                                                <option value="confirmed">Confirmed</option>
                                                <option value="processing">Processing</option>
                                                <option value="shipped">Shipped</option>
                                                <option value="in_transit">In Transit</option>
                                                <option value="out_for_delivery">Out for Delivery</option>
                                                <option value="delivered">Delivered</option>
                                                <option value="cancelled">Cancelled</option>
                                            </select>
                                            <div class="invalid-feedback" id="orderStatus_error"></div>
                                        </div>
                                        <div>
                                          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                 <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                                                 <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="" id="orderDateUp" name="orderdate">
                                                 <div class="invalid-feedback" id="orderLocation_error"></div>
                                            </div>
                                             <div>
                                                 <label class="block text-sm font-medium text-gray-700 mb-2">Time</label>
                                                 <input type="time" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="" id="orderTimeUp" name="ordertime">
                                                 <div class="invalid-feedback" id="orderLocation_error"></div>
                                            </div>
                                          </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="" id="orderLocation" name="orderLocation">
                                            <div class="invalid-feedback" id="orderLocation_error"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                        <textarea rows="3" placeholder="Describe the status update..." class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="orderRemark" name="orderRemark"></textarea>
                                        <div class="invalid-feedback" id="orderRemark_error"></div>
                                    </div>
                                    <div class="flex justify-end space-x-2 mt-2">
                                        <button type="button" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">Cancel</button>
                                        <button type="submit" class="bg-primary px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center space-x-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-save "><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg><span>Update Status</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                `;
           // });

            $('#orderInfo').html(html);
        }
    }
function toggleTimeline() {
    const timeline = document.getElementById("orderTimeline");
    const form = document.getElementById("orderStatusForm");

    // Toggle visibility
    if (!timeline.classList.contains("hidden")) {
        timeline.classList.add("hidden");
        form.classList.remove("hidden");
    } else {
        timeline.classList.remove("hidden");
        form.classList.add("hidden");
    }
}
$(document).on('click', '.editBtn', function () {
    const li = $(this).closest('li');
    li.find('.timeline-display').hide();
    li.find('.timeline-edit').show();
});

$(document).on('click', '.cancelBtn', function () {
    const li = $(this).closest('li');
    li.find('.timeline-edit').hide();
    li.find('.timeline-display').show();
});

$('#orderInfo').on('submit', '#orderStatus', function(e) {

            let webForm = $('#orderStatus');
            e.preventDefault();

            $('.is-invalid').removeClass('is-invalid');
            $('.invalid-feedback').empty();

            $('#submitBtn').prop('disabled', true).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...'
            );

            $.ajax({
                url : '<?=base_url('admin/orders/order-status');?>',
                method:'POST',
                data: $(this).serialize(),
                dataType : 'json',
                success:function(response)
                { 
                    console.log(response.status)
                    if(response.status){
                        toastr.success(response.message);
                        let fakeBtn = document.createElement('button');
                        fakeBtn.setAttribute('data-id', response.orderId); 
                        orderDetail(fakeBtn);
                        webForm[0].reset();
                    }else{
                        if(response.errors){
                            $.each(response.errors,function(field,message)
                            {
                                $('#orderInfo #'+ field).addClass('is-invalid');
                                $('#orderInfo #' + field + '_error').text(message);
                            })
                        }else{
                              toastr.error(response.message);
                        }
                    }
                },error: function() {
                    toastr.error('An error occurred while saving Order Info');
                },
                complete: function() {
                    // Re-enable submit button
                    $('#submitBtn').prop('disabled', false).text('Save Order Info');
                }
            })
        })
$(document).on('submit', '.timeline-edit', function (e) {
    e.preventDefault();
    const form = $(this);
    const formData = form.serialize();

    $.ajax({
        url: '<?= base_url('order/update-track-spot') ?>',
        method: 'POST',
        data: formData,
        dataType: 'json',
        success: function (res) {
            if (res.status === 200) {
                // Update display text after save
                const li = form.closest('li');
                li.find('.location-text').text(res.data.location);
                li.find('.remark-text').text(res.data.remark);
                li.find('.date-text').text(res.data.track_date);

                form.hide();
                li.find('.timeline-display').show();
            } else {
                alert('Failed to update!');
            }
        }
    });
});
$(document).on('click', '.deleteBtn', function () {
    const li = $(this).closest('li');
    const trackId = li.data('id');

    if (confirm('Are you sure you want to delete this tracking entry?')) {
        $.ajax({
            url: '<?= base_url('order/delete-track-spot') ?>',
            method: 'POST',
            data: { id: trackId },
            dataType: 'json',
            success: function (res) {
                if (res.status === 200) {
                    toastr.success(res.message)
                    li.remove(); 
                } else {
                    toastr.error(response.message)
                }
            }
        });
    }
});
flatpickr(".datetime", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    time_24hr: true
});

    </script>
<?= $this->endSection() ?>

