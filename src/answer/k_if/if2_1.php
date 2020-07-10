<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>if2</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php

    // $ageという変数に適当な数字を代入してください

    // if-else文を用いて、$ageが30以上の場合は「あなたは30歳以上です。」
    // $ageが30未満の場合は「あなたは30歳未満です。」
    // とechoしてください。
    
    
    $age=rand(0,99);
    $threshold=30;
    $you_are="あなたは";
    $or_older="歳以上です。";
    $younger_than="歳未満です。";
    
    //条件文に「30歳以上」を設定した場合
    echo "年齢 : ".$age."歳<br>";
    if($age>=30){
        echo $you_are.$threshold.$or_older;
    }else{
        echo $you_are.$threshold.$younger_than;
    }
    
    
  ?>

</body>
</html>