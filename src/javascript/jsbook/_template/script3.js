'use strict';
// function sampleResolve(value) {
//     return new Promise(resolve => {
//         setTimeout(() => {
//             resolve(value);
//         }, 2000);
//     })
// }
// function sampleResolve2(value) {
//     return new Promise(resolve => {
//         setTimeout(() => {
//             resolve(value*2);
//         }, 1000);
//     })
// }
// async function sample() {
//     const [a, b] = await Promise.all([sampleResolve(5), sampleResolve(10)]);
//     const c = await sampleResolve2(b);
//     return [a, b, c];
// }
// sample().then(([a, b, c]) => {
//     console.log(a, b, c);
// });

function sampleResolve(value) {
    return new Promise(resolve => {
        setTimeout(() => {
            resolve(value);
        }, 2000);
    })
}
async function sample() {
    const array = [5, 10, 15];
    const promiseAll = await Promise.all(array.map(async (value) => {
        return await sampleResolve(value) * 2;
    }));
    return promiseAll;
}
sample().then(([a, b, c]) => {
    console.log(a, b, c);
})

function throwError() {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            try {
                throw new Error('エラーあり');
                resolve('エラーなし');
            } catch (err) {
                reject(err);
            }
        }, 1000);
    });
}
async function errorHandling() {
    try {
        const result = await throwError();
        return result;
    } catch (err) {
        throw err;
    }
}
errorHandling().catch((err) => {
    console.log(err);
})