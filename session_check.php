<?php
session_start();
//var_dump(isset($_SESSION['rootname'])); false!
if (isset($_SESSION['rootname']) || isset($_SESSION['username'])){
//    echo "管理员登陆成功!欢迎";
}else{
    echo "<script>alert('未登录');window.location='login.php';</script>";
}

?>
