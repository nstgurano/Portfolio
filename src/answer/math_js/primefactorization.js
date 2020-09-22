// 変数$int に「2600」を代入し､それを素因数分解して結果を$resultに代入して全て表示してください。
// 結果の素数と素数との間はスペースを入れてください。
let int = 2600;

let prime = primeNumber(int);
let result = separateInt(prime, int);
console.log(prime);
console.log(result);
document.getElementById('primefactorization').innerHTML = result;

function primeNumber(int) {
  let array = [];
  for (let i = 2; i <= int; i++) {
    let k = 'good';
    for (let j = 2; j < i; j++) {
      if (i === 2) { //２は素数である
        array.push(2);
      } else if (i % j == 0) { //素数ではない
        k = 'bad';
      }
    }
    if (k === 'good') { //素数である場合
      array.push(Number(i));
    }
  }
  return array;
}

function separateInt(prime, int) {
  let num = '';
  num += '<ul>';
  while (int !== 1) {
    prime.filter(function (key) {
      if (int % key === 0) { //
        num += '<li>' + key + '</li>';
        int /= Number(key);
      }
    })
    console.log(num);
  }
  num += '</ul>';
  return num;
}