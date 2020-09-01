<?php
session_start();
var_dump($_SESSION);
echo '<a href="get_view.php">最初に戻る</a>';
session_destroy();