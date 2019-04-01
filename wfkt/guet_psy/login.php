<?php
    header("Content-Type: text/html;charset=utf-8");

    if(isset($_POST["username"])&& isset($_POST["password"])){
    
     if($_POST["username"]=='root'&& $_POST["password"]=="root"){
            echo "登陆成功！";
			echo "<a href=query.php> 查看下载 </a>";
        }else{
            echo "登陆失败！";
        }
}
?>