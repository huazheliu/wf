<?php
 
 header("Content-type:text/html;charset=utf-8");
 $name=$_POST['name'];
 $sex=$_POST['sex'];
 $age=$_POST['age'];
 $num=$_POST['num'];
 $qq=$_POST['qq'];
 $colloge=$_POST['colloge'];
 //$school=$_POST['school'];
 $consn=$_POST['consn'];
 $emconsn=$_POST['emconsn'];
 $degree=$_POST['degree'];
 $evaluation=$_POST['evaluation'];
 $address=$_POST['address'];
 $date=$_POST['date'];
 $medium=$_POST['medium'];
 $self=$_POST['self'];
 $consult=$_POST['consult'];
 $meidicinal=$_POST['meidicinal'];
 $want=$_POST['want'];
 $avoids=$_POST['avoids'];
 $place=$_POST['place'];
 $aim=$_POST['aim'];
 $time=$_POST['time'];
 $times=$_POST['times'];

 
if(!$name&&!$sex&&!$num&&!$consn&&!$degree&&!$evaluation){
	echo 'success!';
 }

$conn=mysqli_connect("localhost","root","root","guet_psy"); 
if (!$conn)
  {
  die('Could not connect: ' . mysqli_connect_error());
  }
else{
    echo '数据库连接成功！';
}

$sql = "INSERT INTO form (name,sex,age,num,qq,colloge,consn,emconsn,degree,evaluation,address,date,medium,self,consult,meidicinal,want,avoids,place,aim,time,times) 
VALUES ('$name','$sex','$age','$num','$qq','$colloge','$consn','$emconsn','$degree','$evaluation','$address','$date','$medium','$self','$consult','$meidicinal','$want','$avoids','$place','$aim','$time','$times')";

print_r($sql);

if ($conn->query($sql) == TRUE) {
    echo "新记录插入成功";
} else {
    echo "Error:" . $sql . "<br>" . $conn->error;
    echo '保存数据失败！';
}
 
$conn->close();