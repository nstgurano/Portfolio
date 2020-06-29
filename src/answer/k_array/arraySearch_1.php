<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>arraySearch</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    // $employeesという配列に社員名が入っています。
    $employees = array("佐藤","鈴木","高橋","田中","伊藤","渡辺","山本","中村","小林","加藤");
    // $employeesと$employeeNameを引数に取り、$employeesに$employeeNameがいれば
    // ex: 弊社に田中はおります。
    // いなければ
    // ex: 弊社に亀田はおりません。
    // とechoするメソッド　searchEmployee($employees, $employeeName)　を作成して
    // いる場合と、いない場合、両方を実行してください。
    
    $employeeName=$employees[rand(0,count($employees)-1)];
    
    $exists=in_array($employeeName,$employees);
    
    searchEmployee($employees,$employeeName,$exists);
    function searchEmployee($employees,$employeeName,$exists){
        if ($exists){
            echo "弊社に{$employeeName}はおります。";
        }else{
            echo "弊社に{$employeeName}はおりません。";
        }
    }
    

  ?>

</body>
</html>