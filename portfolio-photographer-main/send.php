<?php

// Replace with your actual Telegram bot token
$telegram_bot_id = "6270627679:AAHQv7iJq9MPGB6vXHekFo6K1kM4WNAeM-I";

// Replace with the chat ID where you want to receive messages
$chat_id = "7127263879";

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Construct the message content
  $telegram_message = "Name: " . $name . "\nEmail: " . $email . "\nMessage: " . $message;

  // Create a Telegram URL with bot token and chat ID
  $url = "https://api.telegram.org/bot" . $telegram_bot_id . "/sendMessage";

  // Create data to send with the POST request
  $data = array(
    'chat_id' => $chat_id,
    'text' => $telegram_message
  );

  // Initialize cURL
  $ch = curl_init($url);

  // Set cURL options
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

  // Send the request and get the response
  $response = curl_exec($ch);

  // Check for errors
  if(curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
  } else {
    echo 'Message sent successfully!';
  }

  // Close cURL connection
  curl_close($ch);
} else {
  echo 'Invalid data received.';
}

?>
