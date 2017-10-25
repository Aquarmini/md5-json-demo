<?php
// +----------------------------------------------------------------------
// | demo.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------

$arr = [
    'id' => 1,
    'name' => 'limx',
    'book' => [
        'name' => '三天放弃php',
        'price' => 88,
        'author' => 'limx',
        'desc' => '中文',
        'text' => null,
    ],
    'text' => null,
];

function ksort_recursive(&$arr)
{
    ksort($arr);
    foreach ($arr as $key => $item) {
        if ($item === null) {
            unset($arr[$key]);
        } else if (is_array($arr[$key])) {
            ksort_recursive($arr[$key]);
        }
    }
}


ksort_recursive($arr);

$json = json_encode($arr, JSON_UNESCAPED_UNICODE);
$token = md5(md5($json) . 'helloworld');
print_r($json);
echo PHP_EOL;
echo $token;
echo PHP_EOL;