<?php
session_start();
require_once('../lib/model.php');
$pdo=connect_database();
$data=$_GET;
$err=[];
unset($data['send']);

/*
エラー文
=======
 */
if (empty($data['name'])) {
    $_SESSION['name']='間違いがあります';
}
if (empty($data['birth'])) {
    $_SESSION['birth']='空白です';
}

/*
SQL
=======
*/ 
$sql='select *from Employees where 1=1';
$condition=[];
if (!empty($data['name'])) {
    $sql.=" and (EmployeeName like :name)";
    $condition[":name"]=$_GET['name'];
}
if (!empty($data['bloodType'])) {
    $sql.=" and (BloodType=:bloodType)";
    $condition[":bloodType"]=$_GET['bloodType'];
}
if (!empty($data['birth'])) {
    $sql.=" and (Birthday=:birth)";
    $condition[":birth"]=$_GET['birth'];
}
$stmt=$pdo->prepare($sql);
$stmt->execute($condition);
$result=$stmt->fetch(PDO::FETCH_ASSOC);


/*
ページ遷移
=======
*/ 
$_SESSION['EmployeeID']=$result['EmployeeID'];
if ($result['EmployeeID']===null) {
    unset($_SESSION['EmployeeID']);
    $_SESSION['none']="見つかりませんでした";
}


if ($result['EmployeeID']!==null) {
    header('location: next.php');
}else{
    header('location:get_view.php');
}
exit();