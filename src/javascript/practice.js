// コールバック関数、関数に別の関数を呼び出してもらうもの
// 関数を受け取る関数を高階関数という
// 関数は値として扱える
setTimeout(function() {//settimeout関数(関数、引数)
    console.log('Hello!');
  }, 2000);
  
  function doTwiceWithValue(func) {
    func('Hello!'); // 1回目！
    func('I am here!!!'); // 2回目！
  }
  
  // 受け取ったmessageを表示するだけの関数を渡す
  doTwiceWithValue(function(message) {
    console.log(message);
  });

//  オブジェクトのプロパティーの追加
const obj = {};
obj.key = "value";
obj["key2"] = "value2";
console.log(obj.key2);

// オブジェクトの複製
const obj2 = { "a": "a" };
console.log(obj2);
const obj3 = Object.assign({}, obj2);
console.log(obj3);

const obj4 = { 
    level: 1,
    nest: {
        level: 2
    }
};

const obj5 = Object.assign({}, obj4);
console.log(obj5);//nestは複製されていない、浅い複製しかできない

// array-likeオブジェクト、配列のように扱えるが、forEachなどのメソッドは使えない
function myFunc() {
    console.log(arguments[0]); // => "a"
    console.log(arguments[1]); // => "b"
    console.log(arguments[2]); // => "c"
    // 配列ではないため、配列のメソッドは持っていない
    console.log(typeof arguments.forEach); // => "undefined"
}
myFunc("a", "b", "c");

// 正規表現
// RegExpで識別するか、正規表現リテラルで識別するか
// 前者と後者の違いは評価のタイミング
// 前者は関数が呼び出されないとエラーがでず、後者は関数を呼び出していなくてもエラーを出せる
// ｇフラグがあればすべての結果を返せる

// テンプレートリテラル
var foo = "--";
var b = `ジャバスクリプト`;//バッククォートで囲む、改行コードは気にしなくてよい
var b = `ジャバ${foo}スク${111 + 222}リプト`;//変数も入れられる
console.log(b);
function tag(){
    console.log(arguments);
  }
tag`\\ジャバ${true}スク${1 + 2}リプト`;//渡される引数が変わる
var b = String.raw`ジャバ\スク\nリプト`;//エスケープせずに文字をそのまま使える
console.log(b);