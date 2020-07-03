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
	$numbers = array(20,10,2,12,7,16,8,13,1);

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
	
	function mergesort(&$numbers)
	{
		$last=count($numbers)-1;
		$center=floor(count($numbers)/2);
		$left=[];
		$right=[];
		$result=[];
		for ($i=0; $i <$center ; $i++) { 
			$left[]=$numbers[$i];
		}
		for ($j=$center; $j <=$last ; $j++) { 
			$right[]=$numbers[$j];
		}

		if (count($left)>1) {
			mergesort($left);
		}

		if (count($right)>1) {
			mergesort($right);
		}
		
		echo '【交換前】'.'<br>';
		echo var_dump($left).'左部分の２分割'.'<br>';
		echo var_dump($right).'右部分の２分割'.'<br>';

		 echo '【マージ後】'.'<br>';
		 $numbers=array_merge($left,$right);
		 echo var_dump($numbers).'<br>';
		}



  ?>

</body>
</html>