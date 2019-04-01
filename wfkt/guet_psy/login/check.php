<?php

header("Content-type:text/html;charset=utf-8");

session_start();

//include "db.php";

$dbName = 'guet_psy';

$host = '127.0.0.1';

$user = 'root';

$password = 'root';



$dsn = "mysql:host=$host;dbname=$dbName";

try{

    $pdo = new PDO($dsn, $user, $password);


}catch(Exception $e){

    echo $e->getMessage();

}


$sql="select * from user";

$result=$pdo->query($sql);

$arr=$result->fetch();

@$name = $_POST['username'];

@$pas = $_POST['password'];



//$row = sql('user', '*', "username = '$name'");

if (!$arr['name']) {

    return "用户名不存在！请检查用户名~~";

}



if ($arr['password'] == $pas) {

    $_SESSION['username'] = "$name";

    echo "<script>alert('登录成功！正在跳转...')</script>";

    echo "<a href='../query.php'>如果跳转失败请点击跳转~~</a>";

    header("Refresh:1;url=../query.php");

}else{

    echo "<script>alert('密码错误！请重新登陆...')</script>";

    echo "<a href='login.html'>正跳转回登陆页面...</a>";

    header("Refresh:1;url=login.html");

}