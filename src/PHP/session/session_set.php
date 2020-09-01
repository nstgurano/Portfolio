<?php
session_start();

$_SESSION['test']='aaaaaaaaaaaa';
echo "{$_SESSION['test']}をセット";
?>
<br>
<a href="session.php">戻る</a>