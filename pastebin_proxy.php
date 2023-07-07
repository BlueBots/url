<?php
// Retrieve the POST data from the client-side JavaScript code
$requestData = file_get_contents('php://input');

// Define the Pastebin API endpoint
$pastebinAPI = 'https://pastebin.com/api/api_post.php';

// Make a POST request to the Pastebin API
$ch = curl_init($pastebinAPI);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $requestData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

// Set the appropriate response headers
header('Content-Type: application/json');
echo $response;
?>
