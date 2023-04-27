<?php
include 'connection.php'; 
session_start();
$email=$_SESSION['email'];
$query="SELECT uid FROM user WHERE email='$email'";
$data=mysqli_query($config,$query);
$row=mysqli_fetch_array($data) 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta charset="UTF-8" />
    <title>User Dashboard</title>

    <link rel="stylesheet" href="css_bootstrap/bootstrap.css" />
    <script src="https://kit.fontawesome.com/e8db152719.js" crossorigin="anonymous"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="css/style.css" />
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
            <a class="nav-link active" aria-current="page" href="user_dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="update.php?uid=<?php echo $row['uid'];?>">Profile</a>
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

    <div class="container">
      <div class="row">
        <div
          class="col-lg-6 d-flex justify-content-center align-items-center flex-column"
        >
          <span class="header fent">
            <h1 class="display-3 text-white">Car Rental</h1>
            <h2 class="text-white">Rent today, Own tomorrow</h2>
          </span>
        </div>
        <div
          class="col-lg-6 d-flex justify-content-center align-items-center flex-column"
        >
          <br /><br />
          <img src="images/cab_vector.png" alt="" class="img" />
        </div>
      </div>
    </div>
    <script src="js_bootstrap/bootstrap.min.js"></script>
  </body>
</html>

