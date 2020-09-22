'use strict';
// 1から100までの数をechoしてください。
// 3の倍数の時には数の代わりに「Fizz」をechoしてください。
// 5の倍数の時には数の代わりに「Buzz」をechoしてください。
// 3と5両方の倍数の時には数の代わりに「FizzBuzz」をechoしてください。
// echoするときに改行も入れるようにしてください。
let result = [];

for (let i = 1; i <= 100; i++) {
  if (i % 3 === 0 && i % 5 === 0) {
    result.push('FizzBuzz');
  } else if (i % 3 === 0) {
    result.push('Fizz');
  } else if (i % 5 === 0) {
    result.push('Buzz');
  } else {
    result.push(i);
  }
}

function list(result) {
  let list = '<ul>\n';
  for (let j = 0; j < result.length; j++) {
    list += '<li>';
    list += result[j];
    list += '</li>;'
  }
  list += '</ul>';
  return list;
}
console.log(result);
document.getElementById('fizz').innerHTML = result;