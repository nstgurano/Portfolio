<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>bellman-ford</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

<?php
/**
 * ベルマンーフォード法
 *
 * 起点、終点、コストの情報が格納されている配列$edgesが宣言されています。
 * これと、頂点の数を引数として、最短経路の長さを返す関数 bellman_ford を作成します。
 *
 * var_dump(bellman_ford($edges, 7));を実行した結果
 * array(7) { [0]=> int(0) [1]=> int(4) [2]=> int(3) [3]=> int(5) [4]=> int(6) [5]=> int(5) [6]=> int(8) }
 * のように頂点からの最短経路の長さを表示するように、function bellman_ford を実装してください。
 */

 # 辺の配列（起点、終点、コストの配列）
$edges = [
  [0, 1, 4], [0, 2, 3], [1, 2, 1], [1, 3, 1],
  [1, 4, 5], [2, 5, 2], [4, 6, 2], [5, 4, 1],
  [5, 6, 4]
];

var_dump(bellman_ford($edges, 7));
function bellman_ford($edges, $num_v){
  $min_num=INF;//各頂点の初期値
  $result=[];//結果を比較するための配列
  $result[0][0]=0;//最初の起点の初期値は0

  for ($i=0; $i < $num_v; $i++) { //頂点分の配列を用意
    array_push($result,[$min_num,false]);
    foreach ($result as $key => $value) {
      if ($edges[$i][2]<$result[$edges[$i][1]]) {
        $result[$i][1]=$edges[$i][2];
      }
    }
  

  var_dump($result);
}


?>

</body>
</html>