<?php

/**
 * Created by PhpStorm.
 * User: baoxucy
 * Date: 9/28/16
 * Time: 5:53 PM
 */
class DataBase
{
    var $servername = 'localhost';
    var $username = 'gogogobuybuybuy';
    var $password = 'gogogobuybuybuy';
    var $dbname = 'gogogobuybuybuy';
    var $conn = NULL;

    function setServerName($par){
        $this->servername = $par;
    }

    function getServerName(){
        return $this->servername;
    }

    function setUserName($par){
        $this->username = $par;
    }

    function getUserName(){
        return $this->username;
    }

    function setPassWord($par){
        $this->password = $par;
    }

    function getPassWord(){
        return $this->password;
    }

    function setDBName($par){
        $this->dbname = $par;
    }

    function getDBName(){
        return $this->dbname;
    }

    function DB_Initialize()
    {
        //Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($this->conn->connect_error) {
            echo "fail";
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function DB_Cleanup(){
        $this->conn->close();
    }

    function getConn(){
        return $this->conn;
    }

}