<?php
include 'connection.php'; 
session_start();
$email=$_SESSION['email'];
$query="SELECT uid FROM driver WHERE email='$email'";
$data=mysqli_query($config,$query);
$row=mysqli_fetch_array($data) 

?>

<?php

    include 'connection.php';
    // validation 

    if (isset($_POST['vsign_btn'])){
        $vname=mysqli_real_escape_string($config,$_POST['vname']);
        $model=mysqli_real_escape_string($config,$_POST['model']);
        $seat=mysqli_real_escape_string($config,$_POST['seat']);
        $vnumber=mysqli_real_escape_string($config,$_POST['vnumber']);
        $pnumber=mysqli_real_escape_string($config,$_POST['pnumber']);
        $city=mysqli_real_escape_string($config,$_POST['city']);
        $pickup=mysqli_real_escape_string($config,$_POST['pickup']);
        $price=mysqli_real_escape_string($config,$_POST['price']);
        

    
        if (empty($vname)){
            $error="VEHICLE NAME FIELD IS REQUIRED";
        }
        else if (empty($model)){
          $error="MODEL FIELD IS REQUIRED";
      }
        else if (empty($seat)){
            $error="NUMBER OF SEATS FIELD IS REQUIRED";
        }
        else if (empty($vnumber)){
            $error="VEHICLE NUMBER FIELD IS REQUIRED";
        }
        else if (empty($pnumber)){
          $error="PHONE NUMBER FIELD IS REQUIRED";
        }
        else if (empty($city)){
          $error="CITY FIELD REQUIRED";
        }
        else if (empty($pickup)){
          $error="PICKUP POINT FIELD REQUIRED";
        }
        else if (empty($price)){
          $error="PRICE FIELD IS REQUIRED";
        }
        
        
        else{
            $check_vnumber="SELECT * FROM vehicle WHERE vnumber='$vnumber'";
            $data=mysqli_query($config,$check_vnumber);
            $result=mysqli_fetch_array($data);

            
            if($result>0){
              ?><script>alert("VEHICLE ALREADY EXIST")</script><?php
            }
            

            else{
                
                $insert="INSERT INTO vehicle (vname,model,seat,vnumber,pnumber,city,pickup,price) VALUES('$vname','$model','$seat','$vnumber','$pnumber','$city','$pickup','$price')";
                $q=mysqli_query($config,$insert);
                if($q){
                    ?><script>alert("YOUR VEHICLE HAS BEEN REGISTERED SUCCESSFULLY")</script><?php
                }
            }
        }

        
    
    }
    

    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta charset="UTF-8" />
    <title>Add Car</title>

    <link rel="stylesheet" href="css_bootstrap/bootstrap.css" />
    <script src="https://kit.fontawesome.com/e8db152719.js" crossorigin="anonymous"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="css/userdashboard.css" />
    <link rel="stylesheet" href="css/userregister.css" />
  </head>
  <body class="hoja login-page">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="#"
        ><i style=" color:#1d9d8f; padding: 10px" class="fa-solid fa-2x fa-car-side"></i
          >Car Rental</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
          <li class="nav-item">
              <a class="nav-link" href="#"><?php echo $_SESSION['email']; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="driver_home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="driver_manage.php?uid=<?php echo $row['uid'];?>">Profile</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link active"
                aria-current="page"
                href="driver_dashboard.php"
                >Add Car</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
          
          
            <li class="nav-item">
              
                <a href="dlogout.php"><button class="btn btn-0">Log out</button></a>
              
            </li>
          </ul>
        </div>
      </div>
    </nav>

    
    <div class="login">
      <h1>Add Your Vehicle</h1>
      <form method="post">
          
        <label for="vname">
          <!-- font awesome icon -->
          <i class="fas fa-user"></i>
        </label>
        <input
          type="text"
          name="vname"
          placeholder="Vehicle Name"
          id="vname"
          required
        />
        <label for=price">
          <!-- font awesome icon -->
          <i class="fas fa-user"></i>
        </label>
        
        <input
          type="text"
          name="model"
          placeholder="Model Year"
          id="model"
          required
        />
        <label for="seat">
          <!-- font awesome icon -->
          <i class="fas fa-user"></i>
        </label>
        <input
          type="text"
          name="seat"
          placeholder="Number of Seats"
          id="seat"
          required
        />
        <label for=vnumber">
          <!-- font awesome icon -->
          <i class="fas fa-user"></i>
        </label>
        
        <input
          type="text"
          name="vnumber"
          placeholder="Vehicle Number"
          id="vnumber"
          required
        />
        <label for=pnumber">
          <!-- font awesome icon -->
          <i class="fas fa-user"></i>
        </label>
        
        <input
          type="number"
          name="pnumber"
          placeholder="Phone Number"
          id="pnumber"
          required
        />
        <label for=city">
          <!-- font awesome icon -->
          <i class="fas fa-user"></i>
        </label>
        
        <input
          type="text"
          name="city"
          placeholder="City"
          id="city"
          required
        />
        <label for=pickup">
          <!-- font awesome icon -->
          <i class="fas fa-user"></i>
        </label>
        
        <input
          type="text"
          name="pickup"
          placeholder="Pickup Point"
          id="pickup"
          required
        />
        <label for=price">
          <!-- font awesome icon -->
          <i class="fas fa-user"></i>
        </label>
        
        <input
          type="number"
          name="price"
          placeholder="Price for Per Day"
          id="price"
          required
        />
        
       
        
        
        
    
        <input type="submit" name="vsign_btn" value="Register" />
        
      </form>
    </div>
  
    </div>
    
    <script src="/js_bootstrap/bootstrap.min.js"></script>
  </body>
</html>
