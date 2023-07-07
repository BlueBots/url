<?php
// Retrieve the necessary data from the client-side request
$apiDevKey = $_POST['api_dev_key'];
$pasteCode = $_POST['api_paste_code'];

// Set the URL and parameters for the Pastebin API request
$url = 'https://pastebin.com/api/api_post.php';
$params = [
  'api_dev_key' => $apiDevKey,
  'api_option' => 'paste',
  'api_paste_code' => $pasteCode,
  'api_paste_private' => '0'
];

// Create the cURL request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request and retrieve the response
$response = curl_exec($ch);

// Close the cURL connection
curl_close($ch);

// Return the response to the client-side code
header('Content-Type: application/json');
echo $response;
?>
