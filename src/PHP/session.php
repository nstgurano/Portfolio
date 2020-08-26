<?php
session_start();
print("こんにちは".$_SESSION["login_name"]."さん");