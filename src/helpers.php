<?php
// +----------------------------------------------------------------------
// | helpers.php
// +----------------------------------------------------------------------
// | Description: 
// +----------------------------------------------------------------------
// | Time: 2018/3/26 下午5:03
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

if (function_exists('jsonSend')){
    function jsonSend($url,$data)
    {
        $ch = curl_init();

        if (preg_match("#^https://#i", $url) == 1) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        }

        $header[] = "Accept:application/json;charset=utf-8;";
        $header[] = "Content-Type:application/json;charset=utf-8;";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data);
    }
}