
<?php
require_once 'connect.php';
$query="INSERT INTO `depo` (`id`, `name`, `mojody`) VALUES (NULL, '".$_GET['name']."'
, '".$_GET['count']."');";
mysqli_query($db, "SET NAMES utf8");
if(mysqli_query($db,$query) === TRUE){ ?>


    <script !src="">
        alert("<?php echo $_GET['name']?> اضافه شد ")
    </script>
<?php }



if ($_GET['where']=="panel"){
    ?>
    <script>
    location.replace('panel.php')
</script>
<?php
}
?>
