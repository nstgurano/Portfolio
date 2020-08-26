<?php
require_once('./lib/model.php');
$dbh=connect_database();

$sql="select *from Products";
$stmt=$dbh->prepare($sql);
$stmt->execute();
$results=$stmt->fetchAll();
foreach ($results as $result) {
    if (!preg_match('/\A([0-9]{4})\z/',$result['ProductCode'])) {
        echo '商品番号が4桁ではない商品名【'.$result['ProductName'].'】<br>';
    }
    if (preg_match('/^またたび/u',$result['ProductName'])) {
        echo '名前にまたたびが入っている商品名【'.$result['ProductName'].'】<br>';
    }
}
$sql="select *from Employees";
$stmt=$dbh->prepare($sql);
$stmt->execute();
$results=$stmt->fetchAll();
foreach ($results as $result) {
    if (!preg_match("/[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]/",$result['EMail'])) {
        echo 'メールアドレスが間違っている社員名とメルアド【'.$result['EmployeeName'].$result['EMail'].'】<br>';
    }

}


?>