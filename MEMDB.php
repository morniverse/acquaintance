<?php

/**
 * Created by PhpStorm.
 * User: baoxucy
 * Date: 10/10/16
 * Time: 3:14 PM
 */
class MEMDB {
    var $servername = 'localhost';
    var $port = 6379;
    var $conn = NULL;

    var $global_access_token_key = "global_access_token";
    var $global_access_token_value = "";
    var $global_access_token_expire_key = "global_access_token_expire";
    var $global_access_token_expire_value = "";

    function setServerName($par){
        $this->servername = $par;
    }

    function getServerName(){
        return $this->servername;
    }


    function REDIS_Initialize()
    {
        //Create connection
        $this->conn = new Redis();
        $this->conn->connect($this->servername, $this->port);
    }

    function getConn(){
        return $this->conn;
    }

    function setGlobalAccessToken($par){
        $this->global_access_token_value = $par;
    }

    function getGlobalAccessToken(){
        return $this->global_access_token_value;
    }

    function getGlobalAccessTokenKey(){
        return $this->global_access_token_key;
    }

    function setGlobalAccessTokenExpire($par){
        $this->global_access_token_expire_value = $par;
    }

    function getGlobalAccessTokenExpire(){
        return $this->global_access_token_expire_value;
    }

    function getGlobalAccessTokenExpireKey(){
        return $this->global_access_token_expire_key;
    }
}