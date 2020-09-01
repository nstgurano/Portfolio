<?php
session_start();
unset($_SESSION["test"]);
echo '$_SESSION["test"]の値は破棄されました';
?>
<br>
<a href="session.php">戻る</a>