<?php
/**
 * Created by PhpStorm.
 * User: phithon
 * Date: 15/10/14
 * Time: 下午7:46
 */

?>

<!DOCTYPE html>
<html>
<head>
    <title>信息安全作业上传系统</title>
    <base href="./">
    <meta charset="utf-8" />
</head>
<body style="background-color: lightblue;">
    <h3>信息安全作业上传系统</h3>

    <form action="./upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="upfile">
        <input type="submit" value="上传作业">
    </form>

    <ul style="list-style: none;">
        <li><a href="./delete.php">删除作业文件</a></li>
        <li><a href="./rename.php">重新命名作业文件</a></li>
    </ul>

</body>
</html>
