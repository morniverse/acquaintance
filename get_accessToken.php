<?php

include 'MEMDB.php';
include "WECHAT_ACCOUNT.php";

$redis = new MEMDB();
$redis->REDIS_Initialize();

$wechat_account = new WECHAT_ACCOUNT();

$atk = $redis->getConn()->get($redis->getGlobalAccessTokenKey());
if (empty($atk)) {
    $json = getAccessToken($wechat_account->getAppId(), $wechat_account->getSecret());
    $redis->getConn()->set($redis->getGlobalAccessTokenKey(), $json->access_token);
    $redis->getConn()->set($redis->getGlobalAccessTokenExpireKey(), $json->expires_in + time());
    $atk = $json->access_token;
} else {
    $expire = $redis->getConn()->get($redis->getGlobalAccessTokenExpireKey()) + 0;
    if ($expire < time()) {
        $json = getAccessToken($wechat_account->getAppId(), $wechat_account->getSecret());
        $redis->getConn()->set($redis->getGlobalAccessTokenKey(), $json->access_token);
        $redis->getConn()->set($redis->getGlobalAccessTokenExpireKey(), $json->expires_in + time());
        $atk = $json->access_token;
    }
}

echo $atk;


function getAccessToken($appid, $appsecret)
{
    $url_get = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $appid . '&secret=' . $appsecret;
    $json = json_decode(curlGet($url_get));
    $access_token = $json->access_token;

    return $json;
}

function curlGet($url)
{
    $ch = curl_init();
    $header = "Accept-Charset: utf-8";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $temp = curl_exec($ch);
    return $temp;
}