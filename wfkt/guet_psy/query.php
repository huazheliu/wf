<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>微风心理数据台</title>
    <?php

    header("Content-type:text/html;charset=utf-8");

    session_start();

    $name = $_SESSION['username'];

    if ($name) {

        echo "<script>

     alert(\"尊敬的$name ,欢迎回来！！\");

</script>";

    }else{

        echo "<script>

    alert('您还尚未登录！请返回登录~~')

</script>";

        echo "<a href='query.php'>如果跳转失败请点击跳转~~</a>";

        header("Refresh:1;url=login/login.html");

    }

        //分页函数，限制查询

        function news($pageNum, $pageSize)
        {
            $array = array();
            $coon = mysqli_connect("localhost", "root","root");
            mysqli_select_db($coon, "guet_psy");
            mysqli_set_charset($coon, "utf8");


            if ($coon->connect_error) {
                die("Connection failed: " . $coon->connect_error);
            }

            // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度

            $rs = "select * from form where id order by id DESC  limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
            $r = mysqli_query($coon, $rs);

            while ($obj = mysqli_fetch_object($r)) {
                $array[] = $obj;
            }
            mysqli_close($coon);
            return $array;
        }

        //显示总页数

        function allNews()
        {
            $coon = mysqli_connect("localhost", "root","root");
            mysqli_select_db($coon, "guet_psy");
            mysqli_set_charset($coon, "utf8");
            $rs = "select count(*) num from form"; //用以显示出总页数
            $r = mysqli_query($coon, $rs);
            $obj = mysqli_fetch_object($r);
            mysqli_close($coon);
            return $obj->num;
        }

        //全局配置,调用函数

        @$allNum = allNews();
        @$pageSize = 5; //约定没页显示几条信息
        @$pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];
        @$endPage = ceil($allNum/$pageSize); //总页数
        @$array = news($pageNum,$pageSize);

    ?>
</head>
<body style="margin:50px">

    <script language="JavaScript">
        function myrefresh()
        {
        window.location.reload();
        }
//        setTimeout('myrefresh()',10000); //指定1秒刷新一次
    </script>
    <div  align="center">
        <p style="font-size: 22px">桂电心协预约统计情况表</p>
        <table border="1" style="text-align: center" cellpadding="0" cellspacing="0" valign="center">
               <tr>
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

//                $conn=mysqli_connect("localhost","root","root","guet_psy");
//
//                if ($conn->connect_error) {
//                    die("Connection failed: " . $conn->connect_error);
//                }
//
//                $sql = "SELECT * FROM form";
//
//                $result = $conn->query($sql);

//                 while($row = $result->fetch_assoc())   //返回查询结果到数组
//                 {
//                     echo "<tr><td>{$row["name"]}</td><td>{$row["sex"]}</td><td>{$row["num"]}</td><td>{$row["conn"]}</td><td>{$row["degree"]}</td><td>{$row["evaluation"]}</td></tr>";
//                  }

                //mysqli_free_result($result1);
                foreach ($array as $key=>$value){
                    echo "<tr>";
                    echo "<td>{$value->name}</td>";
                    echo "<td>{$value->sex}</td>";
					echo "<td>{$value->age}</td>";
					echo "<td>{$value->qq}</td>";
                    echo "<td>{$value->num}</td>";
					echo "<td>{$value->colloge}</td>";
					echo "<td>{$value->address}</td>";
                    echo "<td>{$value->consn}</td>";
					echo "<td>{$value->emconsn}</td>";
					echo "<td>{$value->medium}</td>";
					echo "<td>{$value->self}</td>";
					echo "<td>{$value->degree}</td>";
					echo "<td>{$value->consult}</td>";
					echo "<td>{$value->meidicinal}</td>";
					echo "<td>{$value->want}</td>";
					echo "<td>{$value->avoids}</td>";
					echo "<td>{$value->place}</td>";
					echo "<td>{$value->time}</td>";
					echo "<td>{$value->aim}</td>";
					echo "<td>{$value->evaluation}</td>";
					echo "<td>{$value->date}</td>";
					echo "<td>{$value->times}</td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <br>
        <a href="?pageNum=1">首页</a>
        <a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">上一页</a>
        <a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>">下一页</a>
        <a href="?pageNum=<?php echo $endPage?>">尾页</a>
        <?php
        echo "第".$pageNum."页，共".$endPage."页";
        ?>
        <a href=PHPExcel/export.php> 下载 </a>
        <a href=chaxun.php> 查询 </a>
        <p style="font-size: 22px">桂林电子科技大学2017年度心理预约柱状统计图</p>
    </div>

    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="height:400px" >
        <!-- ECharts单文件引入 -->
        <!--<script src="echarts-all.js"></script>-->
        <!--<script src="incubator-echarts/build/dist/echarts.js">-->
        <script src="http://echarts.baidu.com/build/dist/echarts-all.js"></script>


        <script type="text/javascript">
            // 基于准备好的dom，初始化echarts图表
            var myChart = echarts.init(document.getElementById('main'));

            var option = {

                grid:{
                    show:false,
                    width:'90%',

                },

                title:{
                    text:'桂林电子科技大学2017年度心理预约柱状统计图',
                },

                toolbox: {
                    show : true,
                    feature : {
                        mark : {show: true},
                        restore : {show: true},
                        saveAsImage : {
                            show: true,
                            pixelRatio: 1,
                            title : '保存为图片',
                            type : 'png',
                            lang : ['点击保存']
                        }
                    }
                },

                tooltip: {
                    show: true
                },
                legend: {
                    data:['预约量']
                },
                xAxis : [
                    {
                        name:'月份',
                        show: true,
                        type : 'category',
                        data : ["一月","二月","三月","四月","五月","六月","六月","七月","八月","九月","十月","十一月","十二月"]
                    }
                ],
                yAxis : [
                    {
                        name:'预约量',
                        show:true,
                        type : 'value'
                    }
                ],
                series : [
                    {
                        "name":"预约量",
                        "type":"bar",
                        "data":[11, 20, 32, 10, 10, 20,10,15,13,12,18,38,35]
                    }
                ]
            };

            // 为echarts对象加载数据
            myChart.setOption(option);

            // //实现窗口自适应
            // window.onresize = function(){
            //     myChart.resize();
        </script>

    </div>
    </body>
</html>