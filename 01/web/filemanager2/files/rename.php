<?php
/**
 * Created by PhpStorm.
 * User: phithon
 * Date: 15/10/14
 * Time: 下午9:39
 */

require_once "common.inc.php";

if (isset($req['oldname']) && isset($req['newname'])) {
	$result = $db->query("select * from `file` where `filename`='{$req['oldname']}'");
	if ($result->num_rows > 0) {
		$result = $result->fetch_assoc();
	} else {
		exit("old file doesn't exists!");
	}

	if ($result) {

		$req['newname'] = basename($req['newname']);
		$re = $db->query("update `file` set `filename`='{$req['newname']}', `oldname`='{$result['filename']}' where `fid`={$result['fid']}");
		if (!$re) {
			print_r($db->error);
			exit;
		}
		$oldname = UPLOAD_DIR . $result["filename"] . $result["extension"];
		$newname = UPLOAD_DIR . $req["newname"] . $result["extension"];
		if (file_exists($oldname)) {
			rename($oldname, $newname);
		}
		$url = "/" . $newname;
		echo "Your file is rename, url:
                <a href=\"{$url}\" target='_blank'>{$url}</a><br/>
                <a href=\"/\">go back</a>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>文件修改</title>
    <base href="/">
    <meta charset="utf-8" />
</head>
<h3>重命名文件</h3>
<body style="background-color: lightblue;">
    <p>
        <span>旧文件名(包括后缀名)：</span>
        <input type="text">
    </p>
    <p>
        <span>新文件名(包括后缀名)：</span>
        <input type="text">
    </p>
    <p>
        <input type="submit" value="修改文件名">
    </p>
<form method="post">
    <p>
        <span>旧文件名(不包括后缀名)：</span>
        <input type="text" name="oldname">
    </p>
    <p>
        <span>新文件名(不包括后缀名)：</span>
        <input type="text" name="newname">
    </p>
    <p>
        <input type="submit" value="修改文件名">
    </p>
</form>
</body>
</html>
