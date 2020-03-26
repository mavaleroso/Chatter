<?php
  require 'connection.php';
  session_start();

  $name = $_GET['searchVal'];
  $id = $_SESSION['id'];

  $sql = "SELECT * FROM users WHERE name LIKE '%$name%' AND id != '$id'";
  $result = $conn->query($sql);

  $rows = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  echo json_encode($rows);
?>
