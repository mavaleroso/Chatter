<?php
  require 'connection.php';
  require dirname(__DIR__).'/vendor/autoload.php';
  session_start();

  $id = $_SESSION['id'];
  $toID = $_POST['toID'];
  $msg = $_POST['msg'];

  $sql = "SELECT m_code FROM message WHERE (m_from = '$id' AND m_to = '$toID') OR (m_from = '$toID' AND m_to = '$id') LIMIT 1";
  $result = $conn->query($sql);

  if ($result != NULL) {
    $code = $code;
  } else {
    $code = md5($id + $toID);
  }

  // Pusher event

  $options = array(
    'cluster' => 'ap1',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    'c0d7e24234709abeae18',
    '8736768b6811f22e972a',
    '969819',
    $options
  );

  $message = array(
        'message' => $msg,
        'msg_from' => $id,
        'msg_to' => $toID,
        'code' => $code
  );

  $pusher->trigger('chat-channel', 'msg-event', $message);

  // Pusher event

  $sql1 = "INSERT INTO messages(m_to, m_from, m_message, m_code, m_date) VALUES('$toID', '$id', '$msg', '$code' , NOW())";
  $result = $conn->query($sql1);
  echo $result;
?>
