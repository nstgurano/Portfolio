<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>mergesort</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
  // マージソートを使用して配列$numbersの値を小さい順番に並べて下さい。
	// またマージソートの過程を出力するプログラムも書いて下さい。
	// ex Array ( [0] => 20 [1] => 10 [2] => 2 [3] => 12 [4] => 7 [5] => 16 [6] => 8 [7] => 13 [8] => 1 )
	// 上の配列をソートしていきます。
	// Array ( [0] => 20 [1] => 10 [2] => 2 [3] => 12 [4] => 7 ) 2分割をした結果の前半部分です。
	// Array ( [0] => 16 [1] => 8 [2] => 13 [3] => 1 ) 2分割をした結果の後半部分です。
	// Array ( [0] => 20 [1] => 10 [2] => 2 ) 2分割をした結果の前半部分です。
	// Array ( [0] => 12 [1] => 7 ) 2分割をした結果の後半部分です。
	// Array ( [0] => 20 [1] => 10 ) 2分割をした結果の前半部分です。
	// Array ( [0] => 2 ) 2分割をした結果の後半部分です。
	// 20と10を入れ替えます。
	// 配列のマージを開始します
	// $left=>array(2) { [0]=> int(10) [1]=> int(20) }
	// $right=>array(1) { [0]=> int(2) }
	// $result=>array(3) { [0]=> int(2) [1]=> int(10) [2]=> int(20) } マージした結果。
	// 配列のマージが終了しました。
	// 12と7を入れ替えます。
	// 配列のマージを開始します
	// $left=>array(3) { [0]=> int(2) [1]=> int(10) [2]=> int(20) }
	// $right=>array(2) { [0]=> int(7) [1]=> int(12) }
	// $result=>array(5) { [0]=> int(2) [1]=> int(7) [2]=> int(10) [3]=> int(12) [4]=> int(20) } マージした結果。
	// 配列のマージが終了しました。
	// Array ( [0] => 16 [1] => 8 ) 2分割をした結果の前半部分です。
	// Array ( [0] => 13 [1] => 1 ) 2分割をした結果の後半部分です。
	// 16と8を入れ替えます。
	// 13と1を入れ替えます。
	// 配列のマージを開始します
	// $left=>array(2) { [0]=> int(8) [1]=> int(16) }
	// $right=>array(2) { [0]=> int(1) [1]=> int(13) }
	// $result=>array(4) { [0]=> int(1) [1]=> int(8) [2]=> int(13) [3]=> int(16) } マージした結果。
	// 配列のマージが終了しました。
	// 配列のマージを開始します
	// $left=>array(5) { [0]=> int(2) [1]=> int(7) [2]=> int(10) [3]=> int(12) [4]=> int(20) }
	// $right=>array(4) { [0]=> int(1) [1]=> int(8) [2]=> int(13) [3]=> int(16) }
	// $result=>array(9) { [0]=> int(1) [1]=> int(2) [2]=> int(7) [3]=> int(8) [4]=> int(10) [5]=> int(12) [6]=> int(13) [7]=> int(16) [8]=> int(20) } マージした結果。
	// 配列のマージが終了しました。
	// Array ( [0] => 1 [1] => 2 [2] => 7 [3] => 8 [4] => 10 [5] => 12 [6] => 13 [7] => 16 [8] => 20 )
	// ※上の出力はあくまで例です。ご自分でわかりやすい出力に書き換えて下さっても構いません。
	$numbers = range(0,20);//０から２０まで配列で入ってる
	shuffle($numbers);//上記をランダムにシャッフル

	echo '【初期値】'.'<br>';
	foreach ($numbers as $key) {
		echo $key.'&nbsp';
	}
	echo '<br>';

	mergesort($numbers);

	echo '<br>'.'【ソート後】'.'<br>';
	foreach ($numbers as $key) {
		echo $key.'&nbsp';
	}
	echo '<br>';
	
	function mergesort(&$numbers)//引数は参照渡しで要素を変化させて返す
	{
		$count=count($numbers);//配列の中身の数確認
		$last=$count-1;//配列の最後の要素
		$center=floor(count($numbers)/2);//配列の真ん中の要素、切り捨て
		$left=[];//左と右にわけるために空の配列を用意
		$right=[];
		$br='<br>';//改行用

		for ($i=0; $i <$center ; $i++) { //左の要素の抽出
			$left[]=$numbers[$i];//0から真ん中まで
		}
		for ($j=$center; $j <=$last ; $j++) { //右の要素の抽出
			$right[]=$numbers[$j];//真ん中からさいごまで
		}

		if (count($left)>1) {//左の要素が１つ以上あるばあい再起処理
			mergesort($left);//左側のみ
		}

		if (count($right)>1) {//右の要素が１つ以上あるばあい再起処理
			mergesort($right);//右側のみ
		}

		///分割終了、以下左要素と右要素の比較と空の配列への代入
		echo "【交換前】{$br}";
		echo var_dump($left)."左部分の２分割{$br}";
		echo var_dump($right)."右部分の２分割{$br}";

		$right_count=count($right);//右の配列の要素の数確認
		$left_count=count($left);//左の配列の要素の数確認
		$lpoint=0;//左の最初
		$rpoint=0;//右の最初
		$result=[];//下の条件の結果を入れるための空の配列

		while ($lpoint<$left_count&&$rpoint<$right_count) {//右と左で比較後に代入する要素の数がなくならない限り以下を実行
			if ($left[$lpoint]<$right[$rpoint]) {//左のほうが小さい
				$result[]=$left[$lpoint];//結果に左の要素を入れる
				$lpoint++;//左の要素は次の要素に進む
			}else{
				$result[]=$right[$rpoint];//結果に右の要素を入れる
				$rpoint++;//右の要素は次の要素に進む
			}
		}
		//以下、上記の処理が終えて、のこった要素を代入
		while ($lpoint<$left_count) {//右の要素がなくなり左だけ残っていた場合
			$result[]=$left[$lpoint];
			$lpoint++;//左隣に移る
		}
		while ($rpoint<$right_count) {//左の要素がなくなり右だけ残っていた場合
			$result[]=$right[$rpoint];
			$rpoint++;//右隣に移る
		}

		 echo "【マージ後】{$br}";
		 $numbers=$result;//上書き
		 echo var_dump($numbers).'<br>';
		}



  ?>

</body>
</html>