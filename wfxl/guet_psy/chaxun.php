<?php
header("Content-type:text/html;charset=utf-8");
$keywords=isset($_GET['keywords'])?trim($_GET['keywords']):' ';
echo "查询的关键字为：".$keywords;

$conn=mysql_connect("localhost","root","root") or die("数据库连接失败");
mysql_select_db("guet_psy",$conn);
mysql_query("set names 'utf8'");

//模糊查询

$sql="SELECT * FROM form WHERE name LIKE '{$keywords}%'";
$rs=mysql_query($sql);
$user=array();

if(!empty($keywords)&&$rs){
    while($row=mysql_fetch_assoc($rs)){
        $row['name']=str_replace($keywords,'<font color="red">'.$keywords.'</font>',$row['name']);
        $user[]=$row;
    }
}
//print_r($user);
?>


<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf8">
        <title>数据查询</title>
        <?php

    header("Content-type:text/html;charset=utf-8");

    session_start();

    $name = $_SESSION['username'];

    if (!$name) {

        echo "<script>

    alert('您还尚未登录！请返回登录~~')

</script>";

        echo "<a href='chaxun.php'>如果跳转失败请点击跳转~~</a>";

        header("Refresh:1;url=login/login.html");

    }
    ?>
    </head>
    <body>
    <form action="" method="get">
        <p><input type="text" name="keywords" value="" placeholder="请输入查询内容"></p>
        <p><input type="submit" value="查询"></p>
    </form>
    <table border="1" style="text-align: center" cellpadding="0" cellspacing="0" valign="center">
        <tr>
            <th>序号</th>
            <th>名字</th>
            <th>性别</th>
            <th>年龄</th>
            <th>QQ</th>
            <th>学号</th>
            <th>学院</th>
            <th>生源地</th>
            <th>联系方式</th>
            <th>紧急联络人电话</th>
            <th>来访媒介</th>
            <th>意愿程度</th>
            <th>紧急程度</th>
            <th>是否接受过心理咨询</th>
            <th>是否服用过精神药物</th>
            <th>想预约的咨询师</th>
            <th>想回避的咨询师</th>
            <th>预约地点</th>
            <th>方便的咨询时间</th>
            <th>来访目的</th>
            <th>自我评价</th>
            <th>填表日期</th>
            <th>填表时间</th>
        </tr>
    <?php
	header("Content-type:text/html;charset=utf-8");
    if($keywords){
        echo '<h3>查询关键词为：<font color="red">'.$keywords.'</font></h3>';
    }
    if($user){
        foreach ($user as $key=>$value){
            echo '<tr>';
            echo '<td>'.$value['id'].'</td>';
            echo '<td>'.$value['name'].'</td>';
            echo '<td>'.$value['sex'].'</td>';
            echo '<td>'.$value['age'].'</td>';
            echo '<td>'.$value['qq'].'</td>';
            echo '<td>'.$value['num'].'</td>';
            echo '<td>'.$value['colloge'].'</td>';
            echo '<td>'.$value['address'].'</td>';
            echo '<td>'.$value['consn'].'</td>';
            echo '<td>'.$value['emconsn'].'</td>';
			echo '<td>'.$value['medium'].'</td>';
			echo '<td>'.$value['self'].'</td>';
			echo '<td>'.$value['degree'].'</td>';
			echo '<td>'.$value['consult'].'</td>';
			echo '<td>'.$value['meidicinal'].'</td>';
			echo '<td>'.$value['want'].'</td>';
			echo '<td>'.$value['avoids'].'</td>';
			echo '<td>'.$value['place'].'</td>';
			echo '<td>'.$value['time'].'</td>';
			echo '<td>'.$value['aim'].'</td>';
			echo '<td>'.$value['evaluation'].'</td>';
			echo '<td>'.$value['date'].'</td>';
			echo '<td>'.$value['times'].'</td>';
            echo '</tr>';
        }
    }
    else{
        echo '没有查询到相关用户！';
    }
    ?>
    </body>
    </html>

























