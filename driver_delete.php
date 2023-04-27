<?php include 'connection.php';
$uid=$_GET['uid'];
$query="DELETE FROM driver WHERE uid='$uid'";
$data=mysqli_query($config,$query);
if($data){
    ?>
    <script>alert("DATA DELETED SUCCESSFULLY");
    window.open("http://localhost/Cab%20Booking/index.php","_self");
    </script>
    <?php
}
else{
    ?>
    <script>alert("Please Try Again");</script>
    <?php
}
?>