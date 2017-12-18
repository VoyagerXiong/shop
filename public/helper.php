<?php
/**
 * Created by PhpStorm.
 * User: Aubrey.Xiong
 * Date: 2017/11/29
 * Time: 11:49
 */

define('IS_POST', $_SERVER['REQUEST_METHOD'] == 'POST' ? TRUE : FALSE);
if (!function_exists('p')) {
    function p($var)
    {
        echo '<pre style="background:#ccc;padding: 10px;border-radius: 4px">';
            if(is_bool($var)||is_null($var)){
                var_dump($var);
            }else{
                print_r($var);
            }
        echo '</pre>';
    }
}