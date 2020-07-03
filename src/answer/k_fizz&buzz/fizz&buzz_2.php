<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>fizz&buzz</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    // 1から100までの数をechoしてください。
    // 3の倍数の時には数の代わりに「Fizz」をechoしてください。
    // 5の倍数の時には数の代わりに「Buzz」をechoしてください。
    // 3と5両方の倍数の時には数の代わりに「FizzBuzz」をechoしてください。
    // echoするときに改行も入れるようにしてください。
    
    $start=1;
    $end=100;
    $multiple_A=3;
    $multiple_B=5;
    $fizz="Fizz";
    $buzz="Buzz";
    $br="<br>";
    
    // 3の倍数と5の倍数を個別で判別し、該当するものの文字列を追記してしまえばいいという考え方
    for($i=$start;$i<=$end;$i++){

        // 文字列をループ毎に初期化
        $print="";
        if($i%$multiple_A===0){
            $print.=$fizz;
        }
        if($i%$multiple_B===0){
            $print.=$buzz;
        }
        
        // $printが空文字列=どちらの倍数でもない場合
        if($print===""){
            $print.=$i;
        }
        echo $print.$br;
        
    }
    
    
    
  ?>

</body>
</html>