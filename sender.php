<?php
// Set your Telegram API key and the message you want to send
$api_key = '6090381028:AAGSniSlkj7vV0J8-kzg7DYzv042TSSY0m8';
$message = 'YOUR_MESSAGE_HERE';

// Set the list of groups and people you want to send the message to
$chat_ids = array(
    '-1001820949212',
    '-1001920389410'
);

// Loop through the list of chat IDs and send the message to each one
foreach ($chat_ids as $chat_id) {
    // Set the URL for the Telegram API endpoint and the data to send
    $url = "https://api.telegram.org/bot$api_key/sendMessage";
    $data = array(
        'chat_id' => $chat_id,
        'text' => $message
    );

    // Send the request using cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    // Print the response from the Telegram API
    echo $result;
}
?>
