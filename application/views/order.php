<link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
<style type="text/css">
      .tftable {
          margin-top: 25px;
          width: 649px;
      }
      .head1 {
          font-size: 13px;
          font-weight: bold;
          width: 320px;
      }
      .head2 {
          position: relative;
          font-size: 13px;
          font-weight: bold;
          width: 320px;
      }
      .myTable {
          width: 700px;
          margin-top: 20px;
          border: 1px solid #ccc;
      }
      .myTable th {
        min-width: 118px;
        background: #ca0000;
        color: #ffcc00;
        font-size: 13px;
      }
      .myTable th, .myTable td{
        padding: 5px;
        padding-left: 10px;
      }
      .myTable2 th {
          line-height: 30px;
          padding-left: 10px;
      }
      .myTable2 th {
          line-height: 30px;
          padding-left: 10px;
           background: #ca0000;
            color: #ffcc00;
          font-size: 13px;
          border-bottom: 1px solid #CCC;
          border-top: 1px solid #ccc;
      }
      .myTable2 td {
          padding: 5px 0 5px 10px;
      }
      .disare_head {
          width: 300px;
      }
      .status_origen_head {
          width: 260px;
      }
      .abnumber_head {
          width: 160px;
      }
      .origen_head {
          width: 300px;
      }
      tbody {
          border: 1px solid #f3f3f3;
      }
      .detailRepot {
        margin-top: 21px;
        display: block;
        color: #525252;
        font-size: 13px;
        font-weight: bold;
      }
      .myTable2 {
          width: 700px;
          margin-top: 20px;
          border-bottom: 1px solid #CCC;
          padding-bottom: 30px;
      }
      .deliverd {
          color: #090;
          font-weight: bold;
      }
      .grid_8.alpha.omega.wrap {
          background: #fff;
          border-radius: 5px;
          border: 1px solid #d4d4d4;
          margin: 0 auto;
          float: none;
          margin-top: 40px;
          padding-top: 20px;
          padding-bottom: 20px;
      }
      .errormsg{
        text-align: center;
        color: red;
      }
      
      .grid_8 {
          width: 300px;
      }
      .home-highlight-item {
          padding: 10px 20px 0;
      }
      .trackpara {
          position: relative;
          color: #565655;
      }
      .rightbox {
          width: 258px;
          height: 120px;
          border-radius: 5px;
          margin-left: -1px;
          /* background-color: #CCCCCC; */
          margin-top: -12px;
      }
     
      .tophed {
          font-size: 16px;
          color: #c52a2c;
      }
      
      .route .col-md-6 div{
        border-radius: 5px;
        padding: 20px;
        height: 200px;
        box-shadow: 0px 0px 10px #e0e0e0;
      }
      
      .route .col-md-6 div h2{
        font-weight: 700;
        margin-bottom: 10px;
      }
      
      .route .col-md-6 div h5{
        font-weight: 700;
        margin-bottom: 7px;
      }
      
      .row.history{
          padding: 15px 0;
           border-bottom: 1px dotted #ccc;
           margin-bottom:10px;
      }
      .row.history h4{
          font-weight: 600;
          margin-bottom: 7px;
      }
     
     
/*    .tracking_noresult, .grid_8.alpha.omega.wrap{
      display: none;
    }*/
    
    table.dataTable td,#orderTblez td{
      font-size: 1.1em;
    }

    </style>
    
    <style>
    @import url("https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600&display=swap");
*, *::after, *::before {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}




figure figcaption h4 {
  font-size: 1.4rem;
  font-weight: 500;
}
figure figcaption h6 {
  font-size: 1.5rem;
  font-weight: 300;
  color:#000;
}
figure figcaption h2 {
  font-size: 1.6rem;
  font-weight: 500;
}

.order-track {
    width:100%;
  margin-top: 2rem;
  padding: 0 1rem;
  border-top: 1px dashed #2c3e50;
  padding-top: 2.5rem;
  display: flex;
  flex-direction: column;
  
  transform-origin: top center;
    padding:0 !important;
    margin-top: 0!important;
    padding-top: 0!important;
}
.order-track-step {
  display: flex;
  height: 7rem;
  padding: 10px 0;
}
.order-track-step:last-child {
  overflow: hidden;
  height: auto;
}
.order-track-step:last-child .order-track-status span:last-of-type {
  display: none;
}
.order-track-status {
  margin-right: 1.5rem;
  position: relative;
}
.order-track-status-dot {
  display: block;
  width: 1.2rem;
  height: 1.2rem;
  border-radius: 50%;
  background: #f05a00;
}
.order-track-status-line {
  display: block;
  margin: 0 auto;
  width: 2px;
  height: 6rem;
  background: #f05a00;
}
.order-track-text-stat {
  font-size: 16px;
  font-weight: 500;
  margin-bottom: 2px!important;
}
.order-track-text-sub {
  font-size: 14px;
  font-weight: 300;
  width:100%;
}

