<?php
require_once 'connect.php';
require_once 'library/jdf.php';
$mojody=0;
$id=0;
$qury="SELECT * FROM depo   where id='".$_GET['id']."'";
mysqli_query($db, "SET NAMES utf8");
$result=$db->query($qury);
if($result->num_rows >0) {
    while ($row = $result->fetch_array()) {
        $mojody=$row['mojody'];
        $id=$row['id'];
    }
}
$mojody=$mojody-$_GET['count'];

$up="UPDATE `depo` SET `mojody` = '".$mojody."' WHERE `id` = '".$_GET['id']."'";
mysqli_query($db, "SET NAMES utf8");
$result=$db->query($up);


$date=jdate("d / m / y ");
$query="INSERT INTO `action` (`id`, `kala`, `what`, `count`, `when`) VALUES (NULL, '".$id."', 'exit', '".$_GET['count']."', '".$date."');";
mysqli_query($db, "SET NAMES utf8");
$result=$db->query($query);

if ($_GET['where']=='panel'){
    ?>
    <script>
        location.replace('panel.php')
    </script>
    <?php
} ?>