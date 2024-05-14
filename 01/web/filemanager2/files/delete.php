<?php
/**
 * Created by PhpStorm.
 * User: phithon
 * Date: 15/10/14
 * Time: 下午9:39
 */

require_once "common.inc.php";

if(isset($req['filename'])) {
    $result = $db->query("select * from `file` where `filename`='{$req['filename']}'");
    if ($result->num_rows>0){
        $result = $result->fetch_assoc();
    }

    $filename = UPLOAD_DIR . $result["filename"] . $result["extension"];
    if ($result && file_exists($filename)) {
        $db->query('delete from `file` where `fid`=' . $result["fid"]);
        unlink($filename);
        redirect("/");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>文件删除</title>
    <base href="/">
    <meta charset="utf-8" />
</head>
<h3>删除文件</h3>
<body style="background-color: lightblue;">
        <p>
            <span>文件名(不包含后缀)：</span>
            <input type="text" name="filename">
        </p>
        <p>
            <input type="submit" value="删除">
        </p>
    <form method="post">
        <p>
            <span>文件名(包含后缀)：</span>
            <input type="text" name="filename">
        </p>
        <p>
            <input type="submit" value="删除">
        </p>
    </form>
</body>
</html>
