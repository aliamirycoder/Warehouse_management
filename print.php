<?php
require_once('library/tcpdf_min/tcpdf.php');
require_once 'connect.php';
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
$pdf->SetFont('xtitre', '', 12);
$htmlpersian = "



";
$pdf->WriteHTML($htmlpersian, true, 0, true, 0);
$pdf->SetFont('xtitre', '', 12);
// Persian contentl
$htmlpersian = '
<body dir="rtl" style="text-align: center">
<table width="100%">
<tr>
<td></td>
<td><h1 style="margin-bottom: 100px">  شرکت هانی الکترونیک  </h1></td>
<td></td>
</tr>
</table>
<br>
<br>
<table>
<tr>
<td>شماره : '."00".$_GET['id'].'</td>
<td><h3>«برگ خروج کالا»</h3></td>
<td>تاریخ : '.$_GET['date'].'</td>
</tr>
</table>
<br>
<br>
<table border="1px" cellpadding="5px">
<tr>
<td width="30%"><b>ملاحضات </b>  </td>
<td width="30%"><b>تعداد</b></td>
<td width="30%"><b>شرح کالا</b>  </td>
<td width="10%">ردیف </td>
</tr>';
$cheak=1;
$qury="SELECT * FROM  `under-havale` where havale_id =".$_GET['id'];
mysqli_query($db, "SET NAMES utf8");
$result=$db->query($qury);
if($result->num_rows >0) {
    while ($row = $result->fetch_array()) {
        $htmlpersian .= '
        <tr>    
        <td>'.$row['des'].'</td>
        <td> عدد '.$row['count'].'</td>
        <td>'.$row['name'].'</td>
        <td>'.$cheak.'</td>
        </tr>
        ';
        $cheak++;
    }


}
for ($i=$cheak;$i<= 5;$i++) {
    $htmlpersian .= "
        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>".$i."</td>
</tr>
        ";
}
    $htmlpersian .="</table>
<br>
<br>
<table>
<tr>
<td>امضای تحویل گرینده : </td>
<td> امضای صادر کننده  :  </td>
</tr>
</table>
";
$pdf->WriteHTML($htmlpersian, true, 0, true, 0);


$pdf->SetFont('xkoodak', '', 12);

// set LTR direction for english translation
$pdf->setRTL(false);


//Close and output PDF document
$pdf->Output();