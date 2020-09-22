'use strict';
// 1から100までの奇数の和を計算してechoして下さい。
let sum = 0;
for (let i = 1; i <= 100; i++) {
  if (i % 2 === 0) {
    continue;
  }
  sum += i;
}
document.getElementById('sum').textContent = sum;