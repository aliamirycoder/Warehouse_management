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
    <title>تاریخچه - هانا الکترونیک </title>
</head>
<body>
    <?php require_once 'part/navbar.php'?>.
    <center><div class="admin-body">
            <h4>تاریخچه ورود و خروج قطعات : </h4>

            <table width="100%" cellpadding="8px">
                <tr>
                    <td><b>نام کالا : </b></td>
                    <td><b>عملیات  : </b></td>
                    <td><b>تعداد   : </b></td>
                    <td><b>تاریخ    : </b></td>
                </tr>

                <?php
                $qury="SELECT * FROM `action` ORDER BY id   DESC ";
                mysqli_query($db, "SET NAMES utf8");
                $result=$db->query($qury);
                if($result->num_rows >0) {
                    while ($row = $result->fetch_array()) {?>
                        <tr>
                            <td>
                                <?php
                                $qury1="SELECT * FROM `depo`where id='".$row['kala']."'";
                                mysqli_query($db, "SET NAMES utf8");
                                $result1=$db->query($qury1);
                                if($result1->num_rows >0) {
                                    while ($row1 = $result1->fetch_array()) {
                                        echo $row1['name'];
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($row['what']=='add'){
                                echo '<span style="color: limegreen">ورود قطعه </span>';
                                }
                                else{
                                    echo '<span style="color: red">خروج  قطعه </span>';
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo $row['count']?>
                            </td>
                            <td>
                                <?php echo $row['when']?>
                            </td>
                        </tr>


                <?php

                    }
                }


                ?>
            </table>
        </div></center>
</body>
</html>
