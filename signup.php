
<?php

    include 'connection.php';
    // validation 

    if (isset($_POST['sign_btn'])){
        $firstname=mysqli_real_escape_string($config,$_POST['firstname']);
        $lastname=mysqli_real_escape_string($config,$_POST['lastname']);
        $gender=mysqli_real_escape_string($config,$_POST['gender']);
        $contact=mysqli_real_escape_string($config,$_POST['contact']);
        $address=mysqli_real_escape_string($config,$_POST['address']);
        $email=mysqli_real_escape_string($config,$_POST['email']);
        $password=mysqli_real_escape_string($config,$_POST['password']);
        $cpassword=mysqli_real_escape_string($config,$_POST['cpassword']);
    
        if (empty($firstname)){
            $error="FIRST NAME FIELD IS REQUIRED";
        }
        else if (empty($lastname)){
            $error="LAST NAME FIELD IS REQUIRED";
        }
        else if (empty($gender)){
            $error="GENDER NAME FIELD IS REQUIRED";
        }
        else if (empty($email)){
            $error="EMAIL FIELD IS REQUIRED";
        }
        else if (empty($contact)){
            $error="CONTACT FIELD IS REQUIRED";
        }
        else if (empty($address)){
            $error="ADDRESS FIELD IS REQUIRED";
        }
        else if (empty($password)){
            $error="PASSWORD FILED IS REQUIRED";
        }
        else if (empty($cpassword)){
            $error="CONFIRM PASSWORD FILED IS REQUIRED";
        }
        else if ($password!=$cpassword){
            $error="PASSWORD DOES NOT MATCH";
        }
        else if(strlen($contact)<10){
            $error="INVALID PHONE NUMBER";
        }
        
        else if(strlen($password)<6){
            $error="PASSWORD MUST BE ATLEAST 6 CHARACTERS";
        }
        else{
            $check_email="SELECT * FROM user WHERE email='$email'";
            $data=mysqli_query($config,$check_email);
            $result=mysqli_fetch_array($data);

            $check_contact="SELECT * FROM user WHERE contact='$contact'";
            $data1=mysqli_query($config,$check_contact);
            $result1=mysqli_fetch_array($data1);
            if($result>0){
                $error="EMAIL ALREADY EXIST";
            }
            else if($result1>0){
                $error="CONTACT NUMBER ALREADY EXISTS";
            }

            else{
                $pass=md5($password);
                $insert="INSERT INTO user (firstname,lastname,gender,contact,address,email,password) VALUES('$firstname','$lastname','$gender','$contact','$address','$email','$password')";
                $q=mysqli_query($config,$insert);
                if($q){
                    $success="YOUR ACCOUNT HAS BEEN CREATED SUCCESSFULLY";
                }
            }
        }
    
    }
    

    ?>
    <?php
        if(isset($error)){
            ?><script>alert("<?php echo $error;?>")</script><?php
        }
        ?>
        </p>
        <p style="color: green">
        <?php
        if(isset($success)){
          ?><script>alert("<?php echo $success;?>")</script><?php
        }
        ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta charset="UTF-8" />
    <title>User Sign Up</title>

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
      <h1>Register</h1>
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
        
        
    
        <input type="submit" name="sign_btn" value="Register" />
        <div>
          Already have an account?
          <a href="login.php">Login</a>
        </div>
      </form>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="userlogin.js"></script>
  </body>
</html>
