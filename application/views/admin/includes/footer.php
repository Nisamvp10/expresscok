    <script src="<?php echo resource();?>lib/js/jquery.js"></script>
    
    
    <?php if($this->session->flashdata('success')||$this->session->flashdata('msuccess')) { ?>
    	<script type="text/javascript">
    		$(document).ready(function(){
    			setTimeout(function(){
    		   	  $('#success_message').remove();		
    		   	  $('.succe-div').remove();
    		   	  $('.succe-pa').remove();
    		   	 
    		    },6000);
    		});
    		
    	</script>
    	
    <?php } ?>
    <?php if($this->session->flashdata('error')||$this->session->flashdata('errors')||$this->session->flashdata('eerror')||$this->session->flashdata('merror')||$this->session->flashdata('display_error')){ ?>
    	
		<script type="text/javascript">
    		$(document).ready(function(){
    		   setTimeout(function(){
    		   	 $('#error_message').remove();	
    		   },6000);
    		});
    		setTimeout(function(){
    		   	 
    		   	 $('.error-message').remove();
    		   	 $('.error-div').remove();
    		},12000);
    		
    	</script>
		
    <?php  } ?>
    
    <script type="text/javascript" src="<?php echo resource('backend');?>js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="<?php echo resource('backend');?>js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo resource('backend');?>js/moment.js"></script>
    <script type="text/javascript" src="<?php echo resource('backend');?>js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript"> 
        $(function () {
		    $(".grid").sortable({
		    	cursor: "move",
		    	grid: [ 20, 10 ]
		    });
		    $(".grid").disableSelection();
		});
		$(function () {
		    $(".grid_t").sortable({
		    	cursor: "move",
		    	grid: [ 20, 10 ],
		    	change: function( event, ui ) { ui.item.find('.pckge_ind_sn').html("<span style='font-size:9px;color:#49D040;'>Changing...</span>")},
		    	update: function( event, ui ) { 
		    		     var i=1;
		    		     $('.pckge_ind_itms').each(function(){
		    		     	 $(this).find('.pckge_ind_sn').html(i);
		    		     	 i++;
		    		     });
		    		     
		    		
		    		 },
		    	stop: function( event, ui ) { 
		    		    
		    		     var i=1;
		    		     $('.pckge_ind_itms').each(function(){
		    		     	 $(this).find('.pckge_ind_sn').html(i);
		    		     	 i++;
		    		     });
		    		
		    	    }
		    });
		    $(".grid_t").disableSelection();
		});
    </script>
    <script src="<?php echo resource();?>lib/bootstrap/bootstrap.min.js"></script>
    <?php if(isset($actived)&&$actived=="directory"){
    	$citiess=array();	 
    	if(isset($cities)){
    		foreach($cities as $row){
    			array_push($citiess,$row['city']);
    		}
    	}
    	
    	?>
    	 
		 <script src="<?php echo auto_version('/resource/backend/js/typehead.min.js'); ?>"></script>
		 <script type="text/javascript">
		   var getitems=<?php echo (!empty($citiess)&&count($citiess)>0)?json_encode($citiess):"[]";?>;
           $('.typeahead').typeahead({
                source: getitems
            });
         </script>
		
    <?php }  ?>
     
    <script src="<?php echo auto_version('/resource/backend/js/colorpicker.js'); ?>"></script>
    <script src="<?php echo auto_version('/resource/backend/js/dashboard.js'); ?>"></script>
    <?php if(($this->session->flashdata('error')&&$this->session->flashdata('error')=='modal')||($this->session->flashdata('success')&&$this->session->flashdata('success')=='modal')){ ?>
    	<script type="text/javascript">
    	
    		$('#<?php echo $this->session->flashdata('modal_id');?>').modal('show');
    		
    	</script>
    	
    <?php }  ?>
     <?php if($this->session->flashdata('merror')){ ?>
    	<script type="text/javascript">
    	
    		$('#<?php echo $this->session->flashdata('merror');?>').modal('show');
    		
    	</script>
    	
    <?php }  ?>
    <?php if($this->session->flashdata('msuccess')){ ?>
    	<script type="text/javascript">
    	
    		$('#<?php echo $this->session->flashdata('msuccess');?>').modal('show');
    		
    	</script>
    	
    <?php }  ?>
    
    <?php  if(isset($actived)&&$actived=="products"){ ?>
    	
    	<script src="<?php echo auto_version('/resource/backend/js/bootstrap-tagsinput.js'); ?>"></script>
    	
    	
    <?php }  ?>
    
    <script src="<?php echo auto_version('/resource/backend/js/jquery.waitforimages.js'); ?>"></script>
    <script type="text/javascript">
    	
    		$('.pagination_spin_parent').waitForImages(function() {
			    
			}, function(loaded, count, success) {
			   
			   $(this).addClass('loaded');
			});
    		
    </script>
    <?php  if(isset($actived)&&$actived=="package"){ ?>
    	<script type="text/javascript">slctd_pckg_books=<?php  if(isset($package_product_list))echo json_encode($package_product_list);else echo "[]";?></script>
    	<script src="<?php echo auto_version('/resource/backend/js/custom.angular.js'); ?>"></script>
    	
    	
    	
    <?php }  ?>
</body>

</html>