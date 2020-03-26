<?php
  require 'models/connection.php';

  session_start();

  if (!isset($_SESSION['id'])) {
    header('location: /Chatter');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="css/custom.css">

    <title>Chatter</title>

    <input id="user-name" type="text" value="<?php echo $_SESSION['name']?>" hidden>
    <input id="user-id" type="text" value="<?php echo $_SESSION['id']?>" hidden>
</head>
<body>
  <div class="container-fluid w-75 d-flex mt-5">

    <div class="card w-25 m-1">
      <div class="card-header">
        <i class="fas fa-users"></i>
        <b>Contacts</b>
      </div>
      <div class="card-body">
        <div class="contacts-option">
          <div class="contacts-option-type">
            <button type="button" id="recent" class="mr-auto active"><i class="fas fa-comment-dots"></i> Recent</button>
            <button type="button" id="new" class="ml-auto"><i class="fas fa-comment"></i> New</button>
          </div>
          <div class="contacts-option-search">
            <div class="contacts-option-search-div">
              <i class="fas fa-search"></i>
              <input id="search" class="recent" type="text" placeholder="Search">
            </div>
          </div>
        </div>
        <div id="user-contacts"></div>
      </div>
      <div class="card-footer">
        <i class="fas fa-sign-out-alt"></i>
        <a href="models/logout.php">Logout <?php echo $_SESSION['name'] ?></a>
      </div>
    </div>

    <div class="card w-75 m-1">
      <div class="card-header d-flex">
          <i class="fas fa-envelope mt-1 mr-1"></i>
          <b>Chatter</b>
          <p id="msg-convo-name" class="msg-convo-name m-0 ml-auto"></p>
      </div>
      <div class="card-body p-0">
        <div id="msg-convo-area" class="msg-convo-area">
          <i class="fas fa-comments"></i>
          <p class="connect-users">Connect with other users.</p>
        </div>
        <div class="msg-sender-area">
          <input type="text" class="msg-sender-box" disabled>
          <button id="send-btn" type="button" class="msg-sender-btn ml-auto" disabled><i class="fas fa-paper-plane"></i> Send</button>
        </div>
      </div>
      <div class="card-footer text-center">
        <b>Chatter @ 2020</b>
      </div>
    </div>

  </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
    <script src="js/chat.js"></script>

</body>
</html>
