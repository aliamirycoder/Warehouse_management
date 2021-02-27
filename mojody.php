<?php
include ('library/tcpdf_min/tcpdf.php');
include  'connect.php';
require_once 'library/jdf.php';






/*$qury="SELECT * FROM  `under-havale` where havale_id =".$_GET['id'];
mysqli_query($db, "SET NAMES utf8");
$result=$db->query($qury);
if($result->num_rows >0) {
    while ($row = $result->fetch_array()) {

    }
}*/
ob_start();

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set font


// add a page
$pdf->AddPage();
$pdf->SetFont('xtraffic', '', 12);
$htmlpersian = "

<p style='text-align: left !important'>هانا الکترونیک </p>

";
$pdf->WriteHTML($htmlpersian, true, 0, true, 0);


$pdf->SetFont('xtitre', '', 12);
// Persian contentl
$htmlpersian = '
<body dir="rtl" style="text-align: center">
<br>
<table>
<tr>
<td> تاریخ : '.jdate("d / m / y ").'</td>
<td><h1>لیست موجودی انبار : </h1></td>
</tr>
</table>
<br>
<br>
<table border="1px" cellpadding="5px">
<tr>
<td><b>تعداد :  </b>  </td>
<td><b>نام کالا : </b></td>
<td><b>کد کالا : </b>  </td>
</tr>';
$qury="SELECT * FROM  `depo` ORDER BY `id` ASC";
mysqli_query($db, "SET NAMES utf8");
$result=$db->query($qury);
if($result->num_rows >0) {
    while ($row = $result->fetch_array()) {
        $htmlpersian .= '
        <tr>    
        <td>'."عدد ".number_format($row['mojody']).'</td>
        <td>'.$row['name'].'</td>
        <td>00'.$row['id'].'</td>
        </tr>
        ';
    }
}
$htmlpersian .="</table>

";
$pdf->WriteHTML($htmlpersian, true, 0, true, 0);


$pdf->SetFont('xkoodak', '', 12);

// set LTR direction for english translation
$pdf->setRTL(false);


//Close and output PDF document
$pdf->Output();