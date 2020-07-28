<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Astar</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

<?php
/**
 * A*
  
  0 X S 0 X 0
  0 G X 0 0 0
  X 0 0 X 0 0
  X X 0 0 0 X
  
  のような迷路データがあるとします。
  注）0は進め、Xは障害物で進めないとします。　S 出発点 G ゴールを表します。

  A*アルゴリズムを使って、最短経路を求めます
  0 X S 1 X 0
  0 G X 1 1 0
  X 1 1 X 1 0
  X X 1 1 1 X
  
  上のように、求められた最短経路を 0 → 1 へと変換して出力する関数を実装してください。
 *
 */
    // 迷路データ
    
    $maze=[
        ["1","X","S","0","X","0"],
        ["0","G","X","0","0","0"],
        ["X","0","0","X","0","0"],
        ["X","X","0","0","0","X"]
    ];
    $br='<br>';
    $y_count=count($maze);//縦軸がどこまであるか確認
    $x_count=count($maze[0]);//横軸がどこまであるか確認※１行目だけ確認
    $start_node=Start_goal_search($maze,$y_count,$x_count,'S');//スタート位置
    $goal_node=Start_goal_search($maze,$y_count,$x_count,'G');//ゴール位置

    echo "【初期値迷路】".$br;
    echo "スタートの位置は【{$start_node[0]}、{$start_node[1]}】です".$br;
    echo "ゴールの位置は【{$goal_node[0]}、{$goal_node[1]}】です".$br;
    for ($y=0; $y <$y_count ; $y++) {//迷路の出力
      for ($x=0; $x <$x_count ; $x++) {
        echo $maze[$y][$x];
      }
      echo $br;
    }


    var_dump(Astar($maze,$goal_node,$start_node,$x_count,$y_count));



    function Start_goal_search($maze,$y_count,$x_count,$text)
    {
      $text_xy=[];//スタート・ゴール位置確認の配列
      for ($y=0; $y <$y_count ; $y++) { //縦と横のすべての要素を調べる
        for ($x=0; $x <$x_count ; $x++) {
          if($maze[$y][$x]===$text){//S、Gを発見したら、縦と横の値を返す
            return $text_xy=[$y,$x];
          }
        }
      }
    }

    function search_node($maze,&$open_list,$check_node,$x_count,$y_count)//隣接ノードを検索し、進めるものがあれば更新
    {
      $y=$check_node[0];//縦軸
      $x=$check_node[1];//横軸

      if ($maze[$y][$x]==='X'||$x_count-1<$x||$x<0||$y_count-1<$y||$y<0||$maze[$y][$x]==='1'||$maze[$y][$x]==='G') {//進めない条件
        return;
      }
      if ($maze[$y][$x+1]==='0') {//右のノードを検索
        array_push($open_list,[$y,$x+1]);
      }
      if ($maze[$y][$x-1]==='0') {//左のノードを検索
        array_push($open_list,[$y,$x-1]);
      }
      if ($maze[$y-1][$x]==='0') {//上のノードを検索
        array_push($open_list,[$y-1,$x]);
      }
      if ($maze[$y+1][$x]==='0') {//下のノードを検索
        array_push($open_list,[$y+1,$x]);
      }
    }

    function total_cost($maze,$goal_node,$open_list,&$total_cost)//
    {
      $open_y=$open_list[0][0];//現在地のx軸
      $open_x=$open_list[0][1];//現在地のy軸
      $y_dist=abs($goal_node[0]-$open_y);//縦の距離
      $x_dist=abs($goal_node[1]-$open_x);//横の距離
      $h_cost=$y_dist+$x_dist;//ヒューリスティックコスト
      if ($maze[$open_y][$open_x]==='0') {
        $node_cost=1;//ノード間コスト
     }elseif($maze[$open_y][$open_x]==='S'){
        $node_cost=0;//ノード間コスト
     }
      if ($h_cost+$node_cost<$total_cost[$open_y][$open_x]) {//トータルコストがヒューリスティックコストとノード間コストを足したものよりも大きければ更新
        $total_cost[$open_y][$open_x]=$h_cost+$node_cost;//ヒューリスティックコスト＋ノード間コスト＝トータルコスト
        return;
      }
    }

    function Astar(&$maze,$goal_node,$start_node,$x_count,$y_count)
    {
      $total_cost=[];
      $open_list=[];
      $close_list=[];
      $Heuristic=[];
      $check_node=[];
      $node_cost=[];

      for ($y=0; $y < $y_count; $y++) {
        for ($x=0; $x <$x_count ; $x++) {
          $total_cost[$y][$x]=INF;//合計値の初期化
        }
      }

      //var_dump($Heuristic);
      $open_list[]=$start_node;//オープンリストにスタートノードを入れる
      //var_dump($open_list);
      $y=$open_list[0][0];//横軸
      $x=$open_list[0][1];//縦軸
      //以下からループに入る
      if ($maze[$y][$x]==="G") {//オープンリストの最初の値がゴールだったら終了
        echo "ゴールしました";
      }else{
        total_cost($maze,$goal_node,$open_list,$total_cost);
        var_dump($total_cost);
        echo min($total_cost[0]);
        // $check_node=array_shift($open_list);//最小値を保存
        // $close_list[]=$check_node;//探索済みリストにも入れる
        // search_node($maze,$open_list,$check_node,$x_count,$y_count);//最小値をもとに探索候補探し
      }
    }
  //   $maze=[
  //     ["0","X","S","0","X","0"],
  //     ["0","G","X","0","0","0"],
  //     ["X","0","0","X","0","0"],
  //     ["X","X","0","0","0","X"]
  // ];
    
