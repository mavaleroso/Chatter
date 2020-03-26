<?php
  require 'connection.php';

  session_start();
  $id = $_SESSION['id'];
  $code = $_GET['code'];

  $sql = "SELECT m.*, m.m_to as 'toUser', a.id as 'userID1' ,b.id as 'userID2', a.name as 'name1', b.name as 'name2' FROM messages AS m LEFT JOIN users as a ON m.m_from = a.id LEFT JOIN users as b ON m.m_to = b.id WHERE m.m_code = '$code' ORDER BY m.m_date ASC";
  $result = $conn->query($sql);

  $rows = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  echo json_encode($rows);
?>
