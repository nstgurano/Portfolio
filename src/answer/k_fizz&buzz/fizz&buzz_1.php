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
    
    // 3と5の公倍数を条件として単純に書くパターン
    for($i=$start;$i<=$end;$i++){
        if($i%$multiple_A===0 && $i%$multiple_B===0){
            echo $fizz.$buzz.$br;
        }elseif($i%$multiple_A===0){
            echo $fizz.$br;
        }elseif($i%$multiple_B===0){
            echo $buzz.$br;
        }else{
            echo $i.$br;
        }
    }
    
    
    
  ?>

</body>
</html>