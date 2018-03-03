<!-- Unsecure -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>bank.example.jp</title>
</head>
<body>
<h3>bank.example.jp</h3>
<button id="get-date-btn">Get Secret Code</button><br/>
あなたのシークレットコードは「<span id="secret-code-text"></span>」です。

<script type="text/javascript">
displaySecretData = function(secretDate) {
    var span = document.getElementById('secret-code-text')
    span.innerHTML= secretDate['secret_code'];
};

window.onload = function(){
    var btnGetData = document.getElementById("get-date-btn");
    btnGetData.addEventListener("click",function() {
        var scriptTag = document.createElement("script");
        scriptTag.type = 'text/javascript';
        scriptTag.src = "userdata.php?callback=displaySecretData";
        var parent = document.getElementsByTagName("script")[0];
        parent.parentNode.insertBefore(scriptTag, parent);
    }, false);
}
</script>
</body>
</html>