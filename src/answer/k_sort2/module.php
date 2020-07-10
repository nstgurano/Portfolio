<?php



// ソート結果が正しいかチェックする
function check_result($array){
    $text="true";
    $false_place=[];
    
    for($i=0;$i<count($array)-1;$i++){
    
        if($array[$i]>$array[$i+1]){
            $text="false";
            $false_place[]=$i;
        }
        
    }
    
    if(count($false_place)!==0){
        $text.=" : ".array_text($false_place);
    }
    return $text;
}




// 配列の内容をechoするために文字列化する関数
function array_text($array){
    global $br;
    $text="(";
    for($i=0;$i<count($array);$i++){
        $text.="[{$i}]:".$array[$i];

        if($i!==count($array)-1){
            $text.=",&nbsp;";
        }

    };

    $text.=")".$br;
    return $text;
}




// (入れ替え後の配列, 入れ替え過程を表す文字列)を返す
function exchange($array,$i,$j){
    global $br;
    $memory=$array[$i];
    $array[$i]=$array[$j];
    $array[$j]=$memory;

    // ソート過程を文字列化
    $text.="[{$i}]と[".($j)."]を入れ替え".$br;
    $text.=array_text($array);

    return array($array, $text);

}

function echo_result($result){
    global $br;
    $text="ソート結果".$br;
    $text.="result=".array_text($result[0]);
    $text.="ソート結果チェック".$br;
    $text.=check_result($result[0]).$br.$br;
    
    $text.="↓↓↓ソート過程↓↓↓".$br;
    $text.=$result[1];
    
    return $text;
}