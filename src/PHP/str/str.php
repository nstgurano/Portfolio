<?php
// $br='<br>';
// $text=' Hello ';
// var_dump($text);
// echo'<br>';
// $result=trim($text);
// var_dump($result);
// echo $br;
// echo mb_strlen($text).$br;

// $text2='KV:ﾌﾟﾛｸﾞﾗﾐﾝｸﾞ';
// var_dump($text2);
// echo $br;
// $text3='as:　私はMOVIEが　好きです。';
// var_dump($text3);
// $result2=mb_convert_kana($text2,'KVas','UTF8');
// $result3=mb_convert_kana($text3,'KVas','UTF8');
// var_dump($result2);
// echo $br;
// var_dump($result3);

// $text='プログラミングを、習いたい';
// $result=preg_replace("/\s|、|。/",'',$text);
// echo $result;
// $result=str_replace("プログラミング",'PHP',$text);
// echo$result;
$str='パン';
$target=mb_strtolower($str,'UTF-8');
$target=mb_convert_kana($target,'KVas','UTF-8');
$target=preg_replace('/\s|、|。/','',$target);
$flg=0;

$ok_words=['フライパン','コーヒーゼリー'];
foreach ($ok_words as $ok_word) {
    if (mb_strpos($target,$ok_word)!==FALSE) {
        $target=str_replace($ok_word,'*',$target);
    }
}
$ng_words=['パン','コーヒー'];
foreach ($ng_words as $ng_word) {
    if (mb_strpos($target,$ng_word)!==FALSE) {
        $flg=1;
        break;
    }
}

if ($flg===0) {
    echo'問題ない文字列です';
}else {
    echo'禁止ワードが含まれています';
}

echo "<br>{$str}=>{$target}";
$arr=[
    "item"=>'a',
    "name"=>'urano',
    'birthday'=>1994-11-01
];
print_r($arr);