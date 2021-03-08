<?php
session_start();
if(isset($_SESSION['rootname'])){
    session_unset();  // 释放当前在内存中已经创建的所有$_SESSION变量，但是不删除session文件以及不释放对应的session id；
    session_destroy();  // 删除当前用户对应的session文件以及释放session id，内存中$_SESSION变量内容依然保留；
}
header("location:login.php"); // 重定向到登录界面