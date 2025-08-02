<?php
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\ReportsModel;
use App\Models\BranchesModel;
use Mpdf\Mpdf;

class Reports extends Controller{
    protected $reportModel;

    function __construct(){
        $this->reportModel = new ReportsModel();
        $this->branchModel = new BranchesModel();
    }
    function index(){
        $page = (haspermission('','view_reports') ? "Reports" : lang('Custom.accessDenied'));
        $branches = $this->branchModel->where('status',1)->findAll();
        return view('admin/reports/index',compact('page','branches'));
    }

    function list() {

        if(!$this->request->isAJAX()){
            return $this->response->setJSON([
                'success' => false,
                'message' => lang('Custom.invalidRequest')
            ]);
        }

        if(!hasPermission('','view_reports')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => lang('Custom.accessDenied')
            ]);
        }

        $searchInput = $this->request->getGet('search');
        $fromDate   = $this->request->getGet('fromDate');
        $toDate     = $this->request->getGet('toDate');
        $branch     = $this->request->getGet('branch');

        $reports = $this->reportModel->getReports($searchInput,$branch,$fromDate,$toDate);
        return $this->response->setJSON([
            'success' => true,
            'report'    => $reports
        ]);
    }
    public function generatePDF()
    {
         $mpdf = new Mpdf([
          'format' => 'A4',
            'margin_top' => 50,     
            'margin_bottom' => 15,
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_header' => 10,   
            'margin_footer' => 10,
        ]);

        $searchInput = $this->request->getGet('search');
        $fromDate   = $this->request->getGet('fromDate');
        $toDate     = $this->request->getGet('toDate');
        $branch     = $this->request->getGet('branch');

        $reports = $this->reportModel->getReports($searchInput,$branch,$fromDate,$toDate);
        $total = 0;
        foreach($reports as $itm){
            $total += $itm['price'];
        }
        // HTML content (can be from a view)
        $html = view('admin/reports/report_template', ['title' => 'My PDF Report','reports'=> $reports]);
        $mpdf->SetHTMLHeader('
               <div class="head row" style=" display:block; border:1px red solid; text-align: center; font-weight: bold;font-size:18px;width:100%;">
            <div class="logo col-sm-8" style="width:340px;text-align:left;padding:0px;margin:0px;" >
               '. (getappdata('logo') ? '<img src="'.base_url('vender/frond/images/logo.svg').'" style="text-align:left;padding:0;margin:0" width="100px"/>':  '<i style="margin-right: 10px; font-size: 1.8rem; color: var(--primary); width: 40px; height: 40px; background: #f1f1f1; text-align: center; border-radius: 50%; display: flex; align-items: center; justify-content: space-evenly; border: 1px #d1d1d1 solid;">'.substr(getappdata('company_name'), 0, 1) ).'</i>
                
                    <div class="hd-title w-100" style="font-size:13px;padding:0;margin:0" > '.getappdata('company_name').'  </div>
                    <p style="font-size:13px;padding:0;margin:0;font-weight:100" >'.getappdata('address') . getappdata('city'). getappdata('state'). getappdata('zip_code') .'</p>
                    <p style="font-size:13px;padding:0;margin:0;font-weight:100" >'.getappdata('phone').'</p>
                </div>
               
                <div class="col-sm-4" style="width: 50%; flot:right; text-align: right; margin-top: 20px;font-size:12px">
                <h3 style="font-size:18px;font-weight:500;font-familly">REPORT STRUCTURE</h3>
                <table class="ml-auto " style="padding-left:10px;width:100%;float:right">
                            <tbody class="orderDtl">
                             <tr>
                                    <td class="text-main text-bold">Generated Date : </td>
                                    <td class="text-right">'.date('d-m-Y h:i:s').'</td>
                                </tr>
                                <tr>
                                    <td class="text-main text-bold">Total Amount # : </td>
                                    <td class="text-info text-bold text-right">'.(!empty( $total)?  number_format($total,2) :'').'</td>
                                </tr>
                               
                           
                               
                               
                            </tbody>
                        </table>
                </div>
                </div>
            ');
        $mpdf->WriteHTML($html);

        

        // Download the PDF directly
        return $this->response
                    ->setHeader('Content-Type', 'application/pdf')
                    ->setBody($mpdf->Output('report-'.date('d-m-Y h:i:s').'.pdf', 'I')); // 'I' to show in browser, 'D' to download
    }
}