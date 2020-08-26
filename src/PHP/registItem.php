<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php ?>
</body>
</html><html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>商品の追加</h1>
    <form action="registItem.php" method="post" name="form">
        <input type="hidden" name="cmd" value="reserve">
        <table>
            <tr>
                <th>名前</th>
                <td>
                    <input type="text" name="item_name" size="8" value="<?php print(htmlspecialchars($_REQUEST['item_name'],ENT_QUOTES))?>">
                </td>
                <th>値段</th>
                <td>
                    <input type="number" name="price" size="8" value="<?php print(htmlspecialchars($_REQUEST['price'],ENT_QUOTES))?>">
                </td>
            </tr>
        </table>
        <input type="submit" value="登録">
    </form>
    <?php
    if ($_REQUEST["cmd"]==="reserve") {
        try {
            $dbh=new PDO("mysql:host=urano-mysql;dbname=store_db","user1","pass");
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // echo "接続に成功しました";
        } catch (PDOException $e) {
            print($e->getMessage());
            echo "<br>例外処理あり";
            die();
        }
        $sql="insert into Products(ProductID,ProductName,Price) values(51,:item_name,:price)";
        $condition=[
            ":item_name"=>$_REQUEST["item_name"],
            ":price"=>$_REQUEST["price"]
        ];
        var_dump($sql);
        var_dump($condition);
        $stmt=$dbh->prepare($sql);
        $stmt->execute($condition);
    }
    ?>
    <?php
    ?>
</body>
</html>