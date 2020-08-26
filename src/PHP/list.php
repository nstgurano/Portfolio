    <?php
    error_get_last(E_ALL^E_NOTICE);//
    session_cache_limiter('none');//
    session_start();//エラーなのはおそらくセッションの前に何か出力されているから
    ?>
    <?php
    $items=[
        "1"=>"アップライトピアノ（630,000円）",
        "2"=>"電子ピアノ（630,000円）",
        "3"=>"ローズピアノ（630,000円）",
        "4"=>"エレキピアノ（630,000円）",
        "5"=>"アコースティックピアノ（630,000円）"
    ];
    if (!empty($_REQUEST["id"])&&!isset($_SESSION['cart'])) {
        $_SESSION['cart']=[];
        foreach ($items as $id=>$name) {
            if ($id===$_REQUEST["id"]) {
                array_push($_SESSION['cart'],$name);
            }
        }
    }
    if ($_REQUEST["cmd"]==="cart_delete") {//
        unset($_SESSION["cart"]);
    }
    ?>
    <table>
        <caption>商品一覧</caption>
    <?php
    foreach ($items as $id => $name) {
    ?>
    <tr>
    <td><?php print( htmlspecialchars($name,ENT_QUOTES));?></td>
    <td><a href="list.php?id=<?php print( htmlspecialchars($id,ENT_QUOTES))?>">カートに追加</a></td>
    </tr>
    <?php
    }
    ?>
    </table>
    <p>
        <a href="cart.php">カートの中身を見る</a><br>
        <a href="list.php?cmd=cart_delete">カートの中身を廃棄</a>
    </p>