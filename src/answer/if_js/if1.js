'use strict';
let x = 99 * 99;
// if文を用いて、$xが9800より大きい場合に
// 変数xは9800より大きいです。とechoさせてください。
if (9800 < x) {
  document.getElementById('if1').textContent = '変数xは9800より大きいです。';
}


let y = 77 * 77;
// if文を用いて、$yが6000より大きい場合に
// 変数xは9800より大きいです。とechoさせてください。
if (6000 < y) {
  document.getElementById('if1.1').textContent = ' 変数yは9800より大きいです。'; // 変数yは6000より大きいです。←では？？
} else {
  document.getElementById('if1.1').textContent = ' 変数yは9800より小さいです。'; // 変数yは6000より大きいです。←では？？
}