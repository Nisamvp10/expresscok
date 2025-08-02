<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
    <!-- titilebar -->
    <div class="flex items-center justify-between">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-0">
                <h1 class="h3 mb-0"><?= $page ?? '' ?></h1>
                <?php
                if(haspermission(session('user_data')['role'],'create_client')) { ?>
                <div>
                    <button id="downloadReport" class="btn btn-primary">
                        <i class="bi bi-download me-1"></i> Download Report
                </button>
                </div>
                <?php } ?>
            </div>
        </div>
    </div><!-- closee titilebar -->

    <!-- body -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden p-4">
        <div class="flex flex-col md:flex-row gap-4 mb-6">
    
            <!-- Column 1: Search Input -->
            <div class="flex-1 ">
                <label for="search" class=" left-10 top-2 text-gray-400 pointer-events-none text-sm">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search text-gray-400">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                    </div>
                    <input type="text" id="searchInput" placeholder="Search client name, or Phone Number..." class="pl-10 pr-3 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                </div>
            </div>
            <div class=" relative">
                <label for="fromDate" class=" left-10 top-2 text-gray-400 pointer-events-none text-sm">Select From Date</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="bi bi-calendar"></i>
                    </div>
                    <input type="date" id="fromDate" class="pl-10 pr-3 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"/>
                </div>
            </div>

            <div class=" relative">
                <label for="fromDate" class=" left-10 top-2 text-gray-400 pointer-events-none text-sm">Select To Date</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="bi bi-calendar"></i>
                    </div>
                    <input type="date" id="toDate" class="pl-10 pr-3 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"/>
                </div>
            </div>
            
            <!-- Column 2: Status Dropdown -->
            <div class="w-full md:w-48">
                <div class="relative">
                    <label for="fromDate" class=" left-10 top-2 text-gray-400 pointer-events-none text-sm">Branch</label>
                    <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-filter text-gray-400">
                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                    </svg>
                    </div>
                    <select id="filerBranches" class="pl-10 pr-3 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none">
                    <option value="" selected>All Branches</option>
                    <?php
                    if(!empty($branches)){
                        foreach($branches as $branch) {
                            ?>
                            <option value="<?=$branch['id'];?>"><?=$branch['branch_name'];?></option>
                            <?php 
                        }
                    }
                    ?>
                    </select>
                </div>
                </div>
            </div>
            </div>
            <!-- table -->
             <div class="overflow-x-auto">
                <div id="clientsTable"></div>
            </div>
            <!-- close table -->
</div><!-- body -->
<?= $this->endSection(); ?>
<?= $this->section('scripts') ?>
    <script>
        $(document).ready(function() {

            function loadClients(search = '') {
                let filer = $('#filerBranches').val();
                let fromdate = $('#fromDate').val();
                let todate = $('#toDate').val();
                $.ajax({
                    url: "<?= site_url('dashboard/report-list') ?>",
                    type: "GET",
                    data: { search: search,branch:filer,'fromDate':fromdate,'toDate':todate },
                    dataType: "json",
                    success: function(response) {
                        
                        if (response.success) {
                            renderTable(response.report);
                        }else{
                            report=[];
                            renderTable(report);
                        }
                    }
                });
            }

            function renderTable(report){
                let html = '';

                if (report.length === 0) {
                    html += `
                        <div class="text-center py-8">
                            <h3 class="text-lg font-medium text-gray-700">No Clients found</h3>
                            <p class="text-gray-500 mt-1"> <?=(!haspermission('','view_reports') ? lang('Custom.accessDenied') :'Try adjusting your search');?></p>
                        </div>
                    `;
                }else{
                    html += `
                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Branch</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Staff</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Spend</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booking Date</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                    `;
                    report.forEach(result => {
              
                let joinedDate = new Date(result.booking_date).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
                let statusText = result.booking_status == 1 ? 'Confirmed' : result.booking_status == 2 ? 'Completed' : result.booking_status == 3 ? 'Pending' : 'Declined';
                let className = 
                    result.booking_status == 1 ? 'bg-blue-500' :
                    result.booking_status == 2 ? 'bg-green-500' :
                    result.booking_status == 3 ? 'bg-red-500' :
                    'bg-red-100';

                        html += `
                            <tr class="hover:bg-gray-50">
                                <td class="px-2 py-2 whitespace-nowrap">
                                
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">${result.branch_name}</div>
                                    </div>
                                </td>
                                <td class="px-2 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">${result.name}</div>
                                </td>
                                <td class="px-2 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">${result.staff_name}</div>
                                </td>
                                <td class="px-2 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">${result.duration}</div>
                                </td>
                                <td class="px-2 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">${result.specialties}</div>
                                </td>
                                <td class="px-2 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">${joinedDate} </div>
                                </td>                         
                                <td class="px-2 py-2 whitespace-nowrap">
                                     <div class="text-sm text-gray-900"><span class="badge rounded-pill ${className} ">${statusText}</span></div>
                                </td>
                                <td class="px-2 py-2 whitespace-nowrap">
                                     <div class="text-sm text-gray-900">${result.price}</div>
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
            $('#filerBranches, #fromDate, #toDate, #searchInput').on('change', function () {
              
                loadClients($('#searchInput').val());
            });
        });

        $('#downloadReport').on('click',function(){

                 let filer = $('#filerBranches').val();
                let fromdate = $('#fromDate').val();
                let todate = $('#toDate').val();
                let search = $('#searchInput').val();
                let query = $.param({
                    search: search,
                    fromDate: fromdate,
                    toDate: todate,
                    branch: filer
                });

                // Open the URL in a new tab
                window.open("<?= site_url('dashboard/gen-report') ?>?" + query, '_blank');
            
        })
    </script>
<?= $this->endSection() ?>