.order-track {
  transition: all .3s height 0.3s;
  transform-origin: top center;
}
.track-head img{
    max-width:150px;
}
.track-head h4,.track-head h6 {
   text-transform: uppercase;
    padding: 0;
    margin: 0;
    font-weight: 400;
    color: #f1853e;
    font-size: 18px;
    line-height: 24px;
}
.trck-tp {
    margin-top:35px;
}
.track-title{
    margin-top: 25px;
    text-transform: uppercase;
    color: #ebbe08;
    border-bottom: 2px #ec1c25 solid;
}
.root{
   
}


/* Define an animation behavior */
@keyframes spinner {
  to { transform: rotate(360deg); }
}
/* This is the class name given by the Font Awesome component when icon contains 'spinner' */
.icon-spinner {
  /* Apply 'spinner' keyframes looping once every second (1s)  */
  animation: spinner 1s linear infinite;
}


.parallax {
    background: url(style/images/art/parallax1.jpg) fixed no-repeat center center;
    background-size: cover;
    position: relative;
    z-index: 1;
    border-bottom: 1px solid rgba(0,0,0,0.1);
    color: #FFF !important;
    max-height: 22em;
}
.parallax .inner:after{
    content: ;
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background-color: #0000008f;
    opacity: 0.6;
    z-index: 1;
}
.trackWrap{
    padding: 5em 0;
    position: relative;
    text-align: center;
}
.parallax .headline{
    position:relative;
    z-index:2;
}
.trackWrap .input-wrap{
    display: flex;
    width: 50%;
    margin: auto;
}
.trackWrap .input-wrap input[type="text"]{
        width: 100%;
    height: 44px;
    border: 2px #e9e9e9 solid;
    margin-right: 5px;
    color:#000;
    border-radius: 0;
}
.trackWrap .input-wrap input[type="text"]:focus{
    border:2px #ddd solid ;
    outline:none;
    
}
.trackWrap .input-wrap input[type="button"]{
    background: #ca0000;
    color: #fff;
    text-transform: uppercase;
    border-radius: 0;
    transition: 0.5s;
    cursor: pointer;
}
.mainTitle
{
    padding: 15px 0;
    text-transform: uppercase;
    font-weight: 600;
    font-size: 32px;
    color: #ca0000;
}
.bookInfo td{
      font-size: 1.1em;
    
    }
@media (max-width: 768px){
    .order-track-step {
    height: auto;
    padding: 0 0;
}
.root {
    padding: 1px 0 0 0px;
     box-shadow: none; 
    margin-top: 10px;
}
.trackWrap .input-wrap {
    display: flex;
    width: 100%;
    margin: auto;
}
.mainTitle {

    font-size: 18px;
    }
}
</style>

<div class="post-parallax parallax inverse-wrapper parallax1" style="background-image: url(https://janes.orielteq.com/frond/style/images/art/parallax1.jpg">
    <div class="container inner text-center">
      <div class="headline text-center">
        <div class="trackWrap">
            <div class="input-wrap">
                
                <input type="text"   id="txtawbno" name="track_id" value="<?=(!empty($id) ? $id : '');?>"> <input type="button" class="btn"  onclick="searchAwb();" value="Track"> 
            </div>
            
            
        </div>
      </div>
      <!-- /.headline --> 
    </div>
    <!--/.container --> 
  </div>

