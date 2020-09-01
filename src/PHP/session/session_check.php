<?php
session_start();
if (isset($_SESSION['test'])) {
    echo "値は{$_SESSION['test']}";
}else {
    echo "セッションはセットされていません";
}
?>
<br>
<a href="session.php">戻る</a>