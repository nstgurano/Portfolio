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
  $cost=[];//各頂点でのコストを入れるための空の配列
  $flg=[];//各頂点での確定、未確定のフラグを入れるための空の配列

  for ($i=0; $i < $num_v; $i++) {//頂点の数だけ配列を用意
    $cost[$i]=INF;//最小値を探すため各頂点の初期値は無限大
    $flg[$i]=FALSE;//初期値はすべてfalse
  }
  $cost[0]=0;//始点である0はコスト0

  while(TRUE){//ブレイクされるまでループ
    $min=INF;//最小値はINF
    $min_index=0;//始点は0から
    for ($j=0; $j <$num_v ; $j++) {//頂点の数
      if ($cost[$j]<$min&&$flg[$j]===FALSE) {//最小値よりもコストのほうが小さいかつ、フラグが未確定
        $min=$cost[$j];//最小値更新
        $min_index=$j;//配列番号の更新
      }
    }
    $flg[$min_index]=TRUE;//最小値を確定させる
    $check_flg=array_search(FALSE,$flg);//flgの中からFALSEを確認
    if ($check_flg===FALSE) {//すべてがtrueに更新されたらブレイク
      break;
    }
    
    for ($k=0; $k <count($edges[$min_index]) ; $k++) {//辺の中身を確認
      if (($cost[$min_index]+$edges[$min_index][$k][1])<$cost[$edges[$min_index][$k][0]]) {//始点のほうが終点より小さい場合
        echo "頂点{$min_index}に{$cost[$edges[$min_index][$k][0]]}に{$cost[$min_index]}と{$edges[$min_index][$k][1]}を足して更新<br>";
        $cost[$edges[$min_index][$k][0]]=($cost[$min_index]+$edges[$min_index][$k][1]);//終点のコストに出発地点のコストを更新
      }
    }
  }
  return var_dump($cost);
}
dijkstra($edges, 7);

?>

</body>
</html>