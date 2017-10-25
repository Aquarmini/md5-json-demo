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
        'price' => 88,
        'author' => 'limx',
    ]
];

function ksort_recursive(&$arr)
{
    ksort($arr);
    foreach ($arr as $key => $item) {
        if (is_array($arr[$key])) {
            ksort_recursive($arr[$key]);
        }
    }
}


ksort_recursive($arr);

$token = md5(md5(json_encode($arr)) . 'helloworld');
echo $token;