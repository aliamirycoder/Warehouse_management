<?php
session_start();
if(isset($_SESSION['login'])){

}
else{
    ?>
    <script>
        location.replace('index.php')
    </script>
    <?php
} ?>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="part/style.css">
    <?php require_once 'part/header.php'?>
    <?php require_once 'connect.php'?>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    $name="";
    $qury="SELECT * FROM depo   where id='".$_GET['id']."' ORDER BY id DESC";
    mysqli_query($db, "SET NAMES utf8");
    $result=$db->query($qury);
    if($result->num_rows >0) {
        while ($row = $result->fetch_array()) {
            $name=$row['name'];
            $mojody=$row['mojody'];
        }
    }

    $cheak=0;
    $add_date="";
    $qury1="SELECT * FROM action   where kala='".$_GET['id']."' && what = 'add'";
    mysqli_query($db, "SET NAMES utf8");
    $result1=$db->query($qury1);
    if($result1->num_rows >0) {
        while ($row1 = $result1->fetch_array()) {
            if ($cheak==0){
                $add_date =$row1['when'];
            }
        }
    }
    ?>


    <?php
    $cheak=0;
    $exit_date="";
    $qury1="SELECT * FROM action   where kala='".$_GET['id']."' && what = 'exit'";
    mysqli_query($db, "SET NAMES utf8");
    $result1=$db->query($qury1);
    if($result1->num_rows >0) {
        while ($row1 = $result1->fetch_array()) {
            if ($cheak==0){
                $exit_date =$row1['when'];
            }
        }
    }
    ?>


    <title> اماره دقیق <?php echo $name ?> - هانا الکترونیک </title>
    <style>
        h5{
            text-align: right;
        }
    </style>
</head>
<body>

<?php require_once 'part/navbar.php' ?>
    <center><div class="admin-body">
            <form action="delete.php">
                <button type="submit" class="btn btn-danger" style="float: left">حذف  کالا </button>
            </form>
        <h4 style="text-align: right">آمار دقیق کالای <?php echo $name?></h4>
            <h5>            تعداد موجود از کالا :
                <?php echo number_format($mojody)?>
                عدد
            </h5>
            <h5 >
                اخرین ورود :
                <?php echo $add_date?>
            </h5>
            <h5>
                اخرین خروج :
                <?php echo $exit_date?>
            </h5>
            <br>
            <h4 style="text-align: right">
                امار دقیق ورود و خروج :
            </h4>
            <table width="100%" border="1px">
                <tr>
                    <td><b>عملیات : </b></td>
                    <td><b> تعداد : </b></td>
                    <td><b>تاریخ : </b></td>
                </tr>
                <tr>
                    <td>ورود کالا </td>
                    <td> 1500</td>
                    <td> 99/8/9</td>
                </tr>
            </table>
    </div></center>
</body>
</html>