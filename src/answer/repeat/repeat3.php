<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>repeat3</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    // for文を用いて1から1000までの数字をechoしてください。
    // ただし、501以上の数字を表示しないようにbreak文を用いてfor文を抜けてください。
    // echoするときに改行も入れるようにしてください。
        for ($i=1; $i <=1000 ; $i++) { 
          if (500<$i) {
          break;
          }
          echo  $i.'<br>';
          }
        
  ?>

</body>
</html>