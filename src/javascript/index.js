/*エントリーポイント
--------------------------------------
*/

// ウェブブラウザとDOM
/*
DOMとはHTMLのドキュメントをJavaScriptから操作できる
*/ 
console.log("Hellow!");

// const heading = document.querySelector("h2");
// h2要素に含まれるテキストコンテンツを取得する
// const headingText = heading.textContent;

// console.log(heading);

// const button = document.createElement("button");
// button.textContent = "Push Me";
// body要素の子要素としてbuttonを挿入する
// document.body.appendChild(button);


/*
HTTP通信
--------------------------------------
*/
// Fetch APIとは
// ページ全体を再読み込みすることなく指定したURLからデータを取得できる
// レスポンスの受け取り、fertchはPromiseを返す
// const userId = "js-primer-example";//GitHubアカウントのユーザー情報
// function fetchUserInfo(userId) {
//     fetch(`https://api.github.com/users/${encodeURIComponent(userId)}`)
//         .then(response => {
//             console.log(response.status);
//             // okプロパティーはエラーレスポンスが返されたことを検知する
//             if (!response.ok) {
//                 console.error("エラーレスポンス", response);
//             } else {
//                 return response.json().then(userInfo => {
//                     const view = `
//                     <h4>${userInfo.name} (@${userInfo.login})</h4>
//                     <img src="${userInfo.avatar_url}" alt="${userInfo.login}" height="100">
//                     <dl>
//                         <dt>Location</dt>
//                         <dd>${userInfo.location}</dd>
//                         <dt>Repositories</dt>
//                         <dd>${userInfo.public_repos}</dd>
//                     </dl>
//                     `;//HTMLの要素
//                     const result = document.getElementById("result");//htmlのid属性を取得する
//                     result.innerHTML = view;//innerHTMLに文字列をセットすると、その文字列はHTMLとして解釈される
//                 });
//             }
//         }).catch(error => {//HTTP通信ではエラーがつきものだから、エラーハンドリングはしっかり
//             console.error(error);
//         });
// }

// /*
// データを表示する
// --------------------------------------
// */
// // DOMに追加する方法
// // HTML文字列をElement#innerHTMLプロパティにセットする方法


// //HTML文字列をエスケープするためにはライブラリーなどを使うとよい
// function escapeSpecialChars(str) {//独自の実装はあまりしない
//     return str
//         .replace(/&/g, "&amp;")
//         .replace(/</g, "&lt;")
//         .replace(/>/g, "&gt;")
//         .replace(/"/g, "&quot;")
//         .replace(/'/g, "&#039;");
// }

// function escapeHTML(strings, ...values) {//タグ関数、＠でテンプレートリテラルにタグ付けしてくれる
//     return strings.reduce((result, str, i) => {
//         const value = values[i - 1];
//         if (typeof value === "string") {
//             return result + escapeSpecialChars(value) + str;
//         } else {
//             return result + String(value) + str;
//         }
//     });
// }

/*
Promiseを活用する
-----------------------------------------------------
*/
// 前章とは変えて、関数を細分化し、エラーハンドリングをしやすくする

// function main() {
//     fetchUserInfo("js-primer-example")
//     .catch((error) => {
//         // Promiseチェーンの中で発生したエラーを受け取る
//         console.error(`エラーが発生しました (${error})`);
//     });
// }

// function fetchUserInfo(userId) {
//     fetch(`https://api.github.com/users/${encodeURIComponent(userId)}`)
//         .then(response => {
//             if (!response.ok) {
//                 // エラーレスポンスからRejectedなPromiseを作成して返す
//                 return Promise.reject(new Error(`${response.status}: ${response.statusText}`));
//             } else {
//                 return response.json().then(userInfo => {
//                     const view = createView(userInfo);
//                     displayView(view);
//                 });
//             }
//         }).catch(error => {
//             console.error(error);
//         });
// }

