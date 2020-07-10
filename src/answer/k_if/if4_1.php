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
    
    // 直接echoする場合
    $randomNumber=rand(0,3);
    switch($randomNumber){
        case 0:
            echo "大吉です。";
            break;
        case 1:
            echo "中吉です。";
            break;
        case 2:
            echo "小吉です。";
            break;
        default:
            echo "末吉です。";
            break;
    }
    
  ?>

</body>
</html>