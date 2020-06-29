<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>if4</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    // 変数　$randomNumberに0から3までの数字をランダムに入れて
    // switch文を用いて、$randomNumber
    // が0の場合は「大吉です。」
    // が1の場合は「中吉です。」
    // が2の場合は「小吉です。」
    // それ以外の場合(default)は「末吉です。」
    // とechoしてください。
    
    // 結果を変数に格納する場合
    $randomNumber=rand(0,3);
    $result="";
    switch($randomNumber){
        case 0:
            $result="大";
            break;
        case 1:
            $result="中";
        case 2:
            $result="小";
            break;
        default:
            $result="末";
            break;
    }
    echo "{$result}吉です。";
    
  ?>

</body>
</html>