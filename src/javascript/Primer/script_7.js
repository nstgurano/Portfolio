/*
非同期処理:コールバック/Promise/Async Function
-----------------------------------------
*/
// エラーファーストコールバック、非同期処理の例外をキャッチする、ただのルールであって仕様ではない
function dummyFetch(path, callback) {
    setTimeout(() => {
        // /success からはじまるパスにはリソースがあるという設定
        if (path.startsWith("/success")) {
            callback(null, { body: `Response body of ${path}` });
        } else {
            callback(new Error("NOT FOUND"));
        }
    }, 1000 * Math.random());
}
// /success/data にリソースが存在するので、`response`にはデータが入る
dummyFetch("/success/data", (error, response) => {
    if (error) {
        // この行は実行されません
    } else {
        console.log(response); // => { body: "Response body of /success/data" }
    }
});
// /failure/data にリソースは存在しないので、`error`にはエラーオブジェクトが入る
dummyFetch("/failure/data", (error, response) => {
    if (error) {
        console.log(error.message); // => "NOT FOUND"
    } else {
        // この行は実行されません
    }
});

// Promise、非同期処理のパターンを形成できる
//エラーファーストコールバックのルール
// 非同期処理が成功した場合は、1番目の引数にnullを渡し2番目以降の引数に結果を渡す
// 非同期処理が失敗した場合は、1番目の引数にエラーオブジェクトを渡す

function dummyFetch(path) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (path.startsWith("/success")) {
                resolve({ body: `Response body of ${path}` });
            } else {
                reject(new Error("NOT FOUND"));
            }
        }, 1000 * Math.random());
    });
}

dummyFetch("/success/data").then(function onFulfilled(response) {
    console.log(response); // => { body: "Response body of /success/data" }
}, function onRejected(error) {
    // この行は実行されません
});

dummyFetch("/failure/data").then(function onFulfilled(response) {
    // この行は実行されません
}, function onRejected(error) {
    console.log(error); // Error: "NOT FOUND"
});



// Promise#thenとPromise#catch

function delay(timeoutMs) {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve();
        }, timeoutMs);
    });
}
// `then`メソッドで成功時のコールバック関数だけを登録、失敗時のときだけも登録できる、resolve, reject
delay(10).then(() => {
    console.log("10ミリ秒後に呼ばれる");
});

// Promiseと例外、
function throwPromise() {
    return new Promise((resolve, reject) => {
        throw new Error("例外が発生");
        //Promise内で例外が発生するとthenメソッドの第二引数やcatchメソッドで登録したエラー時のコールバック関数が呼び出されます
    });
}

throwPromise().catch(error => {
    console.log(error.message);
});


// Promiseの状態
/*
・Pending
FulfilledまたはRejectedではない状態
new Promiseでインスタンスを作成したときの初期状態

・Fulfilled
resolve（成功）したときの状態。このときonFulfilledが呼ばれる

・Rejected
reject（失敗）または例外が発生したときの状態。このときonRejectedが呼ばれる

*/
//Rejected、Fulfilledに一度でもなった場合、別の状態には変化しない




// Promise.resolve、Fulfilledの状態となったPromiseインスタンスを作成
const promise2 = Promise.resolve();
promise2.then(() => {
    console.log("2. コールバック関数が実行されました");
});
console.log("1. 同期的な処理が実行されました");


//Promise.reject,メソッドは Rejectedの状態となったPromiseインスタンスを作成
// const rejectedPromise = Promise.reject(new Error("エラー"));

// Promiseチェーンで逐次処理,thenでつなげていく
// function dummyFetch(path) {
//     return new Promise((resolve, reject) => {
//         setTimeout(() => {
//             if (path.startsWith("/resource")) {
//                 resolve({ body: `Response body of ${path}` });
//             } else {
//                 reject(new Error("NOT FOUND"));
//             }
//         }, 1000 * Math.random());
//     });
// }

// const results = [];
// dummyFetch("/resource/A").then(response => {
//     results.push(response.body);
//     return dummyFetch("/resource/B");
// }).then(response => {
//     results.push(response.body);
// }).then(() => {
//     console.log(results);
// });

// Promise.allで複数のPromiseをまとめる
// 配列で要素を受け取り、要素の順番はPromiseの順番と同じ
// 複数あってどちらを先に取得しても問題ない場合
// 一つでもRejectedとなった場合は、失敗時の処理が呼び出される
function delay(timeoutMs) {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve(timeoutMs);
        }, timeoutMs);
    });
}
const promise3 = delay(1);
const promise4 = delay(2);
const promise5 = delay(3);

Promise.all([promise3, promise4, promise5]).then(function(values) {
    console.log(values); 
});



//Promise.race
// 複数あって、一つでも状態が変わったら次の処理に進む
// 配列の一番最初に状態が変わったものと一緒の状態を示す、Fulfilledの場合Fulfilledになる
function delay(timeoutMs) {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve(timeoutMs);
        }, timeoutMs);
    });
}
// 1つでもresolveまたはrejectした時点で次の処理を呼び出す
const racePromise = Promise.race([
    delay(1),
    delay(32),
    delay(64),
    delay(128)
]);
racePromise.then(value => {
    // もっとも早く完了するのは1ミリ秒後
    console.log(value); // => 1
});

