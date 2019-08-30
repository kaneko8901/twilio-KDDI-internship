<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

$account_sid = '';
$auth_token = '';
$twilio_number = "";
$to_number = "";

$client = new Client($account_sid, $auth_token);
date_default_timezone_set('Asia/Tokyo');
try{
  $pdo = new PDO("mysql:dbname=; host=", "", ""); //データベース名記入
  $st = $pdo->query("SELECT * FROM ");　//テーブル名記入

  foreach($st -> fetchAll() as $row){
    $time = date("Y-m-d H:i");
    $comment = urlencode($row['comment']);
    $str = substr($row['schedule_time'], 0, -3);
    if($time === $str)
    {
      $client->account->calls->create(
        $to_number,
        $twilio_number,
        array(
          "url" => "https://.ngrok.io/voice.php?value={$comment}"
        )
      );
      /*$message = $client->messages->create(
        $to_number,
        array(
          "body" => $row['comment'],
          "from" => $twilio_number
        )
      );*/
    }
    else {
      echo $time,$str;
    }
  }
} catch(PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
?>
