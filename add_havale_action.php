<?php
require_once 'connect.php';
require_once 'library/jdf.php';
require_once('library/tcpdf_min/tcpdf.php');

ob_start();
$query="INSERT INTO `havale` (`id`, `date`) VALUES (NULL, '".jdate("d / m / y ")."');";
mysqli_query($db, "SET NAMES utf8");
if(mysqli_query($db,$query) === TRUE){

}
$test=0;
$date="";
$qury="SELECT * FROM havale   ORDER BY id DESC";
mysqli_query($db, "SET NAMES utf8");
$result=$db->query($qury);
if($result->num_rows >0) {
    while ($row = $result->fetch_array()) {
        if ($test==0){
            $id=$row['id'];
            $date=$row['date'];
            $test=1;
        }
    }
}
if (isset($_POST['name1'])){
    $query="INSERT INTO `under-havale` (`id`, `name`, `count`, `des`, `date`, `havale_id`) 
    VALUES (NULL, '".$_POST['name1']."', '".$_POST['count1']."', '".$_POST['des1']."', '".jdate("d / m / y ")."', '".$id."');";
    mysqli_query($db, "SET NAMES utf8");
    if(mysqli_query($db,$query) === TRUE){

    }
}

if (isset($_POST['name2']) && $_POST['name2'] !=""){
    $query="INSERT INTO `under-havale` (`id`, `name`, `count`, `des`, `date`, `havale_id`) 
    VALUES (NULL, '".$_POST['name2']."', '".$_POST['count2']."', '".$_POST['des2']."', '".jdate("d / m / y ")."', '".$id."');";
    mysqli_query($db, "SET NAMES utf8");
    if(mysqli_query($db,$query) === TRUE){

    }
}

if (isset($_POST['name3'])  && $_POST['name3'] !="" ){
    $query="INSERT INTO `under-havale` (`id`, `name`, `count`, `des`, `date`, `havale_id`) 
    VALUES (NULL, '".$_POST['name3']."', '".$_POST['count3']."', '".$_POST['des3']."', '".jdate("d / m / y ")."', '".$id."');";
    mysqli_query($db, "SET NAMES utf8");
    if(mysqli_query($db,$query) === TRUE){

    }
}
if (isset($_POST['name4'])  && $_POST['name4'] !="" ){
    $query="INSERT INTO `under-havale` (`id`, `name`, `count`, `des`, `date`, `havale_id`) 
    VALUES (NULL, '".$_POST['name4']."', '".$_POST['count4']."', '".$_POST['des4']."', '".jdate("d / m / y ")."', '".$id."');";
    mysqli_query($db, "SET NAMES utf8");
    if(mysqli_query($db,$query) === TRUE){

    }
}

if (isset($_POST['name5'])  && $_POST['name5'] !="" ){
    $query="INSERT INTO `under-havale` (`id`, `name`, `count`, `des`, `date`, `havale_id`) 
    VALUES (NULL, '".$_POST['name5']."', '".$_POST['count5']."', '".$_POST['des5']."', '".jdate("d / m / y ")."', '".$id."');";
    mysqli_query($db, "SET NAMES utf8");
    if(mysqli_query($db,$query) === TRUE){

    }
}







ob_start();

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set font


// add a page
$pdf->AddPage();





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
<td>شماره : 00'.$id.'</td>
<td><h3>«برگ خروج کالا»</h3></td>
<td>تاریخ : '.$date.'</td>
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
$qury="SELECT * FROM  `under-havale` where havale_id =".$id;
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
?>
