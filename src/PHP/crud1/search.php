<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>商品の条件検索</h1>
    <form action="form.php" method="post" name="form">
        <input type="hidden" name="cmd" value="search">
        <table>
            <tr>
                <th>価格帯</th>
                <td>
                    <input type="text" name="price_min" size="8" value="<?php print(htmlspecialchars($_REQUEST['price_min'],ENT_QUOTES))?>">
                    <input type="text" name="price_max" size="8" value="<?php print(htmlspecialchars($_REQUEST['price_max'],ENT_QUOTES))?>">
                </td>
            </tr>
            <tr>
                <th>商品名</th>
                <td><input type="text" name="item" size="20" value="<?php print(htmlspecialchars($_REQUEST['item'],ENT_QUOTES))?>"></td>
            </tr>
        </table>
        <input type="submit" value="検索">
    </form>
    <?php
    if ($_REQUEST["cmd"]==="search") {
        try {
            $dbh=new PDO("mysql:host=urano-mysql;dbname=store_db","user1","pass");
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // echo "接続に成功しました";
        } catch (PDOException $e) {
            print($e->getMessage());
            echo "<br>例外処理あり";
            die();
        }
        $sql="select *from Products where 1=1";
        $condition=[];
        if (!empty($_REQUEST["price_min"])) {
            $sql=$sql." and Price>=:price_min";
            $condition[":price_min"]=$_REQUEST["price_min"];
        }
        if (!empty($_REQUEST["price_max"])) {
            $sql=$sql." and Price<=:price_max";
            $condition[":price_max"]=$_REQUEST["price_max"];
        }
        if (!empty($_REQUEST["item"])) {
            $sql=$sql." and (ProductName like :item)";
            $condition[":item"]="%{$_REQUEST["item"]}%";
        }
        $stmt=$dbh->prepare($sql);
        $stmt->execute($condition);
        $results=$stmt->fetchAll();
    }
    ?>
    <table border="1">
        <tr>
            <th></th>
            <th>商品名</th>
            <th>価格</th>
        </tr>
    </table>
    <?php
    foreach ($results as $result) {
        ;
    ?>
    <tr>
        <td><?php print(htmlspecialchars($result['ProductName'],ENT_QUOTES)) ?></td>
        <td><?php print(htmlspecialchars($result['Price'],ENT_QUOTES)) ?></td>
    </tr>
    <?php
    }
    ?>
</body>
</html>