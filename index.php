<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="part/style.css">
    <?php require_once 'part/header.php'?>
    <title>ورود</title>
</head>
<body><br>
<br>
<br>
<br>
<br>
<br>
<form action="test-login.php" method="post">
<center><div class="login">
        <h1>خوش آمدید </h1>
        <br>
    <table style="width: 100%;">
        <tr>
            <td>نام کاربری : </td>
            <td><input type="text" class="form-control" name="userName"></td>
        </tr>

        <tr>
            <td>رمز عبور :  </td>
            <td><input type="password" class="form-control" name="passWord"></td>
        </tr>

    </table>
        <br>
        <input type="submit" value="ورود " class="btn btn-success">
</div></center>
</form>
</body>
</html>