<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="part/style.css">
    <?php require_once 'part/header.php'?>
    <?php require_once 'connect.php'?>
    <title>صدور حواله - هانی الکترونیک </title>
    <style>
        .form-control{
            width: 350px;
        }
    </style>
</head>
<body>
    <?php require_once 'part/navbar.php'?>

<center>
        <div class="admin-body">
            <h4>صدور حواله : </h4>
            <div style="text-align: left">

                <form action="add_havale_action.php" method="post">
                   <h5 style="text-align: right">کالای شماره 1 :  </h5>
                    <input type="text" name="name1" placeholder="نام کالا :  " id="" class="form-control">
                    <br>
                    <input type="text" name="count1" placeholder="تعداد : " id="" class="form-control">
                    <br>
                    <textarea placeholder="توضیحات : " class="form-control" name="des1"></textarea>
                    <br>
                    <br>
                    <h5 style="text-align: right">کالای شماره 2 :  </h5>
                    <input type="text" name="name2" placeholder="نام کالا :  " id="" class="form-control">
                    <br>
                    <input type="text" name="count2" placeholder="تعداد : " id="" class="form-control">
                    <br>
                    <textarea placeholder="توضیحات : " class="form-control" name="des2"></textarea>
                    <br>
                    <br>
                    <h5 style="text-align: right">کالای شماره 3 :  </h5>
                    <input type="text" name="name3" placeholder="نام کالا :  " id="" class="form-control">
                    <br>
                    <input type="text" name="count3" placeholder="تعداد : " id="" class="form-control">
                    <br>
                    <textarea placeholder="توضیحات : " class="form-control" name="des3"></textarea>
                    <br>
                    <h5 style="text-align: right">کالای شماره 4 :  </h5>
                    <input type="text" name="name4" placeholder="نام کالا :  " id="" class="form-control">
                    <br>
                    <input type="text" name="count4" placeholder="تعداد : " id="" class="form-control">
                    <br>
                    <textarea placeholder="توضیحات : " class="form-control" name="des4"></textarea>
                    <br>
                    <h5 style="text-align: right">کالای شماره 5 :  </h5>
                    <input type="text" name="name5" placeholder="نام کالا :  " id="" class="form-control">
                    <br>
                    <input type="text" name="count5" placeholder="تعداد : " id="" class="form-control">
                    <br>
                    <textarea placeholder="توضیحات : " class="form-control" name="des5"></textarea>

                    <br>
                    <center><input type="submit" value="صدور حواله " class="btn btn-success"></center>
                </form>
            </div>
        </div>
</center>
</body>
</html>