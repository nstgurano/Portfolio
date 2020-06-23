<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>repeat4</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    // for文を用いて1から1000までの数字をechoしてください。
    // ただし、3の倍数の場合はechoせずにcontinueを用いて次の数字に飛んでください。
    // echoするときに改行も入れるようにしてください。
    for ($i=1; $i <=1000 ; $i++) { 
      if ($i%3===0) {
        continue;
      }
      echo $i.'<br>';
    }
  ?>

</body>
</html>