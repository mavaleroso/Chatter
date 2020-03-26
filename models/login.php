<?php
  require 'connection.php';

  $uname = $_POST['uname'];
  $pass = $_POST['pass'];

  $sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass' LIMIT 1";
  $result = $conn->query($sql);

  if (mysqli_num_rows($result) == 1) {
    echo 'User login successfully';
    $row = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
  } else {
    echo 'Incorrect username or password';
  }
?>
