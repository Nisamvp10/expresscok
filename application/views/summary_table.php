                        <div class="summary_table_msg"></div>

<?php

if(!empty($result)){?>

 <table>
             							        <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"><br>   
               <thead>
                                <th>
                                    S/o
                                </th>
                                <th>Amount</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php $sum = ''; $i=1; foreach($result as $key){?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td><?=$key->amount;?></td>
                                     <td>
                                      
                                        <button class="label label-danger" type="button" onClick="return removewallet(<?=$key->wallet_id;?>);"> <i class="fa fa-trash"></i></button>  

                                    </td>
                                </tr>
                                <?php $sum +=$key->amount++; $i++; } ?>
                                <tr>
                                      <td >
                                        Total
                                        </td>
                                    <td >
                                        Total
                                        </td>
                                        <td> <b><?=$sum;?></b></td>
                                    </td>
                                </tr>
                                
                               
                            </tbody>
                        </table>
<?php }else{?>
<p>Empty wallet <br></p>
<a href="<?=base_url('payment')?>" calass="btn btn-danger">ADD TO PAYMENT</a>

<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
       
  
</script>