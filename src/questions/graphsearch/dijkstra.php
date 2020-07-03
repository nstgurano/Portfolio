<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>dijkstra</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

<?php
/**
 * ダイクストラ法
 * 終点とコストの配列の情報が格納されている配列$edgesが宣言されています。
 * これと、頂点の数を引数として、最短経路の長さを返す関数 dijkstra を作成します。
 *
 * var_dump(dijkstra($edges, 7));を実行した結果
 * array(7) { [0]=> int(0) [1]=> int(4) [2]=> int(3) [3]=> int(5) [4]=> int(6) [5]=> int(5) [6]=> int(8) }
 * のように、ベルマンーフォード法の時と同じようにスタート地点から各頂点への最短経路を全てを表示するように
 * function dijkstra を実装してください。
 *
 */
# 辺の配列（終点とコストの配列）
$edges = [
  [[1, 4], [2, 3]], // 頂点Aからの辺のリスト
  [[2, 1], [3, 1], [4, 5]], // 頂点Bからの辺のリスト
  [[5, 2]], // 頂点Cからの辺のリスト
  [[4, 3]], // 頂点Dからの辺のリスト
  [[6, 2]], // 頂点Eからの辺のリスト
  [[4, 1], [6, 4]], // 頂点Fからの辺のリスト
  [[]] // 頂点G（目的地）からの辺のリスト
];

function dijkstra($edges, $num_v){

}
var_dump(dijkstra($edges, 7));

?>

</body>
</html>