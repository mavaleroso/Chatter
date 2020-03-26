<?php
  require 'connection.php';

  $name = $_POST['name'];
  $uname = $_POST['username'];
  $pass = $_POST['password'];

  $sql = "INSERT INTO users(name, username, password) VALUES('$name', '$uname', '$pass')";

  if ($conn->query($sql) === TRUE) {
    echo "User create successfully";
  } else {
    echo "Form not completed";
  }
?>
