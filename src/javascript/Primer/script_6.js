/*
関数とスコープ
-----------------------------------------
*/
function fn() {//argumentsはインデックスを指定して各要素にアクセスできる
    console.log(arguments[0]);//restparametersが使えるなら
    console.log(arguments[1]);
    console.log(arguments[2]);
}
fn("a", "b", "c");

//関数の引数と分割代入
function print([first, second]) {
    console.log(first);
    console.log(second);
}
const array = [1, 2];
print(array);

//関数はオブジェクト
function fn2() {
    console.log("fnが呼び出されました");
}
const myFunc = fn2;
myFunc();

//関数式には名前を付けなくてもよい（匿名関数）、ただし、この関数は関数式の外では呼び出せない
const factorial = function innerFact(n) {
    if (n === 0) {
        return 1;
    }
    return n * innerFact(n - 1);
};
console.log(factorial(3));

// Alrrow　Functionでは省略形で匿名関数を書ける、newはできない、arguments変数を参照できない

// const fnA = () => { /* 仮引数がないとき */ };
// const fnB = (x) => { /* 仮引数が1つのみのとき */ };
// const fnC = x => { /* 仮引数が1つのみのときは()を省略可能 */ };
// const fnD = (x, y) => { /* 仮引数が複数のとき */ };
// // 値の返し方
// // 次の２つの定義は同じ意味となる
// const mulA = x => { return x * x; }; // ブロックの中でreturn
// const mulB = x => x * x;            // 処理が1行のみの場合はreturnとブロックを省略できる

// コールバック関数
const array2 = [1, 2, 3];
const output = (value) => {//匿名関数で引数はvalue
    console.log(value);
};
array2.forEach(output);//引数として渡される関数（output）をコールバック関数という

// メソッド
const obj = {
    method: function() {//オブジェクトのプロパティーである関数
        return "this is method";
    }
};
console.log(obj.method());

/*
関数とthis
-----------------------------------------
*/
const person = {
    fullName: "Brendan Eich",
    sayName: function() {
        return this.fullName;//person.fullNameをthisに置き換えられる
    }
};
console.log(person.sayName());

const obj1 = {
    obj2: {
        obj3: {
            method() {
                return this;
            }
        }
    }
};
console.log(obj1.obj2.obj3.method() === obj1.obj2.obj3);
// `obj1.obj2.obj3.method`メソッドの`this`は`obj3`を参照、一番左を参照している

// const say = function() {
//     return this.fullName;
// };
// // `this`は`undefined`となるため例外を投げる
// say();

// callメソッド
"use strict";
function say(message) {
    return `${message} ${this.fullName}！`;
}
const person2 = {
    fullName: "Brendan Eich"
};
console.log(say.call(person2, "こんにちは"));//関数.call(thisの値, ...関数の引数);
//say("こんにちは"); エラー

// apply
console.log(say.apply(person2, ["こんにちは"]));//関数.apply(thisの値, [関数の引数1, 関数の引数2]);、引数を配列として渡す

//bind
const sayPerson = say.bind(person2, "こんにちは");//関数.bind(thisの値, ...関数の引数); // => thisや引数がbindされた関数
console.log(sayPerson());

// 上記は基本的には使わない、どうしてもthisを固定したいときに使う

//コールバック関数とthis
//コールバック関数のthisはundefinedになるので、arrow functionを使って回避する
"use strict";
const Prefixer = {
    prefix: "pre",
    prefixArray(strings) {
        return strings.map((str) => {
            // Arrow Function自体は`this`を持たない
            // `this`は外側の`prefixArray`関数が持つ`this`を参照する
            // そのため`this.prefix`は"pre"となる
            return this.prefix + "-" + str;
        });
    }
};
// このとき、`prefixArray`のベースオブジェクトは`Prefixer`となる
// つまり、`prefixArray`メソッド内の`this`は`Prefixer`を参照する
const prefixedStrings = Prefixer.prefixArray(["a", "b", "c"]);
console.log(prefixedStrings);

