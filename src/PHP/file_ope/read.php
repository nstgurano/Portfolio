<?php
$file=@fopen('access.log','r')or die('ファイルを開けませんでした');
$count=0;
flock($file,LOCK_SH);
while(!feof($file)){
    $line=fgets($file);
    echo "<p>{$line}</p>";
    $count++;
}
$file2=file('access.log');
var_dump($file2);
echo "{$count}回の訪問がありました";
flock($file,LOCK_UN);
fclose($file);