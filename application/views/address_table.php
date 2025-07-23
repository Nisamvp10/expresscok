<?php if(!empty($address)){?>
<?php foreach($address as $key){?>
            <div class="col-md-6 mb-3">
                <label class="aiz-megabox d-block bg-white mb-0">
                    <input type="radio" name="address_id" value="<?=$key->client_address_id?>" required="">
                    <span class="d-flex p-3 aiz-megabox-elem">
                        <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                        <span class="flex-grow-1 pl-3 text-left">
                            <div>
                                <span class="opacity-60">Address:</span>
                                <span class="fw-600 ml-2"><?=$key->address?></span>
                            </div>
                            <div>
                                <span class="opacity-60">Postal code:</span>
                                <span class="fw-600 ml-2"><?=$key->postal_code?></span>
                            </div>
                            <div>
                                <span class="opacity-60">City:</span>
                                <span class="fw-600 ml-2"><?=$key->city?></span>
                            </div>
                            <div>
                                <span class="opacity-60">Country:</span>
                                <span class="fw-600 ml-2"><?=$key->country?></span>
                            </div>
                            <div>
                                <span class="opacity-60">Phone:</span>
                                <span class="fw-600 ml-2"><?=$key->contact_number?></span>
                            </div>
                        </span>
                    </span>
                </label>
                <div class="dropdown position-absolute right-0 top-0">
                    <button class="btn bg-gray px-2" type="button" data-toggle="dropdown">
                        <i class="la la-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" >
                                     Edit
                        </a>
                    </div>
                </div>
            </div>
            
             
                
           <?php }?>
            <div class="col-md-6 mx-auto mb-3">
            <div class="address-wrap aiz-megabox"  data-toggle="modal" data-target="#addressPanel" >
                <i class="fa fa-plus la-2x mb-3"></i>
                <div class="alpha">Add New Address</div>
            </div>
        </div>
        <?php 
           }else{ ?>
              <div class="col-md-6 mx-auto mb-3">
            <div class="address-wrap aiz-megabox"  data-toggle="modal" data-target="#addressPanel" >
                <i class="fa fa-plus la-2x mb-3"></i>
                <div class="alpha">Add New Address</div>
            </div>
        </div>
           <?php } ?>