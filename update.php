<?php include 'connection.php';
session_start();
$uid=$_GET['uid'];
$email=$_SESSION['email'];
$select="SELECT * FROM user WHERE uid='$uid'";
$data=mysqli_query($config,$select);
$row=mysqli_fetch_array($data);
?>



<!-- TO UPDATE DATA -->
<?php

if(isset($_POST['update_btn'])){
 
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['gender'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $update="UPDATE user SET firstname='$firstname',lastname='$lastname',gender='$gender',contact='$contact',address='$address',email='$email',password='$password' WHERE uid='$uid'"; 
    $data=mysqli_query($config,$update);

    if($data){
    ?>
    <script>
    alert("DATA UPDATED SUCCESSFULLY")
    window.open("http://localhost/Cab%20Booking/user_dashboard.php", "_self");
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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta charset="UTF-8" />
  <title>User Profile</title>

  <link rel="stylesheet" href="css_bootstrap/bootstrap.css" />
  <script src="https://kit.fontawesome.com/e8db152719.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/userdashboard.css" />
  <link rel="stylesheet" href="css/userregister.css" />
</head>

<body class="hoja">
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#"><i style=" color:#1d9d8f; padding: 10px"
          class="fa-solid fa-2x fa-car-side"></i>Car Rental</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <?php echo $_SESSION['email']; ?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="user_dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="update.php?uid=<?php echo $row['uid'];?>">Profile</a>
          </li>

          
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="cabsavailable.php">Cars Available</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="contact.php">Contact Us</a>
          </li>
         
          
          
          <li class="nav-item">
            
              <a href="logout.php"><button class="btn btn-0">Log out</button></a>
          
          </li>
        </ul>
      </div>
    </div>
  </nav>
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
       
        <a onclick="return confirm('Are you sure, you want to delete?')" href="delete.php?uid=<?php echo $row['uid'];?>">DELETE<div class="d-grid gap-2">
        
    </div></a>
      </form>
    </div>

  <?php include 'connection.php'; ?>





  
  



  

 <script src="/js_bootstrap/bootstrap.min.js"></script>
</body>

</html>
<!-- flex-direction: row; flex-wrap: wrap; --