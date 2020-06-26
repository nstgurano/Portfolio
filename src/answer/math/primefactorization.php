<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>primefactorization</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    
    // 変数$int に「2600」を代入し､それを素因数分解して結果を$resultに代入して全て表示してください。
    // 結果の素数と素数との間はスペースを入れてください。
$int = 2600;

$prime=primeNumber($int);
$result=separateInt($prime,$int);

foreach ($result as $key) {
  echo $key.'<br>';
}

function primeNumber($int)
{
  $array=[];

  for ($i=2; $i <=$int ; $i++) { 
    $k=true;
    for ($j=2; $j <$i ; $j++) { 
      if ($i===2) {
        $array[]=2;
      }elseif($i%$j==0) {
        $k=false;
      }
    }
    if ($k===true) {
      $array[]=$i;
    }
  }
 return $array;
}

function separateInt($prime,$int)
{
  $num=[];

  while ($int!==1) {
  foreach ($prime as $key) {
    if ($int%$key===0) {
      $num[]=$key;
      $int/=$key;
    }
  }

}
  return $num;
}


    ?>

</body>
</html>