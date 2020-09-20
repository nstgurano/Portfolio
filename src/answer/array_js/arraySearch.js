'use strict';
// $employeesという配列に社員名が入っています。
let employees = ["佐藤", "鈴木", "高橋", "田中", "伊藤", "渡辺", "山本", "中村", "小林", "加藤"];
// $employeesと$employeeNameを引数に取り、$employeesに$employeeNameがいれば
// ex: 弊社に田中はおります。
// いなければ
// ex: 弊社に亀田はおりません。
// とechoするメソッドsearchEmployee($employees, $employeeName)　を作成して
// いる場合と、いない場合、両方を実行してください。
let employeeName = 'tannaka';
document.textContent = searchEmployee(employees, employeeName);

function searchEmployee(employees, employeeName) {
  let Name = employees.filter(function (value) {
    return value === employeeName;
  });
  if (Name.length) {
    document.getElementById('arraySearch1').textContent = '弊社に' + Name +
      'はおります。';
  } else {
    document.getElementById('arraySearch2').textContent = '弊社に' + employeeName +
      'はおりません。';
  }
}