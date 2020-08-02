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
  [1, 4, 5], [2, 5, 2], [4, 6, 2], [5, 4, -1],
  [5, 6, 4]
];
bellman_ford($edges, 7);
function bellman_ford($edges, $num_v){

  $total_cost=[];

  for ($i=0; $i < $num_v; $i++) { //頂点の数-1の配列を用意
    $total_cost[$i]=INF;//各頂点の初期値は無限大
  }

  $total_cost[0]=0;//始点のコストの初期化
  $from_num='';//始点
  $to_num='';//終点
  $cost_num='';//始点から終点へのコスト

  for ($j=0; $j <$num_v-1; $j++) { //頂点の数-1で負の閉路を検出できる
    $flg=FALSE;//フラグの初期化
    for ($k=0; $k < count($edges); $k++) { //辺の数だけ確認
      $from_num=$edges[$k][0];//辺の始点の情報代入
      $to_num=$edges[$k][1];//辺の終点の情報代入
      $cost_num=$edges[$k][2];//辺のコストの情報代入
      if ($total_cost[$from_num]!==INF&&$total_cost[$to_num]>$total_cost[$from_num]+$cost_num) {//コストの初期値が更新されている場合かつ、始点よりも終点のコストのほうが大きい場合
        echo  "頂点【".$from_num."】のコスト【".$total_cost[$to_num]."】に【".$total_cost[$from_num]."】と【".$cost_num."】を足して更新".'<br>';
        $total_cost[$to_num]=$total_cost[$from_num]+$cost_num;//出発地点のコストを終点のコストに更新
        $flg=TRUE;//更新がかかったらTRUEで
      }
    }
    if ($flg===FALSE) {//コストの更新がかからなかった場合、すべてのノードのコストが更新された
      var_dump($total_cost);
      return;//処理は終了
    }
  }
    echo '負の閉路発見';//頂点-1ぶんのループを回していた場合、負の閉路が発生
    return;
}


?>

</body>
</html>