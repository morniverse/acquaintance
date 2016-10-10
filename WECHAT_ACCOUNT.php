<?php

/**
 * Created by PhpStorm.
 * User: baoxucy
 * Date: 10/10/16
 * Time: 3:37 PM
 */
class WECHAT_ACCOUNT
{
    var $appid = "wxa320677c2513de46";
    var $secret = "e9e8dc822b68aa04ff5120cc0036b861";
    var $aeskey = "MZgMi1WHl2wUBheo2HgPK2SAwFyTcfwNu4CZutJ8ABQ";

    function getAppId(){
        return $this->appid;
    }

    function getSecret(){
        return $this->secret;
    }

    function getAESKey(){
        return $this->aeskey;
    }
}