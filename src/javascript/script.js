'use strict';
console.log('hello');
const form2=`<h1>書き変え</h1>`;

document.getElementById('form').onsubmit=function () {
    document.getElementById('content').innerHTML=form2;
}