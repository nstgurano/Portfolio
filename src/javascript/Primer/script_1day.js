/*
------------------------------------------------
変数 
*/

const day = "3";//constはHTMLのidと同じく一つしか同じ変数は使えない、再代入ができないが定数ではなく、同じ値を示すとは限らない
console.log(day);

let month, year;//letは再代入可能、また初期値を設定しなくてもよい、変数名は変えられない
month = "March";
year = 2020;
console.log(month,year);
month = "May";
console.log(month);

var gender = "male";//varはほぼletと同じだが、変数名が再定義できるため、基本的には使わないほうがいい
console.log(gender);
var gender = "female";

console.log(typeof gender);//typeofでデータ型を調べられる、プリミティブ型
console.log(typeof null);//以下はすべてobjectで返される、オブジェクト型
console.log(typeof { "key":"value"});
console.log(typeof ["配列"]);


/*
------------------------------------------------
リテラル
*/
console.log(0b1111);//2進数を表すリテラル、8進数や16進数などもある
console.log(.123);//小数点を表すリテラル、0は省略できる
console.log(true);//Booleanのリテラルはそのままtrue,falseを返す
console.log('こんにちは');//シングル・ダブルクォートでも変わらない
console.log(`今月は${month}です`);//バッククォートで変数を埋め込める

const obj = {
    "key":"value"
};
console.log(obj.key);//ドットでつないで参照
console.log(obj["key"]);//ブラケットでつないで参照
//123のようにプロパティ名が数字であるとドットは使えない
//undefinedはリテラルではないので変数名として使える

const emptyArray = [];//空の配列
const array=["index:0","index:1","index:2"]//値を持った配列
console.log(array[0]);

//正規表現
const numberRegExp = /\d+/;//一文字以上の数字にマッチする正規表現
console.log(numberRegExp.test(123));

const str = new String("こんにちは");//STRINGはラッパーオブジェクト、わざわざ明示的にしなくてもよく、基本的には使わない
console.log(typeof str);
console.log(str.length);


