<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>primenumber</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    // 1から100までの素数をすべて書き出し、「１から100までの素数は◯個あります。」と表示してください。
    // 結果の素数と素数との間はスペースを入れてください。
    $array=[];

    for ($i=2; $i <=100 ; $i++) { 
      $k=true;
      for ($j=2; $j <$i ; $j++) { 
        if($i%$j==0) {
          $k=false;
        }
      }
      if ($k===true) {
        $array[]=$i;
      }
    }
    echo '1~100までの素数は'.count($array).'個あります。'.'<br>';
    foreach ($array as $key) {
      echo $key.'&nbsp';
    }
    ?>

</body>
</html>