/*
クラス
-----------------------------------------
*/
class MyClass {//コンストラクターは省略できる、関数のように呼び出せない、クラス名は大文字で始める
    constructor(x, y) {
        this.x = x;
        this.y = y;
        // コンストラクタではreturn文は書かない
    }
}
const myClass = new MyClass(3,4);//newするとインスタンス化
const myClassAnother = new MyClass();
console.log(myClass === myClassAnother);
console.log(myClass instanceof MyClass);//クラスのインスタンス化はinstanceofで判定
console.log(myClass.y);

class Counter {
    constructor() {
        this.count = 0;
    }

    increment() {//コンストラクターの中にメソッドを定義することもできる
        this.count++;
    }
}
const counterA = new Counter();
const counterB = new Counter();
counterA.increment();
console.log(counterA.count);
console.log(counterB.count);


class NumberWrapper {
    constructor(value) {
        this._value = value;
    }
    get value() {    // getはプロパティの値を返す
        console.log("getter");
        return this._value;
    }

    set value(newValue) {    //setはプロパティに値を代入する
        console.log("setter");
        this._value = newValue;
    }
}

const numberWrapper = new NumberWrapper(1);
console.log(numberWrapper.value);//インスタンス名＋プロパティ名でgetが呼び出される
numberWrapper.value = 42;//インスタンス名＋プロパティ名＝でsetが呼び出される
console.log(numberWrapper.value);


//静的メソッド、クラスをインスタンス化させずに利用できる
class ArrayWrapper {
    constructor(array = []) {
        this.array = array;
    }

    static of(...items) {//staticを付けるだけ、子クラスにも継承できる
        return new ArrayWrapper(items);//return new this(items);とも書ける
    }

    get length() {
        return this.array.length;
    }
}

const arrayWrapperA = new ArrayWrapper([1, 2, 3]);
const arrayWrapperB = ArrayWrapper.of(1, 2, 3);
console.log(arrayWrapperA.length);
console.log(arrayWrapperB.length);

class ConflictClass {
    constructor() {
        this.method = () => {
            console.log("インスタンスオブジェクトのメソッド");//こちらが優先される
        };
    }

    method() {
        console.log("プロトタイプのメソッド");
    }
}
const conflict = new ConflictClass();
conflict.method();

// プロトタイプチェーン
class MyClass2 {
    method() {
        console.log("プロトタイプのメソッド");
    }
}
const instance = new MyClass2();
instance.method();
const MyClassPrototype = Object.getPrototypeOf(instance);//Object.getPrototypeOfメソッドで[[Prototype]]内部プロパティを参照
console.log(MyClassPrototype);

//継承したクラスの定義、処理の順番は親クラスから子クラスの順番
class Parent {
    constructor(...args) {
        console.log("Parentコンストラクタの処理", ...args);
    }
}
class Child extends Parent {//extendsを使って継承
    constructor(...args) {//子クラスでもコンストラクターは省略できる
        super(...args);//親クラスのconstractorを呼び出す
        console.log("Childコンストラクタの処理", ...args);
    }
}
const instance2 = new Child("引数1", "引数2");

class Parent2 {
    method() {
        console.log("Parent#method");
    }
}
class Child2 extends Parent2 {

}
const instance3 = new Child2();
instance3.method();//子クラスではmethodを定義していないが、親クラスを継承しているためmethodを呼び出せる

//superプロパティ
class Parent3 {
    method() {
        console.log("Parent#method");
    }
}
class Child3 extends Parent3 {
    method() {
        console.log("Child#method");
        super.method();//親クラスのプロトタイププロパティを呼び出せる
    }
}
const child = new Child3();
child.method(); 
console.log(child instanceof Parent3);//instanceofで継承しているか判定できる

// ビルトインオブジェクトの継承
class MyArray extends Array {//ビルトインオブジェクトのArrayを継承することによってlengthなど使える
    get first() {
        if (this.length === 0) {
            return undefined;
        } else {
            return this[0];
        }
    }

