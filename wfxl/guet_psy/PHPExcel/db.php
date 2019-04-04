<?php
    $dir=dirname(__FILE__);
    require $dir."/dbconfig.php";

    class db{
        public $conn=null;

        public function __construct($config){
           $this->conn= mysql_connect($config['host'],$config['username'],$config['password'])  //链接数据库
            or die(mysql_error());
            mysql_select_db($config['database'],$this->conn) or die(mysql_error()); //选择数据库
            mysql_query("set names ".$config['charset']) or die (mysql_error());//设定Mysql编码


        }

        /**
         * @param $sql
         * 根据传入sql语句 查询MySQL结果集
         */
        public function getResult($sql){
            $resource=mysql_query($sql,$this->conn) or die(mysql_error());
            $res=array();
            while(($row=mysql_fetch_assoc($resource))!=false){
                $res[]=$row;
            }
            return $res;
        }

        public function getData(){
            $sql="select * from form";
            $res=self::getResult($sql);
            return $res;
        }

    }
    ?>