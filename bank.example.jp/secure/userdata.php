<?php
session_start();

if (empty($_SESSION['secret_code'])) {
    $_SESSION['secret_code'] = uniqid();

}

// シークレットコードを取得
function getSecretCode($secret_code) {
    return ['secret_code' => $secret_code];
}

// トークンエラーのセット
function setTokenError() {
    return ['secret_code' => 'Token error'];
}

$callback = "jsonCallback";
if(isset($_GET['callback'])){
    $callback = $_GET['callback'];
}

// CSRFトークンの検証
if (!empty($_GET['csrf_token']) && md5(session_id()) === $_GET['csrf_token']) {
    $result = getSecretCode($_SESSION['secret_code']);
} else {
    $result = setTokenError();
}


$json = json_encode($result, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);

header("Content-type: application/x-javascript");
echo "$callback($json)";