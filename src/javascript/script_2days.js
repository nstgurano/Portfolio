/*
*演算子
-------------------------------------------------------
*/
console.log(1 + 1);//+演算子の対象となっているものをオペランドといい、2つのオペランドを取る演算子を2項演算子という　ex)1
console.log(8-4);
console.log(8*4);
console.log(8/4);
console.log(8 % 4);
console.log(2 ** 4);
console.log(Math.pow(2,4));

//単項演算子、書き方は以下のようにしてもよい
let num = 1;
num++;
console.log(num);
let num2 = 2;
++num2;//+1をしてから、numの評価結果1を返す
console.log(num2);
//++を前に置くか後ろに置くかで評価の順番が変わる
let x = 1;//numの評価結果1を返してから、+1をする
x++;
console.log(x);
let x2 = 1;
console.log(x2++);//numの評価結果1を返してから、+1をする
console.log(x2);


let string="文字列を"+"結合"
console.log(string);

console.log(+"1");//文字列を数字に変換
console.log(+"文字");//NaNという特殊な値に変換、上記も基本的には使わない

console.log(-1);//マイナス表示してくれる
console.log(-(-1));//マイナスを反転させる
console.log(-"1");//文字列もマイナスにできるが数字のみ、文字はできない


//厳密等価演算子
console.log(1===1);//true
console.log(1 === "1");//false
const objA = {};
const objB = {};
console.log(objA===objB);//false
console.log(objA === objA);//true

//厳密不等価演算子
console.log(1!==1);//false
console.log(1 !== "1");//true

//等価演算子
console.log(1==1);//同じデータの型を比較できる
console.log(1=="1");//意図しない挙動になってしまう
console.log(0==false);//基本的には使わない
console.log(0 == null);
//不等価演算子
console.log(1!=0);//以下も基本的には意図しない挙動になるので使わない　
console.log(1!="1");
console.log(0 != false);
//nullやundefinedを比較するときは上記2種類を使うと楽に書ける

console.log(1<2);//小なり
console.log(2>3);//大なり
console.log(2<=3);
console.log(1>=2);
console.log(0b0000000000000000000000000001001);//ビット演算子
console.log((9).toString(2));
console.log(15&9);//
console.log(15|9);//
console.log(15 ^ 9);//


//否定演算子～
console.log(~15);
const str="森森本森森"
console.log(str.indexOf("本"));//あれば2を返す
console.log(str.indexOf("日"));//無ければ－1を返す
if (str.indexOf("森")!==-1) {//indexOfメソッドで見つからない場合は－1を返す
    console.log("森を見つけました")
}
if (~str.indexOf("木")) {//(~(-1)は0となるため見つからなかった場合は実行されない)
    console.log("森を見つけました")
}
if (str.includes("森")) {//indexOfと~を含んだ内容がincludes
    console.log("森を見つけました")
}

//代理演算子
let num3 = 1;
num3+=10
console.log(num3);

//
const array = [1, 2];
const [a, b] = array;
console.log(a);
console.log(b);

const objC = {
    "key": "value"
};
const { key } = objC;
console.log(key);
//三項演算子
const valueA = true ? "A" : "B";//trueならばA
console.log(valueA);
const valueB = false ? "A" : "B";//falseならばB
console.log(valueB);


function addPrefix(text,prefix) {//
    const pre = typeof prefix === "string" ? prefix : "デフォルト"
    return pre + text;
}
console.log(addPrefix("文字列"));
console.log(addPrefix("文字列", "カスタム"));

function addPrefix2(text,prefix) {//IF分を使うと宣言も増え、constも使えない
    let pre = "デフォルト";
    if (typeof prefix === "string") {
        pre = prefix;
    }
    return pre + text;
}
console.log(addPrefix("文字列"));
console.log(addPrefix("文字列", "カスタム"));

//AND演算子、OR演算子、NOT演算子、カンマ演算子
const f = true;
const g = false;
console.log(f && g);//左辺がTRUEならば右辺の結果を返す

const c = true;
const d = false;
console.log(c || d);//左辺がFALSEであるならば右辺の結果を返す

console.log(!false);//trueを返す

const h = 1, i = 2, j = h + i;//左から順に評価していく
console.log(j);

/*
暗黙的な型変換
-------------------------------------------------------
*/

const k = 1 + true;
console.log(k);//暗黙的にtrueが1になるので基本的には厳密等価演算子を使う
/*
falsyな値はfalseになる
false,undefined,null,0,NaN,""
*/
const l = "43";
const change = Number(l);
console.log(change);
console.log(l);
/*
NaNはNUMBER型の一種、計算途中でNaNになると最終結果もNaNになってしまう、
明示的な変換をしても直せない
計算途中でNANにならないように引数などは数値のみを受け付けるようにする
*/
// function Sum(...values) {
//     return values.reduce((total, value) => {
//         if (typeof value !=="number") {
//             throw new Error(`${value}はNUMBER型ではありません`);
//         }
//         return total + Number(value);
//     }, 0);
// }
// const X = 1, Z = 10;
// let Y;
// console.log(X,Y,Z);
// console.log(Sum(X, Y, Z));

function isEmptyString(STR) {//空文字であるかの判定、わざわざ明示的にBOOOLEANの型変換は必要ない
    return typeof STR === "string" && STR.length === 0;
}
console.log(isEmptyString(""));
console.log(isEmptyString(0));
console.log(isEmptyString());

/*
関数と宣言
-------------------------------------------------------
*/
//同じ名前の関数宣言は上書きされる

function echo(x="デフォルト値") {//引数がなかった場合、デフォルト値が返ってくる
    return x;
}
console.log(echo());

//可変引数
const max = Math.max(1, 2, 3, 5, 67);
console.log(max);

//残余引数
function fn(...arg2) {//配列として代入される
    console.log(arg2);
}
fn(a, b, c)

//spred構文
function fn2(x,y,z) {
    console.log(x);
    console.log(y);
    console.log(z);
}
const Array = [1, 2, 3];
fn2(...Array);//配列を引数に展開して関数を呼び出す

//分割代入
function printUserId(user) {
    console.log(user.id); 
}
const user = {
    id: 42
};
printUserId(user);

//関数はオブジェクトとして使える
function fn3() {
    console.log("fnが呼び出されました");
}
const myFunc = fn;
myFunc();

//関数式
const factorial = function innerFact(n) {
    if (n === 0) {
        return 1;
    }
    return n * innerFact(n - 1);//再帰処理
};
console.log(factorial(3));

//Arrow Function
/*
仮引数が1つの場合（）を省略できる
仮引数がないときは（）は必要
複数の場合も必要
関数の処理が1つの式だけならば｛｝とRETURNを省略できる
特徴
・名前を付けられない
・thisが使える？
・newできない
*/
const ARRAY = [1, 2, 3];
const doubleArray = array.map(function (value) {
    return value * 2;
});
//const doubleArray = array.map(value => value * 2);{}とreturnの省略形
console.log(doubleArray);

//コールバック関数
const array1 = [1, 2, 3];
const output = (value1) => {
    console.log(value1);
};
// const array = [1, 2, 3];
// array.forEach((value) => {
//     console.log(value);
// });
// 毎回関数を定義するのは大変なので上記の書き方もある
array.forEach(output);
//メソッド
const objD = {
    method(){
        return "this is method";
    }
};
console.log(objD.method());//オブジェクト名＋メソッド名で呼び出せる
console.log();
console.log();
console.log();