//    $maze=[
//        ["S","X","0","0","0","0","0","0"],
//        ["0","X","0","X","X","X","X","0"],
//        ["0","X","0","X","0","0","0","0"],
//        ["0","X","0","X","0","X","X","0"],
//        ["0","X","0","X","0","X","0","0"],
//        ["0","0","0","X","G","X","0","X"],
//        ["0","X","X","X","X","X","0","X"],
//        ["0","0","0","0","0","X","0","0"],
//    ];
    
//    $maze=[
//        ["0","0","0","0","0","0","0","0","0","0","0","0","0"],
//        ["X","X","X","X","X","X","0","X","X","X","X","X","0"],
//        ["0","0","0","X","0","0","0","X","G","0","0","X","0"],
//        ["0","X","0","X","0","X","0","X","X","X","0","X","0"],
//        ["0","X","0","0","0","X","0","0","0","X","0","X","0"],
//        ["0","X","0","X","X","X","X","X","0","X","0","X","0"],
//        ["0","X","0","X","0","0","0","X","0","X","0","X","S"],
//        ["0","X","X","X","0","X","0","X","0","X","0","X","X"],
//        ["0","X","0","0","0","X","0","X","0","X","0","0","0"],
//        ["0","X","0","X","X","X","0","X","0","X","X","X","0"],
//        ["0","X","0","0","0","X","0","X","0","0","0","X","0"],
//        ["0","X","X","X","0","X","0","X","X","X","X","X","0"],
//        ["0","0","0","0","0","X","0","0","0","0","0","0","0"],
//    ];
    
//    $maze=[
//        ["0","0","0","0","0","0","0","0","0","0","0","0","0"],
//        ["X","X","X","X","X","X","0","X","X","X","X","X","0"],
//        ["0","0","0","X","0","0","0","X","G","0","0","X","0"],
//        ["0","X","0","X","0","X","0","X","X","X","0","X","0"],
//        ["0","X","0","0","0","X","0","0","0","X","0","X","0"],
//        ["0","X","0","X","X","X","X","X","0","X","0","X","0"],
//        ["0","X","0","X","0","0","0","X","0","X","0","X","S"],
//        ["0","X","X","X","0","X","0","X","0","X","0","X","X"],
//        ["0","X","0","0","0","X","0","X","0","X","0","0","0"],
//        ["0","X","0","X","X","X","0","X","0","X","X","X","0"],
//        ["0","X","0","0","0","X","0","X","0","0","0","X","0"],
//        ["0","X","X","X","0","X","0","X","X","X","0","X","0"],
//        ["0","0","0","0","0","X","0","0","0","0","0","0","0"],
//    ];

?>

</body>
</html>