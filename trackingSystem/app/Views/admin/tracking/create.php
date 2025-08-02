<?php $this->extend('layout/main') ;?>
<?= $this->section('content') ?>
<?php
    if(!empty($data))
    {
        $id = encryptor($data['id']);
        $branch = $data['branch_name'];
        $location = $data['location'];
    }else{
        $id=$branch=$location = '';
    }
?>
 <!-- titilebar -->
 <div class="flex items-center justify-between">
    <div class="flex items-center gap-4">
        <a href="<?=base_url('admin/tracking');?>" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left text-gray-500">
            <path d="m12 19-7-7 7-7"></path>
            <path d="M19 12H5"></path>
            </svg>
        </a> 
        <h1 class="h3 mb-0"><?= $page ?? '' ?></h1>
    </div>
</div><!-- closee titilebar -->

<!-- body -->
<div class="bg-white rounded-lg shadow-sm overflow-hidden p-4">
 <form id="orderCreate" method="post" action="<?= site_url('orders/save') ?>">
    <?= csrf_field() ?>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-4">
            <!-- Customer Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Customer Name</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 mt-2 pointer-events-none">
                        <i class="bi bi-person text-xl text-gray-400"></i>
                    </div>
                    <input type="text" name="customer_name" id="customer_name" class="pl-10 pr-3 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Customer Name">
                    <div class="invalid-feedback" id="customer_name_error"></div>
                </div>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 mt-2 pointer-events-none">
                        <i class="bi bi-envelope text-xl text-gray-400"></i>
                    </div>
                    <input type="email" name="email" id="email" class="pl-10 pr-3 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Email">
                    <div class="invalid-feedback" id="email_error"></div>
                </div>
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 mt-2 pointer-events-none">
                        <i class="bi bi-telephone text-xl text-gray-400"></i>
                    </div>
                    <input type="text" name="phone" id="phone" class="pl-10 pr-3 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Phone Number">
                    <div class="invalid-feedback" id="phone_error"></div>
                </div>
            </div>

            <!-- Tracking ID -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tracking ID</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 mt-2 pointer-events-none">
                        <i class="bi bi-hash text-xl text-gray-400"></i>
                    </div>
                    <input type="text" name="tracking_id" id="tracking_id" class="pl-10 pr-3 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Tracking ID">
                    <div class="invalid-feedback" id="tracking_id_error"></div>
                </div>
            </div>

            <!-- Address -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                <textarea name="address" id="address" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Address"></textarea>
                <div class="invalid-feedback" id="address_error"></div>
            </div>
        </div>

        <!-- Column 2 -->
        <div class="space-y-4">
            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" id="description" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Order Description"></textarea>
                <div class="invalid-feedback" id="description_error"></div>
            </div>

            <!-- Estimated Date -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Estimated Delivery Date</label>
                <input type="date" name="estimated_date" id="estimated_date" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <div class="invalid-feedback" id="estimated_date_error"></div>
            </div>

            <!-- Buttons -->
            <div class="mt-8 flex justify-end gap-3">
                <a href="<?= site_url('orders') ?>" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">Cancel</a>
                <button type="submit" id="submitBtn" class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-md flex items-center transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-save mr-1"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                    Save
                </button>
            </div>
        </div>
    </div>
</form>



</div><!-- close body -->
<?= $this->endSection();?>
<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {

        $('#orderCreate').on('submit', function(e) {
            let webForm = $('#orderCreate');
            e.preventDefault();

            $('.is-invalid').removeClass('is-invalid');
            $('.invalid-feedback').empty();

            $('#submitBtn').prop('disabled', true).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...'
            );

            $.ajax({
                url : '<?=base_url('orders/save');?>',
                method:'POST',
                data: $(this).serialize(),
                dataType : 'json',
                success:function(response)
                { 
                    if(response.success){
                        toastr.success(response.message);
                        webForm[0].reset();
                    }else{
                        if(response.errors){
                            $.each(response.errors,function(field,message)
                            {
                                $('#'+ field).addClass('is-invalid');
                                $('#' + field + '_error').text(message);
                            })
                        }else{
                              toastr.error(response.message);
                        }
                    }
                },error: function() {
                    toastr.error('An error occurred while saving Branch');
                },
                complete: function() {
                    // Re-enable submit button
                    $('#submitBtn').prop('disabled', false).text('Save Branch');
                }
            })
        })
    })
    function deleteBranch(e){
        if(confirm('are you sure ! You want to delete the branch'))
        {
            $(e).prop('disabled', true).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Deleting...'
            );
            let id = $(e).data('id');
            $.ajax({
                url : '<?=base_url('branch/delete');?>',
                method:'POST',
                data: {id:id},
                dataType : 'json',
                success:function(response)
                {
                    if(response.success)
                    {
                        toastr.success(response.message);
                        setTimeout(function() {
                            window.location.href = "<?= base_url('branches') ?>";
                        }, 3000);

                    }else{
                        toastr.error(response.message);
                    }
                }
            })
        }
    }
</script>
<?= $this->endSection() ?>