    get last() {
        if (this.length === 0) {
            return undefined;
        } else {
            return this[this.length - 1];
        }
    }
}

const array3 = MyArray.from([1, 2, 3, 4, 5]);
console.log(array3.length);
console.log(array3.first);
console.log(array3.last);


/*
例外処理
-----------------------------------------
*/
//tryで例外が発生すると、catchでtry内で例外処理が発生すると実行され、finally例外処理に関係なく実行
try {
    console.log("try節:この行は実行されます");
    undefinedFunction();
} catch (error) {//catchもしくはfinallyのどちらが書かれていた場合、どちらか一方を省略できる
    console.log("catch節:この行は実行されます");
    console.log(error instanceof ReferenceError);
    console.log(error.message);
} finally {
    console.log("finally節:この行は実行されます");
}

// throw文、ユーザーが例外を投げることができる
function assertPositiveNumber(num) {
    if (num < 0) {
        throw new Error(`${num} is not positive.`);
        //基本的にはErrorオブジェクトのインスタンスに投投げることを推奨、デバックするのに役立つ
    }
}
try {
    assertPositiveNumber(-1);
} catch (error) {
    console.log(error instanceof Error);
    console.log(error.message);
}

//ビルトインエラー
//ReferenceError,存在しない変数や関数などがあった場合
try {
    console.log(x);
} catch (error) {
    console.log(error instanceof ReferenceError);
    console.log(error.name);
    console.log(error.message);
}

// SyntaxError、構文的に不正なコードを解釈しようとした場合のエラー
try {
    eval("foo! bar!");//evalは文字列をJavaScriptとして実行する関数
} catch (error) {
    console.log(error instanceof SyntaxError);
    console.log(error.name);
    console.log(error.message);
}

//TypeError、値が期待される型ではない場合のエラー
try {
    const fn = {};
    fn();
} catch (error) {
    console.log(error instanceof TypeError); 
    console.log(error.name);
    console.log(error.message);
}

// ビルトインエラーを投げる
function reverseString(str) {
    if (typeof str !== "string") {
        throw new TypeError(`${str} is not a string`);//引数を文字列に限定したい場合
    }
    return Array.from(str).reverse().join("");
}

try {
    reverseString(100);
} catch (error) {
    console.log(error instanceof TypeError);
    console.log(error.name);
    console.log(error.message);
}

function fn() {
    console.log("メッセージ");
    console.error("エラーメッセージ");//console.errorはスタックトレースも出力してくれる
}

fn();


/*
非同期処理: コールバック / Promise / Async Function
-----------------------------------------
*/
//プログラミング言語には同期処理と非同期処理に分類が分けられる
// 同期処理ではコードを順番に処理して、一つの処理が終わるまで次にはいかない
// 非同期処理では一つの非同期処理が終わるのを待たずに次の処理を始める
function blockTime(timeout) { 
    const startTime = Date.now();
    while (true) {
        const diffTime = Date.now() - startTime;
        if (diffTime >= timeout) {
            return; // 指定時間経過したら関数の実行を終了
        }
    }
}

console.log("1. setTimeoutのコールバック関数を50ミリ秒後に実行します");
setTimeout(() => {
    console.log("3. ブロックする処理を開始します");
    blockTime(1000); // 他の処理を1秒間ブロックする
    console.log("4. ブロックする処理が完了しました");//非同期処理のコールバックが呼ばれるまでは1000ミリ秒以上かかる
}, 10);
// ブロックする処理は非同期なタイミングで呼び出されるので、次の行が先に実行される
console.log("2. 同期的な処理を実行します");

// 非同期処理と例外処理
setTimeout(() => {//try..catchでは非同期的処理はキャッチできない
    // 非同期処理の中
    try {
        throw new Error("エラー");
    } catch (error) {
        console.log("エラーをキャッチできる");
    }
}, 10);
console.log("この行は実行されます");