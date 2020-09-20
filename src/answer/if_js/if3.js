'use strict';
let nums = [1071, 30, 35, 58];
// if-elseif-else文を用いて、
// $xが3の倍数かつ7の倍数の場合は「xは3の倍数かつ7の倍数です。」
// それ以外で3の倍数の場合は「xは3の倍数ですが7の倍数ではありません。」
// それ以外で7の倍数の場合は「xは7の倍数ですが3の倍数ではありません。」
// それ以外の場合は「xは7の倍数でも3の倍数でもありません。」
// と上記の配列$numsの要素全てについてechoするメソッドdivide($nums)を作成して実行してください。
// 例:1071は3の倍数かつ7の倍数です。
// echoするときに改行も入れるようにしてください。
nums.forEach(value => {
  if (value % 3 === 0 && value % 7 === 0) {
    document.getElementById('if3.1').textContent = 'xは3の倍数かつ7の倍数です。';
  } else if (value % 3 === 0) {
    document.getElementById('if3.2').textContent = 'xは3の倍数です。';
  } else if (value % 7 === 0) {
    document.getElementById('if3.3').textContent = 'xは7の倍数です。';
  } else {
    document.getElementById('if3.4').textContent = 'xは7の倍数でも3の倍数でもありません。';
  }
});