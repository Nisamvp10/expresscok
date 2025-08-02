<?php
namespace App\Libraries;

use Mpdf\Mpdf;

class GenPDF
{
    public function generate($html, $filename = 'document.pdf')
    {
        $mpdf = new Mpdf();
        
        $mpdf->WriteHTML($html);
        return $mpdf->Output('report-'.date('d-m-Y h:i:s').'.pdf', 'I'); // 'I' for inline, 'D' for download
    }
}
