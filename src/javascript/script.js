'use strict';
console.log('hello');
const form2=`<h1>書き変え</h1>`;

document.getElementById('form').onsubmit=function () {
    document.getElementById('content').innerHTML=form2;
}

const agree=Cookies.get('cookie-agree');
if (agree==='yes') {
    console.log('クッキーを確認しました');
}else{
    console.log('クッキーを確認できませんでした');
    document.getElementById('agreebtn').onclick=function () {
        Cookies.set('cookies-agree','yes',[])
    }
}