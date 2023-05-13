<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $botToken = "YOUR_BOT_TOKEN_HERE";
    $chatId = $_POST["chat_id"];

    $url = "https://api.telegram.org/bot" . $botToken . "/getChat?chat_id=" . urlencode($chatId);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($result, true);

    if ($data["ok"]) {
        $chatIdResult = $data["result"]["id"];
    } else {
        $chatIdResult = "Error: " . $data["description"];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Telegram Chat ID Finder</title>
</head>
<body>
    <h1>Telegram Chat ID Finder</h1>
    <form method="post">
        <label for="chat_id">Enter Telegram Chat ID:</label>
        <input type="text" name="chat_id" id="chat_id" required>
        <button type="submit">Find Chat ID</button>
    </form>

    <?php if (isset($chatIdResult)): ?>
        <h2>Chat ID: <?php echo $chatIdResult; ?></h2>
    <?php endif; ?>
</body>
</html>
