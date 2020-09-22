'use strict';
// $numsに数字の配列が代入されています。この配列の数字の最大値を返すメソッドmaxOfを作成して実行して返り値をechoして下さい。
// echoするときに改行も入れるようにしてください。
// 同様にこの配列の数字の最小値を返すメソッドminOfを作成して実行して返り値をechoして下さい。
let array = [7, 5, 3, 34, 2, -3, 6, -2];


function maxOf(nums) {
  let tmp = 0;
  for (let i = 0; i < nums.length; i++) {
    if (tmp < nums[i]) {
      tmp = nums[i];
    }
  }
  console.log(tmp);
  return tmp;
}

function minOf(nums) {
  let tmp = Infinity;
  for (let i = 0; i < nums.length; i++) {
    if (tmp > nums[i]) {
      tmp = nums[i];
    }
  }
  console.log(tmp);
  return tmp;
}
document.getElementById('max').textContent = maxOf(array);
document.getElementById('min').textContent = minOf(array);