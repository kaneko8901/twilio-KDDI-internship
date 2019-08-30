<?php
  $time = $_POST['time'];
  $comment = $_POST['comment'];
  try{
    $pdo = new PDO("mysql:dbname=; host=", "", "");　//データベース名記入
    $sql = "INSERT INTO  VALUES (0, '{$time}', '{$comment}')";　//テーブル名記入
    $pdo->query($sql);
  } catch(PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
  header("location: schedule.php");
?>