<div class="about-section" style="margin-bottom: 50px;background-image:url('<?=base_url('dhl/assets/img/map.png');?>');">

    <div class="e-payment-section">
        <div class="col-md-12 col-sm-12 col-xs-12 payment-left">
        

                <div class="col-md-12 col-sm-12 col-xs-12 payment-left">
    <?php   if(!empty($result)){
                if($result->status =="Success"){  ?>
                
                <div class="row">
                    <h3 class="mainTitle">Booking Information</h3>
                    <table class=" bookInfo display responsive nowrap" width="100%">
                        <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>AWB NO</th>
                            <th>Center</th>
                            <th>Pickup</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            <td><?php if(!empty($result->response->order_id)){ echo $result->response->order_id; }?></td>
                            <td><?php if(!empty($result->response->awbno)){ echo $result->response->awbno;}?></td>
                            <td><?php if(!empty($result->response->carrier)){ echo $result->response->carrier;}?></td>
                            <td><?php if(!empty($result->response->time)){ echo $result->response->time;}?></td>
                            <td><?php if(!empty($result->response->current_status)){ echo $result->response->current_status;}?></td>
                        </tbody>
                        
                    </table>
                </div>
                
                    
                    <section class="row html-content" id="html-content">
                        <div class="main-title-head" style="position:relative"> 
                         <h4 class="mainTitle">Tracking Details</h4>
                         <!--<a href="javascript:void(0)"  id="downloadPDF" onclick="CreatePDFfromHTML('<?php if(!empty($result->response->order_id)){ echo $result->response->order_id; }?>')" style="position:absolute;right:20px; top:0;text-transform:uppercase">Print to pdf</a>-->
                        </div>
                        
                        <figure class="track-head">
                        
                             
                             <divv class="row">
                                   <table id="orderTblez" style="width:100%" class="table table-striped- table-bordered table-hover table-checkable" >
                                            <thead>
                                                <tr>
                                                    <th>SL No</th>
                                                    <th>Date</th>
                                                    <th>Location</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                 <?php if(!empty($result->response->scan)){ $i= count($result->response->scan); //print_r($result);
                                            foreach ($result->response->scan as $key){?>
                                            
                                          
                                                <tr>
                                                     <td><?=$i?></td>
                                                    <td><?=$key->time?></td>
                                                    <td><?=$key->location?></td>
                                                    <td><?=$key->status_detail?></td>
                                                </tr>
                                     

                                               
                                                   <?php 
                                           
                                                $i--; }
                                            }
                                        ?>
                                                  
                                            </tbody>
                                        </table>
                             </div>
                            
                            
                        </figure>

                    </section>
                    <div class="editor" id="editor"></div>


            <?php
            }else{
                    $status ="Failed";
                }
               
                
            } ?>
            <div id="editor"></div>

        </div>

          
        </div>
        
        <div class="clearfix"></div>
    </div>
    
     <div class="container">
              
            
            
            
    <!--start-carrer-->
    <!----- Comman-js-files ----->
    
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>



<script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>

<!-- SEARCHPANES -->
<link href="https://cdn.datatables.net/searchpanes/2.0.1/css/searchPanes.dataTables.css" rel="stylesheet"
    type="text/css" />
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/searchpanes/1.3.0/js/dataTables.searchPanes.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>


    <script>
    // let table = new DataTable('#orderTble',{
    //     "bFilter" : false,
    //     "paging": false,
    //     "responsive": true,
        
    //      //"aaSorting": [[1, 'desc']],
    //     //  "order"    : [[1, 'asc']],
    //     //  "order"    : [[2, 'desc']], 
    //     //  "order"    : [[3, 'desc']], 
    //     //  "order"    : [[4, 'desc']], 
    //      });
    
    let table2 = new DataTable('#bookInfo',{
        "bFilter" : false,
        "paging": false,
        responsive: true
        //"order":[[2,"desc"]]
    });
    
        $(document).ready(function () {
            $("#tab2").hide();
            $("#tab3").hide();
            $("#tab4").hide();
            $(".tabs-menu a").click(function (event) {
                event.preventDefault();
                var tab = $(this).attr("href");
                $(".tab-grid").not(tab).css("display", "none");
                $(tab).fadeIn("slow");
            });
        });
    </script>
</div>



<script type="text/javascript">
    window.onload = function(){
        $('#txtawbno').keypress(function (e) {
         var key = e.which;
         if(key == 13)  // the enter key code
          {
            searchAwb();
            return false;  
          }
        });   
    };
    function searchAwb() {      
        $(".error").remove();   
        var hasError = false;
        var awbNum = $('#txtawbno').val().trim();
        if(awbNum == '' || awbNum.length < 6) {
          $("#txtawbno").after('<span style="color:#bf0c0c;font-size:11px;position:relative;display:block;" class="error">Please enter a valid Airway Bill Number.</span>');
          hasError = true;
        }
        
        if(!hasError)
        {
           location.href = '/order/' + awbNum;
        }
    }
    
    
    //Create PDf from HTML...
function CreatePDFfromHTML(e) {
    $('.html-content').css('box-shadow','none');
    $('#downloadPDF').html('<label class="icon icon-spinner icon-spin"></label>');
    var HTML_Width = $(".html-content").width();
    var HTML_Height = $(".html-content").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas($(".html-content")[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("https://image.flaticon.com/icons/svg/970/svg", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'svg', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'svg', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("track_id_"+e+".pdf");
        //$(".html-content").hide();
          $('.html-content').css('box-shadow','0px 3px 12px #ddd;');
    $('#downloadPDF').html('Print to pdf');
    });
}
</script>