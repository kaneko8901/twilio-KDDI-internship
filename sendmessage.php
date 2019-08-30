<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

$account_sid = '';
$auth_token = '';
$twilio_number = "";
$to_number = "";

$client = new Client($account_sid, $auth_token);

$status = $_POST['CallStatus'];
$message = $client->messages->create(
  $to_number,
  array(
    "body" => '着信がありました',
    "from" => $twilio_number
  )
);
?>
