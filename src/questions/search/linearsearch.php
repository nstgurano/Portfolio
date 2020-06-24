<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>linearsearch</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    // $aに数字の配列が格納されています。探索値を$kyに代入します。
    // 配列$a から$kyと一致する全要素のインデックスを、
    // 配列$indexの先頭から順に格納し、その$indexをechoして、
    // 一致した要素数を返す以下のメソッド searchIdxを作成して下さい。
    // また最後に要素数を あればechoして下さい。
    // ex $ky = 9 の時
    // その値は[1]にあります。その値は[3]にあります。その値は[7]にあります。
    // 3個ありました。
    // ex2 $ky = 100の時
    // その値はないです。

    $a = array(1,9,2,9,4,6,7,9);
    $index = array();
    $ky = 100;

    $count = searchIdx($a, $ky,$index);

?>

</body>
</html>