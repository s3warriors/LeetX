<?php

// @include 'config.php';
// $conn = mysqli_connect('localhost','root','','login');
require 'config.php';

session_start();

if(isset($_POST['submit'])){

   // $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   // $cpass = md5($_POST['cpassword']);
   // $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if($result instanceof mysqli_result &&mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = '☠️Incorrect Email Or Password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Coding Platform - Login/Signup</title>

   <!-- custom css file link  -->
   <!-- <link rel="stylesheet" href="css/style.css"> -->
   <link rel="stylesheet" href="lstyle.css">
   <link rel="stylesheet" href="css/navbar.css">

</head>
<body>
<header>
<nav class="navbar">  
       <a href="index.html">Home</a>
       <a href="courses.html">Courses</a>
       <a href="problems.html">Problems</a>
       <a href="#" class="right active">Login / Signup</a>
       <!-- <link rel="stylesheet" href="user.png"> -->
       <img  id="logo" src="css/logo.png" alt="">
      <img  src="css/user3.jpeg" alt="">
    </nav>
  </header>
  <br>
  <br>
   
 <div class="box">
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <br>
   

<div class="cont">
    <div class="form sign-in">
        <h2>Welcome</h2>
        <form action="#" method="post">
            <label>
                <span>Email</span>
                <input type="email" name="email" required>
            </label>
            <label>
                <span>Password</span>
                <input type="password" name="password" required>
            </label>
            <button type="submit" name="submit" class="submit">Sign In</button>
        </form>
        <p class="forgot-pass"><a href="#">Forgot password?</a></p>
    </div>

    <div class="sub-cont">
        <div class="img">
            <div class="img__text m--up">
                <h3>Don't have an account? Please Sign up!</h3>
            </div>
            <div class="img__text m--in">
                <h3>If you already have an account, just sign in.</h3>
            </div>
            <div class="img__btn">
                <span class="m--up">Sign Up</span>
                <span class="m--in">Sign In</span>
            </div>
        </div>

        <div class="form sign-up">
            <h2>Create your Account</h2>
          
            <form action="register_form.php" method="post">
                <label>
                    <span>Name</span>
                    <input type="text" name="name" required>
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="email" required>
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="password" required>
                </label>
                <label>
                    <span>Confirm Your Password</span>
                    <input type="password" name="cpassword" required>
                </label>
                <label>
                    
                    
                      <select name="user_type">
                         <option value="user">Student</option>
                         <option value="admin">admin</option>
                      </select>
                </label>
      <button type="submit" name="submit" class="submit">Sign Up</button>
            </form>
        </div>
    </div>


<script>
    document.querySelector('.img__btn').addEventListener('click', function() {
        document.querySelector('.cont').classList.toggle('s--signup');
    });
</script>

</div>
</div>




</body>
</html>