//Async Function
/*
Async Functionが値をreturnした場合、その返り値を持つFulfilledなPromiseを返す
Async FunctionがPromiseをreturnした場合、その返り値のPromiseをそのまま返す
Async Function内で例外が発生した場合は、そのエラーを持つRejectedなPromiseを返す
*/

//await式、Async Functionの中でのみ利用可能
// 非同期処理を実行して完了するまで、次の行（次の文）を実行しない

async function asyncMain() {
    // await式のエラーはtry...catchできる
    try {
        // `await`式で評価した右辺のPromiseがRejectedとなったため、例外がthrowされる
        const value = await Promise.reject(new Error("エラーメッセージ"));
        // await式で例外が発生したため、この行は実行されません
    } catch (error) {
        console.log(error.message); // => "エラーメッセージ"
    }
}
// asyncMainはResolvedなPromiseを返す
asyncMain().catch(error => {
    // すでにtry...catchされているため、この行は実行されません
});

function dummyFetch(path) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (path.startsWith("/resource")) {
                resolve({ body: `Response body of ${path}` });
            } else {
                reject(new Error("NOT FOUND"));
            }
        }, 1000 * Math.random());
    });
}
// リソースAとリソースBを順番に取得する
async function fetchAB() {
    const results = [];
    const responseA = await dummyFetch("/resource/A");
    results.push(responseA.body);
    const responseB = await dummyFetch("/resource/B");
    results.push(responseB.body);
    return results;
}
// リソースを取得して出力する
fetchAB().then((results) => {
    console.log(results); // => ["Response body of /resource/A", "Response body of /resource/B"]
});





// Async Functionと反復処理、forで一つ一つ確認すると時間がかかる
function dummyFetch(path) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (path.startsWith("/resource")) {
                resolve({ body: `Response body of ${path}` });
            } else {
                reject(new Error("NOT FOUND"));
            }
        }, 1000 * Math.random());
    });
}
// 複数のリソースを順番に取得する
async function fetchResources(resources) {
    const results = [];
    for (let i = 0; i < resources.length; i++) {
        const resource = resources[i];
        // ループ内で非同期処理の完了を待っている
        const response = await dummyFetch(resource);
        results.push(response.body);
    }
    // 反復処理がすべて終わったら結果を返す(返り値となるPromiseを`results`でresolveする)
    return results;
}
// 取得したいリソースのパス配列
const resources = [
    "/resource/A",
    "/resource/B"
];
// リソースを取得して出力する
fetchResources(resources).then((results) => {
    console.log(results); // => ["Response body of /resource/A", "Response body of /resource/B"]
});




// Promise APIとAsync Functionを組み合わせる
// function dummyFetch(path) {
//     return new Promise((resolve, reject) => {
//         setTimeout(() => {
//             if (path.startsWith("/resource")) {
//                 resolve({ body: `Response body of ${path}` });
//             } else {
//                 reject(new Error("NOT FOUND"));
//             }
//         }, 1000 * Math.random());
//     });
// }
// // 複数のリソースをまとめて取得する
// async function fetchAllResources(resources) {
//     // リソースを同時に取得する
//     const promises = resources.map(function(resource) {
//         return dummyFetch(resource);
//     });
//     // すべてのリソースが取得できるまで待つ
//     // Promise.allは [ResponseA, ResponseB] のように結果が配列となる
//     const responses = await Promise.all(promises);
//     // 取得した結果からレスポンスのボディだけを取り出す
//     return responses.map((response) => {
//         return response.body;
//     });
// }
// const resources = [
//     "/resource/A",
//     "/resource/B"
// ];
// // リソースを取得して出力する
// fetchAllResources(resources).then((results) => {
//     console.log(results); // => ["Response body of /resource/A", "Response body of /resource/B"]
// });




// forEachでawaitを使うときはAsyncで定義
// function dummyFetch(path) {
//     return new Promise((resolve, reject) => {
//         setTimeout(() => {
//             if (path.startsWith("/resource")) {
//                 resolve({ body: `Response body of ${path}` });
//             } else {
//                 reject(new Error("NOT FOUND"));
//             }
//         }, 1000 * Math.random());
//     });
// }
// // リソースを順番に取得する
// async function fetchResources(resources) {
//     const results = [];
//     // コールバック関数をAsync Functionに変更
//     resources.forEach(async function(resource) {
//         // await式を利用できるようになった
//         const response = await dummyFetch(resource);
//         results.push(response.body);
//     });
//     return results;
// }
// const resources = ["/resource/A", "/resource/B"];
// // リソースを取得して出力する
// fetchResources(resources).then((results) => {
//     // しかし、resultsは空になってしまう
//     console.log(results); // => []
// });


/*
Map/Set
-----------------------------------------
*/
// Map→連想配列
/*
マップのサイズを簡単に知ることができる
マップが持つ要素を簡単に列挙できる
オブジェクトをキーにすると参照ごとに違うマッピングができる
*/ 
const map = new Map([["key1", "value1"], ["key2", "value2"]]);
console.log(map.size);

