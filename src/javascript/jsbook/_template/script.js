'use strict';
console.log('こんにちは');
// window.alert('jsファイルとつながってます！');
// if (window.confirm('1秒後に「こんにちは」を英語に変えますか？')) {
//     setTimeout(() => {
//         document.getElementById('app').textContent = 'Hellow';
//     }, 1000);
// }
// let text = window.prompt('こんにちはを変えますか');

// if (text) {
//     document.getElementById('app').textContent = text;
//     window.alert('文字を変更しました');
// }
// const answer = Math.floor(Math.random() * 6);
// let num = parseInt(window.prompt('0~5の数字を入力して、ランダムに選ばれた数字を当てよう！'));
// if (answer===num) {
//     document.getElementById('app').textContent = '正解';
// } else {
//     document.getElementById('app').textContent = '正解は'+answer;
// }
const hour = new Date().getHours();
const min = new Date().getMinutes();

document.getElementById('app').textContent = `現在${hour}:${min}です`;
// let i = 0;
// while (i<=10) {
//     console.log(i);
//     i++;
// }
// let i = 0;
// for (let i = 0; i <= 5; i++) {
//     console.log(i);
// }
function tax(price) {
    const tax = 0.1;
    return price * 1.1;
}
document.getElementById('output').textContent = `値段は${tax(8000)}円です`;

const array = ['coffee', 'tea', 'ice'];
for (const menu of array) {
    const li = `<li>${menu}</li>`;
    document.getElementById('output2').insertAdjacentHTML('beforeend',li);
}
array.forEach(element => {
    
});