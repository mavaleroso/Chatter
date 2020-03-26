<?php
  require 'connection.php';
  session_start();
  $name = $_GET['searchVal'];
  $id = $_SESSION['id'];
  $sql = "SELECT m.*, DATE_FORMAT(m.m_date, '%m-%d-%Y %h:%i %p') as 'msgDate',a.id as 'userID1' ,b.id as 'userID2', a.name as 'name1', b.name as 'name2' FROM messages as m LEFT JOIN users as a ON m.m_from = a.id LEFT JOIN users as b ON m.m_to = b.id WHERE (a.name LIKE '%$name%' OR b.name LIKE '%$name%') AND m.id IN (SELECT max(id) as id FROM messages WHERE (m_from = '$id' OR m_to = '$id') GROUP BY m_code) ORDER BY m.m_date DESC";
  $result = $conn->query($sql);

  $rows = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  echo json_encode($rows);
?>
