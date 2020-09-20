'use strict';
// $colorsという配列を作り、赤、青、黄の順番に入れてください。
let colors = ['赤', '青', '黄'];
// $colorsの最初の要素をechoしてください。
document.getElementById('arrayIO.1').textContent = colors[0];
// $colorsの末尾に白を追加し、$colorsの最後の要素をechoしてください。
colors.push('白');
let last = colors.length - 1;
document.getElementById('arrayIO.2').textContent = colors[last];