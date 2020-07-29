/*
文と式
--------------------------------
*/


/*
式の特長
・式を評価すると結果の値が得られる
*/
console.log(1 + 1);
const total = 1 + 1;

/*
文とは
・処理をする1ステップが1つの文
・；をつけて区切る
*/
const isTrue = true;
// if (isTrue) {}if文は式にはなれず、変数へ代入できない

/*
式文とは
・式は文になれるので、文になった式のことを式文という
*/
/*
ブロック文とは
・｛｝で囲んだ部分、ブロックには複数の文が書ける、ブロック文には；はいらない
・REPLで同じ変数を使うときに｛｝で囲んであげるとエラーは出ない
*/
if (true) {
    console.log("文1");
    console.log("文2");
}
/*
function宣言とfunction式
・
*/
function learn() {//ブロック文だから；は必要ない
}
const read = function() {//匿名関数は式であるから；が必要
};



/*
条件分岐
--------------------------------------------------
知ってる部分が多く、知らない部分だけ
*/

function getECMAScriptName(version) {//breakだけでなくreturnでも関数内では組み合わせられる
    switch (version) {
        case "ES5":
            return "ECMAScript 5";
        case "ES6":
            return "ECMAScript 2015";
        case "ES7":
            return "ECMAScript 2016";
        default:
            return "しらないバージョンです";
    }
}
getECMAScriptName("ES6");


/*
ループと反復処理
--------------------------------------------------
*/
/*
変数宣言にletを使うのは再代入できるから
JavaScriptではwhile文はあまり使わない
他に無限ループしない書き方がある
無限ループをしたときは、Ctrl + Cを入力
*/

//while
const x = 1000;
do {
    console.log(x); // => 1000
} while (x < 10);//条件に合わなくても最初にdoが実行される

//for
let sum = 0;
for (let i = 0; i < 10; i++) {
    sum += i + 1;
    
}
console.log(sum);

//forEach,すべての配列の要素を返す
const array = [1, 2, 3];
array.forEach(currentValue => {
    console.log(currentValue);
});

function Num(numbers) {
    let all = 0;
    numbers.forEach(num => {
        all += num;
    });
    return all;
}
Num([1, 2, 3, 4, 5])

//配列のsomeメソッド,returnを使わなくてもtrueやfalseを返す
function isEven(num) {
    return num % 2 === 0;
}
const numbers = [1, 5, 10, 15, 20];
console.log(numbers.some(isEven));

//配列のfilterメソッド,当てはまった要素を返す
console.log(numbers.filter(isEven));

/*
for...in文は意図しない挙動があるため基本的に避ける
Object.keysなどを使って
*/


/*
for...of文
*/
const str = "𠮷野家";
for (const value of str) {
    console.log(value);//文字列の場合、1文字ずつ取ってくる
}

//reduceメソッドを使うことで変数宣言をしなくても、更新をしてくれる
function Sum(numbers) {
    return numbers.reduce((total, num) => {
        return total + num;
    }, 0); 
}
Sum([1, 2, 3, 4, 5]);

/*
オブジェクト
--------------------------------------------------------
*/
const obj = {
    key: "value"//プロパティ名は"""を省略できるが、key-nameなど識別できないものには必要
};

const name = "名前";
const obj1 = {
    name: name//指定した変数を返す
};
// const obj = {//プロパティ名と値に指定する変数名が同じなら省略しても書ける
//     name
// };
console.log(obj1);

//プロパティへのアクセス
console.log(obj.key);//key-nameなど識別できないものには使えない、変数も使えない
console.log(obj["key"]);
const languages = {
    ja: "日本語",
    en: "英語"
};
const myLang = "ja";
console.log(languages[myLang]);

// const ja = languages.ja;//分割代入もできる
// const en = languages.en;
// console.log(ja); 
// console.log(en);
const { ja, en } = languages;
console.log(ja); // => "日本語"
console.log(en);

//プロパティの追加
const obj2 = {};
// `key`プロパティを追加して値を代入
obj2.key = "value";//追加方法はブラケットでもよい
console.log(obj2.key); 

//プロパティの削除
const obj3 = {//constで宣言してるがプロパティは変更できる
    key1: "value1",
    key2: "value2"
};
delete obj3.key2;
console.log(obj3);

"use strict";// freezeしたオブジェクトにプロパティを追加や変更できない
const object = Object.freeze({ key: "value" });
object.key = "value";

//プロパティの存在を確認する
const widget = {
    window: {
        title: "ウィジェットのタイトル"
    }
};
console.log(widget.windw); //プロパティ名を間違えてもエラーは出ない
//console.log(widget.windw.title);//titleまで調べたときに初めてエラーが出る
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();
console.log();