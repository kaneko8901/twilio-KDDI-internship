<?php
  require __DIR__ . '/vendor/autoload.php';
  use Twilio\TwiML\VoiceResponse;
  use Twilio\Rest\Client;

  $account_sid = '';
  $auth_token = '';
  $twilio_number = "";
  $to_number = "";

  $client = new Client($account_sid, $auth_token);

  $comment = $_GET['value'];
  $response = new VoiceResponse();
  $response->say($comment, ['voice'=>'woman', 'language' => 'ja-JP']);
  /*$dial = $response->dial('');
  $dial->client('joey',
                ['statusCallback' => 'https://8c027b3a.ngrok.io/sendmessage.php',
                'statusCallbackMethod' => 'POST']
              );*/

  $message = $client->messages->create(
    $to_number,
    array(
      "body" => $comment,
      "from" => $twilio_number
    )
  );

  echo $response;
?>
