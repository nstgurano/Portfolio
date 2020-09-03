'use strict';
$(document).ready(function () {
    $('#open_nav').on('click',function () {
        $('#main, #nav').toggleClass('show');
    });
});
const agree=Cookies.get('cookie-agree');
const cookie_html="";
if (agree==='yes') {
    document.getElementById('privacy-panel').innerHTML=cookie_html;
}else{
    document.getElementById('agreebtn').onclick=function () {
        Cookies.set('cookie-agree','yes',{expires:7});
        document.getElementById('privacy-panel').innerHTML=cookie_html;
    };
}