/*
配列
---------------------------------------------------
*/
const array=["one","two","three",]
console.log(array.length);//配列の中身の数を返す
console.log(array[100]);//undefiedになる
const sparseArray = [1,, 3];
console.log(sparseArray.length);//未定義のスペース部分もカウントする
const obj = {};
console.log(Array.isArray(array));//配列であるかのチェック
console.log(Array.isArray(obj));//false


//配列と分割代入
const [first, second, third] = array;
console.log(first);
console.log(second);
console.log(third);

//  undefinedの要素と未定義の要素の違い
const denseArray = [1, undefined, 3];
console.log(denseArray.hasOwnProperty(1));//指定したインデックスが存在するか確認できる
console.log(sparseArray.hasOwnProperty(1));

//配列から要素を検索
//インデックスを取得
const array2 = ["Java", "JavaScript", "Ruby"];
console.log(array2.indexOf("Java"));//キーを返す
console.log(array2.indexOf("Javaaaaaaaaaa"));//-1を返す
const obj2 = { key: "value" };
let array3 = ["A", "B", obj];
console.log(obj === { key: "value" });//false
console.log(array3.indexOf(obj));

//異なるオブジェクトであるが値が同じであるものを探したいとき、findIndexメソッドをつかう
const colors = [
    { "color": "red" },
    { "color": "green" },
    { "color": "blue" }
];
const indexOfBlue = colors.findIndex((obj) => {//インデックスを取得
    return obj.color === "blue";
});
console.log(indexOfBlue);
console.log(colors[indexOfBlue]);

//条件に一致する要素を取得,find
const whiteColor = colors.find((obj) => {
    return obj.color === "white";//findは要素を返す
});
console.log(whiteColor);

//指定の範囲の要素を取得
const array4 = ["A", "B", "C", "D", "E"];
console.log(array4.slice(1, 4));//第一引数に開始位置、第二引数に終了位置を指定

//真偽値を取得
if (array2.includes("JavaScript")) {
    console.log("配列にJavaScriptが含まれている");
}
const isIncludedRedColor = colors.some((obj) => {//someメソッド
    return obj.color === "red";
});
console.log(isIncludedRedColor);

//追加と削除
array4.push("D");//追加
console.log(array4);
const poppedItem = array4.pop(); // 最末尾の要素を削除し、その要素を返す
console.log(poppedItem); 
console.log(array4);
array4.unshift("S");
console.log(array4);
const shiftedItem = array4.shift(); // 先頭の要素を削除
console.log(shiftedItem); 
console.log(array4);

//配列同士の結合
const newArray = array4.concat(["D", "E"]);//concat
console.log(newArray);

//配列の展開
const newArray2 = ["X", "Y", "Z", ...array4];//spred構文を使っても結合でき、好きな位置に入れられる
console.log(newArray2);

//配列をフラット化
const array5 = [[["A"], "B"], "C"];
console.log(array5.flat()); 
console.log(array5.flat(Infinity)); 
//配列から要素を削除
array.splice(1, 1);
console.log(array); 
array.splice(0, array.length);//すべて削除
console.log(array);
// length　プロパティへの代入
console.log(array2);
array2.length = 0;
console.log(array2);

//空の配列を代入
console.log(array3);
array3 = [];
console.log(array3);

//破壊的なメソッドと非破壊的なメソッド
//push、破壊的、コピーなしに結合
//concat、非破壊、コピーして結合
//メソッドの使い方に注意

//配列を反復処理するメソッド
//Array#forEach
array4.forEach((currentValue, index, array) => {
    console.log(currentValue, index, array);
});

//array.map,それぞれのコールバック関数が返した値を集めた新しい配列を返す
const array6 = [1, 2, 3];
const newArray3 = array6.map((currentValue, index, array) => {
    return currentValue * 10;
});
console.log(newArray3);

//filter,trueを返した要素だけを集めた新しい配列を返す
const newArray4 = array6.filter((currentValue, index, array) => {
    return currentValue % 2 === 1;
});
console.log(newArray4);

//Array#reduce
const totalValue = array6.reduce((accumulator, currentValue, index, array) => {
    return accumulator + currentValue;//accumulator=累積値
}, 0);
console.log(totalValue);// 0 + 1 + 2 + 3という式の結果が返り値になる

//メソッドチェーン
const array7 = ["a"].concat("b").concat("c");
console.log(array7);
//
//

/*
文字列
---------------------------------------------------
*/
//JavaScriptの文字列の各要素はUTF-16のCode Unitで構成されている
const multiline = `1行目
2行目
3行目`;
console.log(multiline);//改行を入力できる

const name = "JavaScript";
console.log(`Hello ${name}!`);
//文字列へのアクセス
console.log(name[0]);

//文字列の分解と結合
const strings = "赤・青・緑".split("・").join("、");
console.log(strings);

const str = "a     b    c      d";
const strings1 = str.split(/\s+/);
console.log(strings1);

//文字列の一部を取得
console.log(strings1.slice(-1));

//文字列の検索
console.log(strings1.indexOf("b"));//前から検索、なかったら-1
console.log(strings1.lastIndexOf("a"));//
const str2 = "にわにはにわにわとりがいる";
console.log(str2.endsWith("d"));//末尾にあるか
console.log(str2.startsWith("a"));//先頭にあるか
console.log(str2.includes("a"));//含むか

//正規表現
const str3 = "ABC123EFG";
const searchPattern = /\d{3}/;//3文字以上数字が連続しているか
console.log(str3.search(searchPattern));//search指定された正規表現の検索

const str4 = "ABC あいう DE えお";
const alphabetsPattern = /[a-zA-Z]+/;//a~zまでの文字
const results = str4.match(alphabetsPattern);
const alphabetsPattern2 = /[a-zA-Z]+/g;//gフラグがついていると結果が変わる可能性がある
//正規表現のマッチを文字列の最後まで繰り返すgフラグ
const result1 = alphabetsPattern2.exec(str4);//マッチした最初の要素を返す
console.log(result1[0]);

//マッチした一部の文字列を取得
const pattern = /ECMAScript (\d+)/;
const [all, capture1] = "ECMAScript 6".match(pattern);//数字の部分のみマッチしたい
console.log(capture1);

//文字列の置換/削除
const str5 = "文字列";
const newStr = str5.replace("文字", "");//置換
console.log(newStr);
console.log(str2.replace(/にわ/g, "niwa"));

//タグ付きのテンプレート関数
function tag(strings, ...values) {
    console.log(strings); 
    console.log(values); 
}
tag`template ${0} literal ${1}`;// ()をつけずにテンプレートを呼び出す
console.log();
console.log();
console.log();