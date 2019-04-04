<?php

header("Content-type:text/html;charset=utf-8");

$dbName = 'guet_psy';

$host = 'localhost';

$user = 'root';

$password = 'root';



$dsn = "mysql:host=$host;dbname=$dbName";

try{

    $pdo = new PDO($dsn, $user, $password);

    echo '数据库连接成功!';

}catch(Exception $e){

    echo $e->getMessage();

}


$sql="select * from user";

$result=$pdo->query($sql);

$arr=$result->fetch();




//function sql($table, $field = '*', $where = '')
//
//{
//
//    global $pdoo;
//
//    $sql = 'select' . ' ' . $field . ' ' . 'from' . ' ' . $table . ' where ' . $where;
//
//    var_dump($sql);
//
//    //$data = $pdo->query($sql)->fetch();
//
//    var_dump($pdoo->query($sql));
//
//    var_dump($pdoo->query($sql)->fetch());
//
//    return $pdoo->query($sql)->fetch();
//
//}