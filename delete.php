<?php
  $id = $_POST['id'];
  try{
    $pdo = new PDO("mysql:dbname=; host=", "", ""); //データベース名記入
    $pdo->query("DELETE FROM  WHERE id = $id"); //テーブル名記入
  } catch(PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
  header("location: schedule.php");
