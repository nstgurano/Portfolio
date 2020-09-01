<?php
session_start();
session_regenerate_id(true);
$data=$_POST;
$hash=password_hash($data['password'],PASSWORD_DEFAULT);
var_dump($hash);
$password=password_verify($hash,$data['pass']);
echo'<br>';
var_dump($password);

