/**
 * Created by limx on 2017/10/25.
 */
var crypto = require('crypto');

var md5 = function (str) {
    var crypto_md5 = crypto.createHash('md5');
    crypto_md5.update(str);
    return crypto_md5.digest('hex');
}

var arr = {
    id: 1,
    name: 'limx',
    book: {
        name: '三天放弃php',
        price: 88,
        author: 'limx',
        desc: '中文',
    },
};

//排序的函数
function ksort(arys) {
    //先用Object内置类的keys方法获取要排序对象的属性名，再利用Array原型上的sort方法对获取的属性名进行排序，newkey是一个数组
    var newkey = Object.keys(arys).sort();
    //console.log('newkey='+newkey);
    var newObj = {}; //创建一个新的对象，用于存放排好序的键值对
    for (var i = 0; i < newkey.length; i++) {
        if (typeof arys[newkey[i]] === 'object' && arys[newkey[i]] !== null) {
            //遍历newkey数组
            newObj[newkey[i]] = ksort(arys[newkey[i]]);
        } else {
            newObj[newkey[i]] = arys[newkey[i]];
        }

    }
    return newObj; //返回排好序的新对象
}

arr = ksort(arr);

var json = JSON.stringify(arr);

console.log(json);

var token = md5(md5(json) + 'helloworld');

console.log(token);