// function createView(userInfo) {
//     return escapeHTML`
//     <h4>${userInfo.name} (@${userInfo.login})</h4>
//     <img src="${userInfo.avatar_url}" alt="${userInfo.login}" height="100">
//     <dl>
//         <dt>Location</dt>
//         <dd>${userInfo.location}</dd>
//         <dt>Repositories</dt>
//         <dd>${userInfo.public_repos}</dd>
//     </dl>
//     `;
// }

// function displayView(view) {
//     const result = document.getElementById("result");
//     result.innerHTML = view;
// }

// function escapeSpecialChars(str) {//独自の実装はあまりしない
//     return str
//         .replace(/&/g, "&amp;")
//         .replace(/</g, "&lt;")
//         .replace(/>/g, "&gt;")
//         .replace(/"/g, "&quot;")
//         .replace(/'/g, "&#039;");
// }
// function escapeHTML(strings, ...values) {//タグ関数、＠でテンプレートリテラルにタグ付けしてくれる
//     return strings.reduce((result, str, i) => {
//         const value = values[i - 1];
//         if (typeof value === "string") {
//             return result + escapeSpecialChars(value) + str;
//         } else {
//             return result + String(value) + str;
//         }
//     });
// }

// // Promise チェーンを使う、予知見やすくなり、エラーハンドリングもよい
// function main() {
//     fetchUserInfo("js-primer-example")
//         // ここではJSONオブジェクトで解決されるPromise
//         .then((userInfo) => createView(userInfo))
//         // ここではHTML文字列で解決されるPromise
//         .then((view) => displayView(view))
//         // Promiseチェーンでエラーがあった場合はキャッチされる
//         .catch((error) => {
//             console.error(`エラーが発生しました (${error})`);
//         });
// }

// function fetchUserInfo(userId) {
//     return fetch(`https://api.github.com/users/${encodeURIComponent(userId)}`)
//         .then(response => {
//             if (!response.ok) {
//                 return Promise.reject(new Error(`${response.status}: ${response.statusText}`));
//             } else {
//                 // JSONオブジェクトで解決されるPromiseを返す
//                 return response.json();
//             }
//         });
// }

// // async　functionを使うと非同期処理と同じように同期処理も記述できる
// async function main() {
//     try {
//         const userInfo = await fetchUserInfo("js-primer-example");
//         const view = createView(userInfo);
//         displayView(view);
//     } catch (error) {
//         console.error(`エラーが発生しました (${error})`);
//     }
// }


// ユーザーIDを変更できるようにする
async function main() {
    try {
        const userId = getUserId();
        const userInfo = await fetchUserInfo(userId);
        const view = createView(userInfo);
        displayView(view);
    } catch (error) {
        console.error(`エラーが発生しました (${error})`);
    }
}

function fetchUserInfo(userId) {
    return fetch(`https://api.github.com/users/${encodeURIComponent(userId)}`)
        .then(response => {
            if (!response.ok) {
                return Promise.reject(new Error(`${response.status}: ${response.statusText}`));
            } else {
                return response.json();
            }
        });
}

function getUserId() {
    return document.getElementById("userId").value;
}

function createView(userInfo) {
    return escapeHTML`
    <h4>${userInfo.name} (@${userInfo.login})</h4>
    <img src="${userInfo.avatar_url}" alt="${userInfo.login}" height="100">
    <dl>
        <dt>Location</dt>
        <dd>${userInfo.location}</dd>
        <dt>Repositories</dt>
        <dd>${userInfo.public_repos}</dd>
    </dl>
    `;
}

function displayView(view) {
    const result = document.getElementById("result");
    result.innerHTML = view;
}

function escapeSpecialChars(str) {
    return str
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

function escapeHTML(strings, ...values) {
    return strings.reduce((result, str, i) => {
        const value = values[i - 1];
        if (typeof value === "string") {
            return result + escapeSpecialChars(value) + str;
        } else {
            return result + String(value) + str;
        }
    });
}