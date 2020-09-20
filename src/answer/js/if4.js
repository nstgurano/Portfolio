'use strict';
let randomNumber = Math.floor(Math.random() * 4) + 0;
// 変数　$randomNumberに0から3までの数字をランダムに入れて
// switch文を用いて、$randomNumber
// が0の場合は「大吉です。」
// が1の場合は「中吉です。」
// が2の場合は「小吉です。」
// それ以外の場合(default)は「末吉です。」
// とechoしてください。
console.log(randomNumber);
switch (randomNumber) {
  case 0:
    document.getElementById('if4.1').textContent = '大吉です。';
    break;

  case 1:
    document.getElementById('if4.2').textContent = '中吉です。';
    break;

  case 2:
    document.getElementById('if4.3').textContent = '小吉です。';
    break;

  default:
    document.getElementById('if4.4').textContent = '末吉です';
    break;
}