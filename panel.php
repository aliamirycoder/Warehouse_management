<?php
session_start();
if($_SESSION['login']==true){

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
    <meta name="viewport">
    <link rel="stylesheet" href="part/style.css">
    <?php require_once 'part/header.php'?>
    <?php require_once 'connect.php'?>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>داشبرد - هانا الکترونیک </title>
</head>
<body style="text-align: right !important">
<?php require_once 'part/navbar.php'?>
    <center>    <div class="admin-body">
            <table width="100%" >
                <tr>
                    <td style="text-align: center">
                        <h3>امار موجودی انبار : </h3>
                    </td>
                    <td style="text-align: left">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal012">
                            افزودن کالا
                        </button>
                        <div class="modal fade" id="exampleModal012" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ورود  </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="add.php" >
                                            <input type="hidden" name="where" value="panel">
                                            <input type="text" name="name"  class="form-control" placeholder="نام کالا را وارد کنید   ">
                                            <br>
                                            <input type="text" name="count"  class="form-control" placeholder="تعداد را وارد کنید  ">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success"   >ورود  </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                    </td>
                </tr>
            </table>
        <table width="100%" class="table-admin">
            <tr>
                <td><b>کد محصول : </b></td>
                <td><b> نام محصول : </b></td>
                <td><b> موجودی : </b></td>
                <td><b>عملیات : </b></td>
            </tr>
            <?php
                $qury="SELECT * FROM depo   ORDER BY id DESC";
                mysqli_query($db, "SET NAMES utf8");
                $result=$db->query($qury);
                if($result->num_rows >0) {
                while ($row = $result->fetch_array()) {
                if ($row['mojody']<=0){
                    echo '<tr class="no-mojody">';
                }
                else{
                    echo '<tr>';
                }
                    ?>

                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo number_format($row['mojody']) . " عدد";?></td>
                        <td>
                            <table class="table-no-border">
                                <tr>
                                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $row['id']?>">
                                            ورود
                                        </button>
                                        <div class="modal fade" id="exampleModal<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">ورود  <?php echo $row['name']?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="enter.php" >
                                                            <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                                            <input type="hidden" name="where" value="panel">
                                                            <input type="text" name="count"  class="form-control" placeholder="تعداد را وارد کنید  ">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success"   >ورود  </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal1<?php echo $row['id']?>">
                                        خروج
                                        </button>
                                        <div class="modal fade" id="exampleModal1<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">خروج  <?php echo $row['name']?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="exit.php" >
                                                            <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                                            <input type="hidden" name="where" value="panel">
                                                        <input type="text" name="count"  class="form-control" placeholder="تعداد را وارد کنید  ">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger"   >خروج  </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <form action="static.php">
                                            <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                            <input type="submit" value="آمار دقیق " class="btn btn-primary" style="margin-top: 15px">
                                        </form>
                                    </td>
                                </tr>
                            </table>
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