<?php
$a = setcookie('user','0',time()+300);
if($_POST['hao']=='zezezi'){
    if ($_POST['pwd']=="123456"){
        if ($_COOKIE['user']==0){
            echo 'user=0，请用管理员身份访问';
        }elseif ($_COOKIE['user']==1){
            echo 'flag{test}';
        }
    }else{
    echo '密码错误';
    }
}else{
    echo '账号错啦';
}

