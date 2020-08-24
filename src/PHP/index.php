<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>商品名検索</h1>
    <?php
    $dsn="mysql: dbname = store_db; host = 127.0.0.1; charset = utf8mb4";
    $username="user";
    $password="";
    try {
        $dbh=new PDO("mysql: host = localhost;dbname = store_db","root","pass");
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql=" select *from Customers";
        $stmt=$dbh->prepare($sql);
        $stmt->execute();
        echo "接続に成功しました";
        $dbh=null;
    } catch (PDOException $e) {
        print($e->getMessage());
        echo "<br>例外処理あり";
        die();
    }
    ?>
</body>
</html>