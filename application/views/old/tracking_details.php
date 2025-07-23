
			<table  class="sty" style="width:100%; margin:30px 0";>
			
				<tr>
					<th class="row_table_order" >Order Id</th>
					<th class="row_table_order" >Sender  </th>
					<th class="row_table_order" >Receiver </th>
					<th class="row_table_order" >Pieces </th>
				</tr>
				
				<tr>
					<td class="row_table_order" ><?php echo $order_details[0]['name']; ?></td>
					<td class="row_table_order" ><?php echo $order_details[0]['sender']; ?></br><?php echo $order_details[0]['address_sender']; ?></td>
					<td class="row_table_order" ><?php echo $order_details[0]['receiver']; ?></br><?php echo $order_details[0]['address_receiver']; ?></td>
					<td class="row_table_order" ><?php echo $order_description[0]['piece']; ?></td>
				</tr>
			</table>
			
			<table style="width:100%; margin:30px 0";>
			
				<tr>
					<th class="row_table_order" >No</th>
					<th class="row_table_order" >Date</th>
					
					<th class="row_table_order">Description</th>
					
					<th class="row_table_order">Location</th>
					<th class="row_table_order">Time</th>
					
					<th class="row_table_order">Pieces</th>
				</tr>
				<?php if(isset($order_description)&&!empty($order_description)){
					$i=count($order_description);
					foreach($order_description as $details){ ?>
						<tr>
							<td class="data"><?php echo $i ?> </td>
							<td class="data"><?php echo $details['date'] ?></td>
							<td><?php echo $details['order_description'] ?></td>
							<td><?php echo $details['order_location'] ?></td>
							<td><?php echo $details['time'] ?></td>
							<td><?php echo $details['piece'] ?></td>
						</tr>
				<?php $i--; } } ?>
			</table>
		