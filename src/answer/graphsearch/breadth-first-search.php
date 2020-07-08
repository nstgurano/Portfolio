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
$maze=[];//迷路用の空の配列を用意
$br='<br>';//改行
$filename='maze.csv';//ファイル名
$maze_data=file_get_contents($filename);//ファイルの中身をすべて取り込む
$maze_data=explode("\r\n",$maze_data);//改行は取り除き、改行ごとに配列を作る
foreach ($maze_data as $key) {
  $maze[]=explode(',',$key);//','を取り除き、','を基準に配列を作る
}
$y_count=count($maze);//縦軸がどこまであるか確認
$x_count=count($maze[0]);//横軸がどこまであるか確認※１行目だけ確認

//////////////スタートの位置探し
$start=start_search($maze,$y_count,$x_count);
echo '【初期値迷路】'.$br;
foreach ($maze_data as $maze_value) {
  echo $maze_value.$br;
}
echo "スタートは【{$start[0]},{$start[1]}】です".$br;


////////////ゴール探し
$y=$start[0];//縦の現在地
$x=$start[1];//横の現在地
search_goal($maze,$y,$x);



function start_search ($maze,$y_count,$x_count){//

  $start_xy=[];//現在地確認の配列
  for ($y=0; $y <$y_count ; $y++) { //スタートの縦・横位置を確認
    for ($x=0; $x <$x_count ; $x++) {
      if($maze[$y][$x]==='S'){//S発見したら、現在地に値を入れて返す
        return $start_xy=[$y,$x];
      }
    }
  }
}


function search_goal(&$maze,$y,$x){//

  $y_count=count($maze);//縦軸がどこまであるか確認
  $x_count=count($maze[0]);//横軸がどこまであるか確認※１行目だけ確認



  if ($maze[$y][$x]==='X'||$x_count-1<$x||$x<0||$y_count-1<$y||$y<0||$maze[$y][$x]==='1') {//進めない条件、壁・１があるとき、壁が横・縦を超えないとき、
    return;
  }

  if ($maze[$y][$x]==='0') {//進んだところは０→１に変える
    $maze[$y][$x]='1';
  }
  if ($maze[$y][$x]==='G') {//ゴールの場合、終了
    return;
  }

  echo "現在地は【{$y},{$x}】です".'<br>';
  foreach ($maze as $maze_value) {//配列から迷路を再度作成
    echo implode(',',$maze_value).'<br>';
  }
  search_goal($maze,$y,$x+1);//右に進む
  search_goal($maze,$y,$x-1);//左に進む
  search_goal($maze,$y-1,$x);//上に進む
  search_goal($maze,$y+1,$x);//下に進む
}

?>

</body>
</html>