
<ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Home</a></li> 
    <li class="active">Track Summary</li>
</ol>
<p class="hdshall" onclick="hdshall(this)">&#62; Show All</p>
<?php foreach($order_details as $key => $row ){  ?>
	<div class="full_details">
		<div class="col-md-12 col-sm-12 col-xs-12 resultarea">
			
			<?php $tracking_details=array(); 
				  if(!empty($order_description)){
					foreach($order_description as $details){
					  if($row["id"]==$details["order_id"])$tracking_details[]=$details;
					}	  
				  }
			     
			?>
			<div class="col-md-5 col-sm-5 col-xs-5">
				<div class="col-md-2 col-sm-2 col-xs-2">
					<?php if ($tracking_details[0]["status"]==0) { ?>
						<img src="<?php echo resource('frontend')?>images/clearance.png" class="img-responsive" alt="" />
					<?php }  if ($tracking_details[0]["status"]==1) { ?>
						<img src="<?php echo resource('frontend')?>images/delivered.png" class="img-responsive" alt="" />
					<?php }  if ($tracking_details[0]["status"]==2) { ?>
						<img src="<?php echo resource('frontend')?>images/in_transit.png.png" class="img-responsive" alt="" />
					<?php } ?>	
				</div>
				<div class="col-md-10 col-sm-10 col-xs-10">
					<a href="<?php echo $row["track_url"];  ?>" target="_blank" ><h4>Waybill: <?php echo $row["name"];  ?></h4></a>
					<?php if ($tracking_details[0]["status"]==0) { echo "Clearance event"; 
					}  if ($tracking_details[0]["status"]==1) { ?>
					
					<p>Signed for by: <?php echo $tracking_details[0]["order_description"];  ?></p>
					<?php }  if ($tracking_details[0]["status"]==2) { echo "Clearance Completed, Despached"; } ?>
				</div>	
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4">
			   <p><?php echo date("l, F d,Y",strtotime($tracking_details[0]["date"]));?> at <?php echo $tracking_details[0]["time"];  ?></p>
			   <p>Origin Service Area:</p>
			   <p> <?php echo $row["sender"];  ?>, <?php echo $row["address_sender"];  ?></p><p>Destination Service Area:</p>
			   <p> <?php echo $row["receiver"];  ?>, <?php echo $row["address_receiver"];  ?></p>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3">
				<p> <?php echo $tracking_details[0]["piece"];  ?>  piece</p>
			</div>
		</div>
		
		
		
		<div class="bs-example syam">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                  
               <div class="col-sm-5">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $row["name"];  ?>"  class="para"><span class="glyphicon glyphicon-plus"></span> Further details</a>
                </h4>
               </div>
                  
               <div class="col-sm-4">
                    <p class="para">Next step</p>
                
               </div>
                  
               <div class="col-sm-3">
                    
                 
               </div>
              </div>
               
            </div>
            <div id="collapseOne<?php echo $row["name"];  ?>" class="panel-collapse collapse">
                <div class="panel-body">
                   <div class="row">
                       <div class="col-sm-12">
                           <div class="col-sm-5">
                               <p> <?php echo $tracking_details[0]["further_details"];  ?></p>
                           </div>
                           <div class="col-sm-4">
                              <p><?php echo $tracking_details[0]["next_step"];  ?></p>

                           </div>
                           <div class="col-sm-3">
                               <p></p>

                           </div>
                       </div>
                   </div>
                    <p></p>
                </div>
            </div>
        </div>
      
    </div>
	
</div>
		
		

		<p class="show" onclick="hidethis('fdfdfdf<?php echo $key; ?>')">&#62; Show Details</p>
		<div class="trackdetails fdfdfdf<?php echo $key; ?>">
			<?php if(!empty($tracking_details)){ 
			            $in=0;
			            $out=0;
						$oid=count($tracking_details);
						$cur_date="";
						foreach($tracking_details as $kh => $odet){ ?>
							<?php if($odet["date"]!=$cur_date){ $in++;?>
								<table border="1">
									<thead>
										<tr>
											<th colspan="2"><?php echo date("l, F d,Y",strtotime($odet["date"])) ?></th>
											<th>Location</th>
											<th>Time</th>
											<th>Piece</th>
										</tr>
									</thead>
									<tbody>
							<?php }  ?>		
										<tr>
											<td class="initial"><?php  echo $oid;?></td>
											<td><?php echo $odet["order_description"];  ?></td>
											<td><?php echo $odet["order_location"];  ?></td>
											<td><?php echo $odet["time"];  ?></td>
											<td><?php echo $odet["piece"]; ?> Piece</td>
										</tr>
							<?php  if(((isset($tracking_details[$kh+1]["date"])&&$odet["date"]!=$tracking_details[$kh+1]["date"])||!isset($tracking_details[$kh+1]))&&($cur_date!="")){ $out++;   ?>			
									</tbody>
								</table>
							<?php } ?>
			<?php    $oid--;
		
					 $cur_date=$odet["date"];
					 
				   } 
				   
				   if($in!=$out){ ?>
				       </tbody>
					</table>
			<?php  }

			}else{
				echo "No order history found.";
			} ?>
			
			<p  onclick="hidethis('fdfdfdf<?php echo $key; ?>')">&#62; Hide Details</p>
		</div>
	</div>
	
	
<?php } ?>
<p style="display:none;" class="hideall" onclick="hideall(this)">&#62; Hide All</p>
<script type="text/javascript">
 function hidethis(clss){
	 $("."+clss).toggle();
 }
 function hdshall(obj){
	 if($(obj).hasClass("hdshalls")){
		 $(".trackdetails").hide();
		 $(obj).removeClass("hdshalls"); 
		 $(".hidealls").hide();
	 }else{
		$(".trackdetails").show();
	    $(obj).addClass("hdshalls"); 
		$(".hideall").show();
	 }
	 
 }
function hideall(ob){
	$(".trackdetails").hide();
	$(ob).hide();
    
    
}
</script>




<script type="text/javascript">
$(document).ready(function(){
    // Add minus icon for collapse element which is open by default
    $(".collapse.in").each(function(){
        $(this).siblings(".panel-heading").find(".glyphicon").addClass("glyphicon-minus").removeClass("glyphicon-plus");
    });
    
    // Toggle plus minus icon on show hide of collapse element
    $(".collapse").on('show.bs.collapse', function(){
        $(this).parent().find(".glyphicon").removeClass("glyphicon-plus").addClass("glyphicon-minus");
    }).on('hide.bs.collapse', function(){
        $(this).parent().find(".glyphicon").removeClass("glyphicon-minus").addClass("glyphicon-plus");
    });
});
</script>