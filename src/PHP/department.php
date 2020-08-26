<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>部署検索</h1>
    <?php
    try {
        $dbh=new PDO("mysql:host=urano-mysql;dbname=store_db","user1","pass");
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select *from Departments";
        $stmt=$dbh->prepare($sql);
        $stmt->execute();
        $results=$stmt->fetchAll();
        // echo "接続に成功しました";
    } catch (PDOException $e) {
        print($e->getMessage());
        echo "<br>例外処理あり";
        die();
    }
    ?>
    <table border="1">
    <caption>検索結果</caption>
    <tr>
        <th>部署ID</th>
        <th>部署名</th>
    </tr>
    <?php
    foreach ($results as $result) {
    ?>
    <tr>
        <td><?php echo $result["DepartmentID"]; ?></td>
        <td><?php echo $result["DepartmentName"];?></td>
    </tr>
    <?php
    }
    ?>
    <form action="index.php">
        <input type="text" name="search">
        <input type="submit" name="send" value="検索">
    </form>
    <?php
        if (!empty($_REQUEST['search'])) {
            $sql=$sql."where DepartmentName like %:search%";
        }

    ?>
    </table>
</body>
</html>