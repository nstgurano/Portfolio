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
        ["0","X","S","0","X","0"],
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


    function total_cost($maze,$goal_node,$open_list,&$total_cost)//
    {
      $check_node=[];//探索候補が複数ある場合に一つ一つ確認するための空の配列
      for ($i=0; $i < count($open_list); $i++) {//探索候補の分だけ検索する
        $check_node=$open_list[$i];//探索候補を一つ一つ計算していくために代入
        $open_y=$check_node[0];//探索候補の縦軸
        $open_x=$check_node[1];//探索候補の横軸

        $y_dist=abs($goal_node[0]-$open_y);//ゴールの縦軸から探索候補の縦軸を引いた縦距離の差
        $x_dist=abs($goal_node[1]-$open_x);//ゴールの横軸から探索候補の横軸を引いたの横距離の差
        $h_cost=$y_dist+$x_dist;//ヒューリスティックコストの算出

        if ($maze[$open_y][$open_x]==='0') {
          $node_cost=1;//ノード間コスト
        }elseif($maze[$open_y][$open_x]==='S'){
          $node_cost=0;//ノード間コスト
        }
        //トータルコストがヒューリスティックコストとノード間コストを足したものよりも大きく、かつトータルコストが更新されていない場合
        if ($h_cost+$node_cost<$total_cost[$open_y][$open_x]&&$total_cost[$open_y][$open_x]===INF) {
          $total_cost[$open_y][$open_x]=$h_cost+$node_cost;//ヒューリスティックコスト＋ノード間コスト＝トータルコスト
        }
      }
      return;//すべての探索候補の計算が終了したら終了
    }

    function search_node($maze,&$open_list,$current_node,$flg,$x_count,$y_count)//隣接ノードを検索し、進めるものがあれば更新
    {
      $y=$current_node[0][0];//縦軸
      $x=$current_node[0][1];//横軸

      if ($maze[$y][$x]==='X'||$x_count-1<$x||$x<0||$y_count-1<$y||$y<0||$maze[$y][$x]==='1'||$maze[$y][$x]==='G') {//進めない条件
        return;
      }
      if ($maze[$y][$x+1]==='0'&&$flg[$y][$x+1]===false) {//右のノードを検索
        array_push($open_list,[$y,$x+1]);
      }
      if ($maze[$y][$x-1]==='0'&&$flg[$y][$x-1]===false) {//左のノードを検索
        array_push($open_list,[$y,$x-1]);
      }
      if ($maze[$y-1][$x]==='0'&&$flg[$y-1][$x]===false) {//上のノードを検索
        array_push($open_list,[$y-1,$x]);
      }
      if ($maze[$y+1][$x]==='0'&&$flg[$y+1][$x]===false) {//下のノードを検索
        array_push($open_list,[$y+1,$x]);
      }
    }

    function check_goal($maze,$open_list,$total_cost)//探索候補の中でゴールがあればゴール判定、そうでなければトータルコストが最小のものの出力
    {
      $total_min=INF;//最小値を初期化
      $min_index='';//最小値のインデックスを初期化
      echo "探索候補は";
      var_dump($open_list);
      echo "<br>";
      for ($k=0; $k <count($open_list) ; $k++) {//探索候補の中身を全て確認
        $open_y=$open_list[$k][0];//探索候補の縦軸
        $open_x=$open_list[$k][1];//探索候補の横軸
        if ($maze[$open_y][$open_x]==="G") {//探索候補がゴールである場合
          return "G";
        }elseif ($total_cost[$open_y][$open_x]<$total_min) {//トータルコストが最小値よりも小さい場合
          $total_min=$total_cost[$open_y][$open_x];//最小値を更新
          $min_index=$k;//最小値のインデックスも保存
        }
        echo "k={$k},min_index==={$min_index}<br>";
      }
      return $min_index;
    }

    function Astar(&$maze,$goal_node,$start_node,$x_count,$y_count)
    {
      global $br;
      $br="<br>";
      $total_cost=[];//ヒューリスティックコスト＋ノード間コスト＝トータルコスト
      $open_list=[];//探索候補地のノードを入れる
      $close_list=[];//探索済みのノードを入れる配列
      $current_node=[];//現在地
      $flg=[];//探索済みであるか判断するための配列
      $current_node[]=[$start_node[0],$start_node[1]];//スタートの位置を現在地に入れる

      for ($i=0; $i < $y_count; $i++) {
        for ($j=0; $j <$x_count ; $j++) {
          $total_cost[$i][$j]=INF;//合計値の初期化
          $flg[$i][$j]=false;//探索済みであるかの配列
        }
      }
      while (true) {
        echo "-----------------------------------------------------<br>";
        $current_y=$current_node[0][0];//現在地の縦軸
        $current_x=$current_node[0][1];//現在地の横軸
        search_node($maze,$open_list,$current_node,$flg,$x_count,$y_count);//現在地をもとに探索候補探し
        total_cost($maze,$goal_node,$open_list,$total_cost);//探索候補のトータルコストの算出
        $min_index=check_goal($maze,$open_list,$total_cost);//探索候補の中でゴールがあればゴール判定、そうでなければトータルコストが最小のものの出力
        echo $min_index;
        if ($min_index==="G") {
          echo "ゴールしました";
        break;//breakしているが後で変更、ここで探索済みの経路をたどって、1に変えて迷路の出力をする
        }else{//ゴールが見つからなかった場合
            echo "トータルコストの最小値の位置は【{$open_list[$min_index][0]},{$open_list[$min_index][1]}】".$br;
        }
        $flg[$current_y][$current_x]=true;//探索済みにする

        $close_list[]=array_shift($current_node);//探索地を探索済みの配列に代入
        $current_node[]=$open_list[$min_index];//現在地の更新
        unset($open_list[$min_index]);//探索候補地から最小値のノードを削除
        $open_list=array_values($open_list);//探索候補地のキーをそろえる
      }
      //return;
      // 、トータルコストは{$total_cost[$current_y][$current_x]}

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