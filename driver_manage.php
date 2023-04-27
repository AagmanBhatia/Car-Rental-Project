<?php include 'connection.php';
$uid=$_GET['uid'];
$select="SELECT * FROM driver WHERE uid='$uid'";
$data=mysqli_query($config,$select);
// $row for for fetchig data 
$row=mysqli_fetch_array($data);
?>







<!-- TO INSERT DATA -->
<?php

if(isset($_POST['update_btn'])){
 
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['gender'];
    $contact=$_POST['contact'];
    $license=$_POST['license'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $update="UPDATE driver SET firstname='$firstname',lastname='$lastname',gender='$gender',contact='$contact',license='$license',address='$address',email='$email',password='$password' WHERE uid='$uid'"; 
    $data=mysqli_query($config,$update);

    if($data){
    ?>
    <script>
    alert("DATA UPDATED SUCCESSFULLY")
    window.open("http://localhost/Cab%20Booking/driver_home.php", "_self");
    </script>
    <?php
    }
    else{
        ?>
        <script>alert("PLEASE TRY AGAIN");</script>
        
        <?php
    }
}


?>




<!-- NEWWWWWW -->






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta charset="UTF-8" />
    <title>Driver Profile</title>

    <link rel="stylesheet" href="/css_bootstrap/bootstrap.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="css/userregister.css" />
  </head>
  <body class="login-page">
    <div class="login">
      <h1>Your Profile</h1>
      <form method="post">
          
        <label for="firstname">
          <!-- font awesome icon -->
          <i class="fas fa-user"></i>
        </label>
        <input
          type="text"
          name="firstname"
          placeholder="Firstname"
          id="firstname"
          value="<?php echo $row['firstname']?>"
          required
        />
        <label for="lastname">
          <!-- font awesome icon -->
          <i class="fas fa-user"></i>
        </label>
        <input
          type="text"
          name="lastname"
          placeholder="Lastname"
          id="lastname"
          value="<?php echo $row['lastname']?>"
          required
        />
        <label for=gender">
          <!-- font awesome icon -->
          <i class="fas fa-user"></i>
        </label>
        
        <input
          type="text"
          name="gender"
          placeholder="Gender"
          id="gender"
          value="<?php echo $row['gender']?>"
          required
        />
        <label for="number">
          <i class="fas fa-lock"></i>
        </label>
        <input
          type="number"
          name="contact"
          placeholder="Mobile Number"
          id="contact"
          value="<?php echo $row['contact']?>"
          required
        />
        <label for="license">
          <i class="fas fa-lock"></i>
        </label>
        <input
          type="number"
          name="license"
          placeholder="License Number"
          id="clicense"
          value="<?php echo $row['license']?>"
          required
        />
        <label for="address">
          <i class="fas fa-lock"></i>
        </label>
        <input
          type="text"
          name="address"
          placeholder="Address"
          id="address"
          value="<?php echo $row['address']?>"
          required
        />
        <label for="email">
          <i class="fas fa-lock"></i>
        </label>
        <input
          type="email"
          name="email"
          placeholder="Email"
          id="email"
          value="<?php echo $row['email']?>"
          required
        />
        <label for="password">
          <i class="fas fa-lock"></i>
        </label>
        <input
          type="password"
          name="password"
          placeholder="Password"
          id="password"
          
          required
        />
        <label for="cpassword">
          <i class="fas fa-lock"></i>
        </label>
        <input
          type="password"
          name="cpassword"
          placeholder="Confirm Password"
          id="cpassword"
          required
        />
        
        
    
        <input type="submit" name="update_btn" value="Update" />
       
        <a onclick="return confirm('Are you sure, you want to delete?')" href="driver_delete.php?uid=<?php echo $row['uid'];?>">DELETE<div class="d-grid gap-2">
        
    </div></a>
      </form>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="userlogin.js"></script>
  </body>
</html>
