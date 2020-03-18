<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

function user_func(): string
{
    return 'hello';
}

/**
 * 生成随机数
 */
if (!function_exists('rand_num')) {
    function rand_num($len = 4)
    {
        $chars = '1234567890';
        $string = '';
        for ($i = 0; $i < $len; $i++) {
            $rand = rand(0,strlen($chars)-1);
            $string .= substr($chars,$rand,1);
        }
        return $string;
    }
}