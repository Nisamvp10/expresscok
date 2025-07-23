
<ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Home</a></li> 
    <li class="active">Track Summary</li>
</ol>
<p class="hdshall" onclick="hdshall(this)">&#62; Show All</p>
<?php foreach($order_details as $key => $row ){ ?>
	
	<div class="col-md-12 col-sm-12 col-xs-12 resultarea">
		<div class="col-md-1 col-sm-1 col-xs-1">
			<input type="checkbox" name="" value="" checked="checked" />
		</div>
		<?php $tracking_details=array(); 
		      if(!empty($order_description)){
				foreach($order_description as $details){
				  if($row["id"]==$details["order_id"])$tracking_details[]=$details;
				}	  
			  }
		
		?>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<h4>Waybill: <?php echo $row["name"];  ?></h4>
			
			<p>Signed for by: <?php echo $tracking_details[0]["order_description"];  ?></p>
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
	<p class="show" onclick="hidethis('fdfdfdf<?php echo $key; ?>')">&#62; Show Details</p>
	<div class="trackdetails fdfdfdf<?php echo $key; ?>">
	    <?php if(!empty($tracking_details)){ 
		            $oid=count($tracking_details);
					$cur_date="";
					foreach($tracking_details as $odet){ ?>
					    <?php if($odet["date"]!=$cur_date){ ?>
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
						<?php } ?>		
									<tr>
										<td><?php  echo $oid;?></td>
										<td><?php echo $odet["order_description"];  ?></td>
										<td><?php echo $odet["order_location"];  ?></td>
										<td><?php echo $odet["time"];  ?></td>
										<td><?php echo $odet["piece"];  ?> Piece </td>
									</tr>
						<?php if($odet["date"]!=$cur_date){ ?>			
								</tbody>
							</table>
				        <?php } ?>
		<?php    $oid--;
		         $cur_date=$odet["date"];
			   } 

		}else{
			echo "No order history found.";
		} ?>
		
		<p class="hide" onclick="hidethis('fdfdfdf<?php echo $key; ?>')">&#62; Hide Details</p>
	</div>
	
	
	
<?php } ?>

<script type="text/javascript">
 function hidethis(clss){
	 $("."+clss).toggle();
 }
 function hdshall(obj){
	 if($(obj).hasClass("hdshalls")){
		 $(".trackdetails").hide();
		 $(obj).removeClass("hdshalls"); 
	 }else{
		$(".trackdetails").show();
	    $(obj).addClass("hdshalls"); 
	 }
	 
 }

</script>