<?php
session_start();
?>
    <meta charset="utf-8">
<?php
if (isset($_POST['userName'])){

}
else{
    header('location:index.php');
}

if ($_POST['userName']=='hana1352' && $_POST['passWord']=='al1352'){
    $_SESSION['login']=true;
    ?>
    <script>
        location.replace('panel.php')
    </script>
    <?php
}
else{
    ?>
    <script !src="">
        alert('رمز عبور یا نام کاربری اشتباه است ')
        history.back();
    </script>
    <?php
}