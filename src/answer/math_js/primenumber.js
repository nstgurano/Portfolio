'use strict';
// 1から100までの素数をすべて書き出し、「１から100までの素数は◯個あります。」と表示してください。
// 結果の素数と素数との間はスペースを入れてください。
let array1 = [];

for (let i = 2; i <= 100; i++) {
  let k = true;
  for (let j = 2; j < i; j++) {
    if (i % j == 0) {
      k = false;
    }
  }
  if (k === true) {
    array1.push(i);
  }
}

let list1 = '<ul>';
for (let h = 0; h < array1.length; h++) {
  list1 += '<li>' + array1[h] + '</li>'
}
list1 += '</ul><br>';
list1 += '素数の数は' + array1.length + '個です';
document.getElementById('primenumber').innerHTML = list1;