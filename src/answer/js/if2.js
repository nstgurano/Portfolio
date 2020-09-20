'use strict';
// $ageという変数に適当な数字を代入してください
let age = 31;
// if-else文を用いて、$ageが30以上の場合は「あなたは30歳以上です。」
// $ageが30未満の場合は「あなたは30歳未満です。」
// とechoしてください。
if (30 <= age) {
  document.getElementById('if2').textContent = 'あなたは30歳以上です。';
} else {
  document.getElementById('if2').textContent = 'あなたは30歳未満です。';
}