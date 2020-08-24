'use strict';
// function countDown(due) {
//     const now = new Date();
//     const rest = due.getTime() - now.getTime();
//     const sec = Math.floor(rest/1000)%60;
//     const min = Math.floor(rest/1000/60)%60;
//     const hours = Math.floor(rest/1000/60/60)%24;
//     const days = Math.floor(rest / 1000 / 60 / 60 / 24);
//     const count = [days, hours, min, sec]
    
//     return count;
// }
// let goal = new Date();
// goal.setHours(16);
// goal.setMinutes(59);
// goal.setSeconds(59);

// function recalc() {
//     const counter = countDown(goal);
//     const time = `${counter[1]}時間${counter[2]}分${counter[3]}秒`;
//     document.getElementById('countdown').textContent = time;
//     refresh();
// }
// function refresh() {
//     setTimeout(recalc,1000)
// }
// recalc();

// document.getElementById('form2').select.onchange = function () {
//     location.href = document.getElementById('form2').select.value;
// }

// const agree = Cookies.get('cookie-agree');
// const panel = document.getElementById('privacy-panel');
// if (agree === 'yes') {
//     document.body.removeChild(panel);
// }else {
//     document.getElementById('agreebtn').onclick = function () {
//         Cookies.set('cookie-agree', 'yes'), { expires: 7 };
//         document.body.removeChild(panel);
//     };
// }
// document.getElementById('testbtn').onclick = function () {
//     Cookies.remove('cookie-agree');
// };


// $(document).ready(function () {
//     $.ajax({ url: 'data.json', dataType: 'json' })
//         .done(function (data) {
//             data.forEach(function (item, index) {
//                 if (item.crowded ==='yes') {
//                     const idName = '#' + item.id;
//                     $(idName).find('check').addClass('crowded');
//                 }
//             });
//         })
//         .fail(function () {
//             window.alert('読み込みエラー');
//         });
//     $('.click').on('click', function () {
//         if ($(this).hasClass('crowded')) {
//             $(this).text('残席わずか').addClass('red');
//         } else {
//             $(this).text('お席あります').addClass('green');
//         }
//     });
// });

function success(pos) {
    console.log(pos);
    const lat = pos.coords.latitude;
    const lng = pos.coords.longitude;
    const accuracy = pos.coords.accuracy;

    $('#loc').text(`緯度：${lat}経度：${lng}`);
    $('#accuracy').text(accuracy);
}
function fail(error) {
    alert('位置情報の取得に失敗しました。エラーコード'+error.code)
}
navigator.geolocation.getCurrentPosition(success, fail);
