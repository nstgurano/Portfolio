'use strict';
// 2つの引数を取りその最大公約数を返すメソッドeuclidean を作成して返り値をechoして下さい。
let num1 = Math.floor(Math.random(1) * 1000);
let num2 = Math.floor(Math.random(1) * 1000);

let result = euclidean(num1, num2);
document.getElementById('euclidean').innerHTML = result;

function euclidean(num1, num2) {
  let html = '引数は【' + num1 + '】と【' + num2 + '】です<br>';
  let remainder = num1 % num2;
  while (remainder !== 0) {
    num1 = num2;
    num2 = remainder;
    remainder = num1 % num2;
  }
  html += '最大公約数は' + num2;
  return html;
}