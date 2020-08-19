/*
文字列とUnicode
-----------------------------------------------
*/
//JavaScriptの内部で取り扱うエンコードはUTF－16を使用
// 絵文字など扱う場合はUTF－16を意識して使う必要がある
console.log("\uD83C\uDF4E");//サロゲートペア
console.log("\uD867\uDE3D");//上位サロゲートと下位サロゲートを組み合わせてできている
console.log("🍎".length);//コードポイントの数を数える

function countOfCodePoints(str, codePoint) {//codepointごとに反復処理をする
    return Array.from(str).filter(item => {
        return item === codePoint;
    }).length;
}
console.log(countOfCodePoints("🍎🍇🍎🥕🍒", "🍎"));

/*
ラッパーオブジェクト
-----------------------------------------------
*/

const str = "文字列";
console.log(typeof str);
const stringWrapper = new String("文字列");//プリミティブ型の値を包んだオブジェクトをラッパーオブジェクトという
console.log(typeof stringWrapper);//ラッパーオブジェクトとリテラルを明示的に使いわける利点はないので、基本的にはリテラルを使う