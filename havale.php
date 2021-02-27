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
    <title>لیست حواله ها - هانا الکترونیک </title>
    <style>
        h4{
            text-align: right;
        }
    </style>
</head>
<body>
    <?php require_once 'part/navbar.php'?>
    <center><div class="admin-body">
        <table width="100%">
            <tr>
                <td style="text-align: right"><h4>حواله های موجود : </h4></td>
                <td style="text-align: left"><a href="add_havale.php"><button class="btn btn-success">صدور حواله </button></a> </td>
            </tr>
        </table>
            <table width="100%" class="table-admin">
                <tr>
                    <td><b>کد حواله : </b></td>
                    <td><b>شرح حواله : </b></td>
                    <td> <b>تاریخ صدور :</b> </td>
                    <td><b> عملیات :</b> </td>

                </tr>
           <?php
           $des="";
           $qury="SELECT * FROM havale   ORDER BY id DESC";
           mysqli_query($db, "SET NAMES utf8");
           $result=$db->query($qury);
           if($result->num_rows >0) {
               while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo "00".$row['id']?></td>


            <?php
                $qury1="SELECT * FROM `under-havale`  WHERE havale_id = ".$row['id']."";
                mysqli_query($db, "SET NAMES utf8");
                $result1=$db->query($qury1);
                if($result1->num_rows >0) {
                    while ($row1 = $result1->fetch_array()) {
                        $des .= $row1['name']." ".$row1['count']."<br>";
                    }
                } ?>
                        <td> <?php echo $des?></td>
                        <?php
                        $des="";
                        ?>
                        <td> <?php echo $row['date']?></td>
                        <td>
                            <form action="print.php">
                                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                <input type="hidden" name="date" value="<?php echo $row['date']?>">
                                <input type="submit" style="margin-top: 10px" value="پرینت حواله " class="btn btn-success">
                            </form>
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