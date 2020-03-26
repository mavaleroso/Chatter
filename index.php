<?php
  require 'models/connection.php';
  session_start();
  if (isset($_SESSION['id'])) {
    header('location: /Chatter/chatbox.php');
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.css">
  <link rel="stylesheet" href="css/custom.css">

  <title>Chatter</title>
</head>
<body>
   <div class="login-form">
     <div class="brand-area">
       <i class="fas fa-envelope"></i>
       <h2 class="text-center">Chatter</h2>
       <p>"The Best Way to Chat"</p>
     </div>
     <h6 id="login-log" class="text-center log-stats"></h6>
     <input type="text" id="log-uname" class="login-input" placeholder="Username" required/>
     <input type="password" id="log-pass" class="login-input" placeholder="Password" required/>
     <button class="login-btn"><i class="fas fa-sign-in-alt"></i> Login</button>
     <p class="create-account">Create an account?</p>
   </div>

   <div class="registration-form">
     <div class="brand-area">
       <i class="fas fa-envelope"></i>
       <h2 class="text-center">Chatter</h2>
       <p>"The Best Way to Chat"</p>
     </div>
     <h6 id="reg-log" class="text-center log-stats"></h6>
     <input type="text" id="reg-name" class="registration-input" placeholder="Name" required/>
     <input type="text" id="reg-uname" class="registration-input" placeholder="Username" required/>
     <input type="password" id="reg-pass" class="registration-input" placeholder="Password" required/>
     <button class="register-btn"><i class="fas fa-sign-in-alt"></i> Register</button>
     <p class="exist-account">Already have an account?</p>
   </div>

  <script src="http://localhost:35729/livereload.js"></script>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
