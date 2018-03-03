<?php
session_start();

if (empty($_SESSION['secret_code'])) {
    $_SESSION['secret_code'] = uniqid();
    
}

function getSecretCode($secret_code) {
    return ['secret_code' => $secret_code];
}

$callback = "jsonCallback";
if(isset($_GET['callback'])){
    $callback = $_GET['callback'];
}

// ユーザのシークレットコードを取得
$result = getSecretCode($_SESSION['secret_code']);

$json = json_encode($result, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);

header("Content-type: application/x-javascript");
echo "$callback($json)";