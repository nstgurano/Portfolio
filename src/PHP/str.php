<?php
$br='<br>';
$text=' Hello ';
var_dump($text);
echo'<br>';
$result=trim($text);
var_dump($result);
echo $br;
echo mb_strlen($text).$br;

$text2='KV:ﾌﾟﾛｸﾞﾗﾐﾝｸﾞ';
var_dump($text2);
echo $br;
$text3='as:　私はMOVIEが　好きです。';
var_dump($text3);
$result2=mb_convert_kana($text2,'KVas','UTF8');
$result3=mb_convert_kana($text3,'KVas','UTF8');
var_dump($result2);
echo $br;
var_dump($result3);
