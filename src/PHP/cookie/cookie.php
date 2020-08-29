<?php
setcookie('email','sample@sample.com',time()+(60*60*24*30));
?>
<html>
    <body>
        <h1>クッキーの練習</h1>
        <a href="cookie_check.php">次のページ</a>
        <a href="cookie_delete.php">クッキーの削除</a>
    </body>
</html>