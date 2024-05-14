<html>

<head>
    <meta charset="UTF-8">
    <title>随随便便完成</title>
    <style>
        .input-container {
            display: flex;
            flex-direction: column;
	    align-items: center;
        }
	input[type="text"] {
            width: 200px;
        }
    </style>
</head>

<body>
<div class="input-container">
<h1>华光学生注册系统</h1>
</div>
<!-- sqlmap是没有灵魂的 -->
<form method="get">
<div class="input-container">
    用户名: <input type="text" name="inject">
    学号：<input type="text" name="input1">
    密码：<input type="text" name="input1">
    确认密码：<input type="text" name="input1">
    <input type="submit" value="注册">
</div>

</form>

<pre>
<?php
function waf1($inject) {
    preg_match("/select|update|delete|drop|insert|where|\./i",$inject) && die('return preg_match("/select|update|delete|drop|insert|where|\./i",$inject);');
}

function waf2($inject) {
    strstr($inject, "set") && strstr($inject, "prepare") && die('strstr($inject, "set") && strstr($inject, "prepare")');
}

if(isset($_GET['inject'])) {
    $id = $_GET['inject'];
    waf1($id);
    waf2($id);
    $mysqli = new mysqli("127.0.0.1","root","root","supersqli");
    //多条sql语句
    $sql = "select * from `words` where id = '$id';";

    $res = $mysqli->multi_query($sql);

    if ($res){//使用multi_query()执行一条或多条sql语句
      do{
        if ($rs = $mysqli->store_result()){//store_result()方法获取第一条sql语句查询结果
          while ($row = $rs->fetch_row()){
            var_dump($row);
            echo "<br>";
          }
          $rs->Close(); //关闭结果集
          if ($mysqli->more_results()){  //判断是否还有更多结果集
            echo "<hr>";
          }
        }
      }while($mysqli->next_result()); //next_result()方法获取下一结果集，返回bool值
    } else {
      echo "error ".$mysqli->errno." : ".$mysqli->error;
    }
    $mysqli->close();  //关闭数据库连接
}


?>
</pre>

</body>

</html>
