<?php
require_once('../lib/model.php');

unset($_REQUEST['send']);
$result=$_REQUEST;
$array=select($result);

function query($sql)
{
    $dbh=connect_database();
    $stmt=$dbh->prepare($sql);
    $exe=$stmt->execute();
    $result=$stmt->fetchAll();
    return $result;
}

function select($result)
{
    $table=$result['table'];
    $value=$result['column'];
    $sql="select {$value} from {$table}";
    $array=query($sql);
    return $array;
}
?>

<html>
<body>
    <form action="select.php" action="post">
        <input type="text" name="table" placeholder="テーブル名">
        <input type="text" name="column" placeholder="カラム名">
        <input type="submit" name="send" value="検索">
    </form>
    <?php
    foreach ($array as $id) {
        echo "検索結果{$id[$_REQUEST['column']]}<br>";
    }
    ?>
</body>
</html>
