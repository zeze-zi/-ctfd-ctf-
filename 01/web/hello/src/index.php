只能地址为172.16.1.100的ip访问

<?php
if($_SERVER['HTTP_X_FORWARDED_FOR']=='172.16.1.100'){
    echo "来自hello的浏览器才能访问";
    if($_SERVER['HTTP_USER_AGENT']=='hello' && $_SERVER['HTTP_X_FORWARDED_FOR']=='172.16.1.100'){
        echo 'flag{test}';
    }else{
    echo '黑客走开';
    }
}else{
    echo '黑客走开';
}
?>
