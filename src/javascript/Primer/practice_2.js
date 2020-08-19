import { App } from "app.js";
const app = App();
function view() {
    const html = `
    <h2>画面追加1</h2>
    <p>ボタンを押すと画面1が追加されます</p>
    `;

    const view = document.getElementById("view");
    view.innerHTML = html;
}
function view2() {
    const html = `
    <h2>画面追加2</h2>
    <p>ボタンを押すと画面2が追加されます</p>
    `;

    const view = document.getElementById("view2");
    view.innerHTML = html;
}
