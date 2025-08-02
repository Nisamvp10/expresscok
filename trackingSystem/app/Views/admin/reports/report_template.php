<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title) ?></title>
    <style>
        body { font-family: sans-serif; font-size: 12pt; }
        h1 { color: darkred; }
    </style>
    <style>
             .spacer{
                    height: 40px;
                }
                .row{
                    display: flex;
                    flex-wrap: wrap;
                }
                .p-3 {
                    padding: 1rem !important;
                }    
                .col-sm-8 {
                    flex: 0 0 auto;
                    width: 66.66666667%;
                }   
                .col-md-4 {
                    flex: 0 0 auto;
                    width: 33.33333333%;
                }
                .w-100{
                    width:100%;
                }
                table{
                    width: 100%;
                    border-collapse: collapse;
                }
                thead td {
                    background: #ddd;
                }
                .head{
                    width:60%;
                    float:left;
                    border:1px red solid;
                }
                .head table td{
                    font-size:13px;
                    text-align:right;
                }
                .logo{
                    float:left
                }
                logo img{
                    float:left
                }
                .orderDetailTbl 
                {
                    width:100%;
                }
                .orderDetailTbl td{
                        padding:10px 0;
                }
                table.orderDetailTbl {
                    width: 100%;
                    border-collapse: collapse;
                }
                table.orderDetailTbl th, table.orderDetailTbl td {
                    border: 1px solid #ddd;
                    padding: 3px;
                    text-align: left;
                }
                table.orderDetailTbl td.custom-padding {
                    padding-left: 20px;
                    padding-right: 20px;
                    font-size:12px
                }
                table.orderDetailTbl th {
                    background-color: #f2f2f2;
                    font-weight: bold;
                    padding:10px
                }
                    table.orderDetailTbl td{
                    font-size:12px;
                    padding:10px
                    }
            .headLogo{
                margin-right: 10px;
                font-size: 1.8rem;
                color: var(--primary);
                width: 40px;
                height: 40px;
                background: #f1f1f1;
                text-align: center;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: space-evenly;
                border: 1px #d1d1d1 solid;
            }
            </style>
</head>
<body>
   
    
    <table class="w-100 mt-4 table orderDetailTbl" style="font-size:12px">
        <thead>
            <tr>
                <th class="">Branch</th>
                <th class="">Client</th>
                <th class="">Staff</th>
                <th class="">Total Spend</th>
                <th class="">Service</th>
                <th class="">Booking Date</th>
                <th class="">Status</th>
                <th class="">Price</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php
            if(!empty($reports)){
               
                foreach($reports as $result) { ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-2 py-2 whitespace-nowrap">
                        
                            <div class="flex items-center">
                                <div class="text-sm font-medium text-gray-900"><?=$result['branch_name'];?></div>
                            </div>
                        </td>
                        <td class="px-2 py-2 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?=$result['name'];?></div>
                        </td>
                        <td class="px-2 py-2 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?=$result['staff_name'];?></div>
                        </td>
                        <td class="px-2 py-2 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?=$result['duration'];?> Min</div>
                        </td>
                        <td class="px-2 py-2 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?=$result['specialties'];?></div>
                        </td>
                        <td class="px-2 py-2 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?=date('d-M-Y',strtotime($result['booking_date']));?> </div>
                        </td>                         
                        <td class="px-2 py-2 whitespace-nowrap">
                             <div class="text-sm text-gray-900"><span class="badge rounded-pill  "><?=$result['staff_name'];?></span></div>
                        </td>
                        <td class="px-2 py-2 whitespace-nowrap">
                             <div class="text-sm text-gray-900"><?=number_format($result['price'],2);?></div>
                        </td>
                    </tr>
                <?php
                }
            } ?>
        </tbody>
    </table>
</body>
</html>
