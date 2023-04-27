<?php
include 'connection.php'; 
session_start();
$email=$_SESSION['email'];
$query="SELECT uid FROM user WHERE email='$email'";
$data=mysqli_query($config,$query);
$row=mysqli_fetch_array($data) 

?>

<style>
  .serv ul {
    display: inline-flex;
    margin: 0;
    padding: 0;
    width: 33%;
    text-align: left;
    float: left;
  }

  .serv ul li {
    list-style: none;
    display: inline-block;
    padding: 0;
  }

  .serv ul li span {
    padding: 0;
  }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta charset="UTF-8" />
  <title>Cars Available</title>

  <link rel="stylesheet" href="css_bootstrap/bootstrap.css" />
  <script src="https://kit.fontawesome.com/e8db152719.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/userdashboard.css" />
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
            <a class="nav-link" aria-current="page" href="user_dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="update.php?uid=<?php echo $row['uid'];?>">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/userdashboard">Cars Available</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="contact.php">Contact Us</a>
          </li>
          
          <li class="nav-item">
            
              <a href="logout.php"><button class="btn btn-0">Log out</button></a>
          
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php include 'connection.php'; ?>





  
  

  <div class="container">
      <div class="row">
        <h1 class="heading1">Choose a Car</h1>
      </div>
      <div class="row">
        
          
      <!-- <div class="row"> -->
      <?php 
    $query="SELECT * FROM vehicle";
    $data=mysqli_query($config,$query);
    $result=mysqli_num_rows($data);

    if($result){
        while($row=mysqli_fetch_array($data)){ ?>
  <div class="d-flex flex-row">


    <div class="card" style="width: 18rem; margin-left:50px;">
      <div class="card-body">
        <h5 class="card-title">
          Car Name :
          <?php echo $row['vname']?>
        </h5>
        <p class="card-text">
          <td>
            Model Year : 
            <?php echo $row['model']?>
          </td>
        </p>
        <p class="card-text">
          <td>
            Seats : 
            <?php echo $row['seat']?>
          </td>
        </p>
        <p class="card-text">
          <td>
            Vehicle Number :
            <?php echo $row['vnumber']?>
          </td>
        </p>
        <p class="card-text">
          <td>
            Phone Number :
            <?php echo $row['pnumber']?>
          </td>
        </p>
        <p class="card-text">
          <td>
            Pickup Point :
            <?php echo $row['pickup']?>
          </td>
        </p>
        <p class="card-text">
          <td>
            Price Per Day:
            <?php echo $row['price']?>
          </td>
        </p>
        
      </div>
    </div>
    
    <?php
        }
    }
    else{
        ?>
    <p>NO DATA FOUDN</p>
    <?php
    }
    
    ?>
      
    </div>



  

 <script src="/js_bootstrap/bootstrap.min.js"></script>
</body>

</html>
<!-- flex-direction: row; flex-wrap: wrap; --