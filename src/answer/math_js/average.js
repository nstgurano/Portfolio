'use strict';

// $numsに数字の配列が代入されています。この配列の数字の平均値をechoして下さい。
const nums = [1, 2, 3, 4, 5];
let average = 0;
nums.forEach(function (value) {
  return average += Number(value);
})
average /= nums.length;

document.getElementById('average').textContent = '平均値は' + average;