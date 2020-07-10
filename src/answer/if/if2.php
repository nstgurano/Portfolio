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
    $age=31;
    // if-else文を用いて、$ageが30以上の場合は「あなたは30歳以上です。」
    // $ageが30未満の場合は「あなたは30歳未満です。」
    // とechoしてください。
    if (30<=$age) {
      echo 'あなたは30歳以上です。';
    }else {
      echo 'あなたは30歳未満です。';
    }
  ?>

</body>
</html>