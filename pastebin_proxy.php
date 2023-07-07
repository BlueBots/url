<?php
$url = 'https://pastebin.com/api/api_post.php';
$params = [
  'api_dev_key' => '<script src="config.js"></script><script>document.write(PASTEBIN_API_KEY);</script>',
  'api_option' => 'paste',
  'api_paste_code' => $_POST['api_paste_code'],
  'api_paste_private' => '0'
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

header('Content-Type: application/json');
echo $response;
?>