//要素の追加と取り出し、set
map.set("key", "value1");
console.log(map.size);

// 削除
map.delete("key1");
map.clear();
console.log(map.size);

// マップの反復処理
const map2 = new Map([["key1", "value1"], ["key2", "value2"]]);
const results = [];
map2.forEach((value, key) => {
    results.push(`${key}:${value}`);
});
console.log(results);


const keys = [];
for (const key of map2.keys()) {//戻り値をresultに入れる
    keys.push(key);
}
console.log(keys); 
const keysArray = Array.from(map2.keys());//keyを配列に変換
console.log(keysArray); 

const entries = [];
for (const [key, value] of map2.entries()) {
    entries.push(`${key}:${value}`);//
}
console.log(entries); //entriesメソッドはマップが持つすべての要素を返す


class ShoppingCart {
    constructor() {
        // 商品とその数を持つマップ
        this.items = new Map();
    }
    // カートに商品を追加する
    addItem(item) {
        const count = this.items.get(item) || 0;
        this.items.set(item, count + 1);
    }
    // カート内の合計金額を返す
    getTotalPrice() {
        return Array.from(this.items).reduce((total, [item, count]) => {
            return total + item.price * count;
        }, 0);
    }
    // カートの中身を文字列にして返す
    toString() {
        return Array.from(this.items).map(([item, count]) => {
            return `${item.name}:${count}`;
        }).join(",");
    }
}
const shoppingCart = new ShoppingCart();
// 商品一覧
const shopItems = [
    { name: "みかん", price: 100 },
    { name: "リンゴ", price: 200 },
];

// カートに商品を追加する
shoppingCart.addItem(shopItems[0]);
shoppingCart.addItem(shopItems[0]);
shoppingCart.addItem(shopItems[1]);

// 合計金額を表示する
console.log(shoppingCart.getTotalPrice()); // => 400
// カートの中身を表示する
console.log(shoppingCart.toString());


// Set
// 重複する値がないことを保証した順序を持たないコレクションを扱う


// 値の追加と取り出し
const set = new Set();
// 値の追加
set.add("a");
console.log(set.size); // => 1
// 重複する値は追加されない
set.add("a");
console.log(set.size); // => 1
// 値の存在確認
console.log(set.has("a")); // => true
console.log(set.has("b"));

// 削除
set.delete("a");
console.log(set.size); // => 1
set.clear();
console.log(set.size);

// セットの反復処理
const results2 = [];
set.forEach((value) => {
    results2.push(value);
});
console.log(results2);

// weakset
// WeakSetは値の追加と削除、存在確認以外のことができない



/*
JSON
-----------------------------------------
*/

// JSONオブジェクト
const json = '{ "id": 1, "name": "js-primer" }';
const obj = JSON.parse(json);//JSON文字列をオブジェクトに変換する
console.log(obj.id); 
console.log(obj.name);


// 例外処理
const userInput = "not json value";
try {
    const json = JSON.parse(userInput);
} catch (error) {
    console.log("パースできませんでした");
}

// オブジェクトをJSON文字列に変換する
const obj3 = { id: 1, name: "js-primer", bio: null };
const replacer = (key, value) => {
    if (value === null) {
        return undefined;
    }
    return value;
};
console.log(JSON.stringify(obj3, replacer,2));
//文字列に変換してくれる、
//第二引数に関数・配列を渡す（replace関数）
//第三引数に数値の分の長さでインデントされる(space関数)
//関数、udefinedSymbolは変換できない


/*
Date
-----------------------------------------
*/
//機能的に不十分なのであまり使わない
const now = new Date();
// 時刻値だけが欲しい場合にはDate.nowメソッドを使う
console.log(Date.now());

// 時刻値を取得する
console.log(now.getTime());
// 時刻をISO 8601形式の文字列で表示する、見やすい
console.log(now.toISOString());

/*
Math
-----------------------------------------
*/
//乱数生成
for (let i = 0; i < 5; i++) {
    // 毎回ランダムな浮動小数点数を返す
    console.log(Math.random());
}

// 大小の比較
console.log(Math.max(1, 10));
console.log(Math.min(1, 10));

const numbers = [1, 2, 3, 4, 5];
console.log(Math.max(...numbers));
console.log(Math.min(...numbers));


console.log(Math.floor(1.3));//切り捨て
console.log(Math.ceil(1.3));//切り上げ
console.log(Math.round(1.3));//四捨五入
console.log(Math.trunc(1.3));//小数点以下消す

/*
ECMAScriptモジュール
-----------------------------------------
*/
// 名前付きとデフォルトの方法がある
//デフォルトは1つしかできない
// エクスポートされていないものはインポートできない



//export文
const foo = "foo";
// 宣言済みのオブジェクトを名前つきエクスポートする
export { foo };
    
const foo1 = "foo";
// foo変数の値をデフォルトエクスポートする
export default foo1;

const internalFoo = "foo";
// internalFoo変数をfooとして名前つきエクスポートする
export { internalFoo as foo };



// import文
import { foo, bar } from "./my-module.js";