<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>breadth-first-search</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

<?php
/*
 
  0 X S 0 X 0
  0 G X 0 0 0
  X 0 0 X 0 0
  X X 0 0 0 X
  
  
　のような迷路データをcsvから読み込む等して、自分で作成してください。

  注）0は進め、Xは障害物で進めないとします。　S 出発点 G ゴールを表します。

  幅優先探索を使って、ゴールできた場合
  0 X S 1 X 1
  0 G X 1 1 1
  X 1 1 X 1 1
  X X 1 1 1 X
  
  上のように、迷路データの通ってきた道を 0 → 1 へと変換して出力してください。
 */
  $filename='src\answer\graphsearch\maze.csv';
  $fileOutput=trim(fgets($filename));
  echo "2";
?>

</body>
</html>