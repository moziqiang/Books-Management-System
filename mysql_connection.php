<?php
header("Content-type:text/html;charset=utf-8");


//此处配置数据库连接信息
$hostname = 'localhost';
$user = 'root';
$password = '';
$databasename = 'book_management';
$port = '3306';



//连接数据库

$link_info = mysqli_connect($hostname,$user,$password,$databasename,$port)

OR DIE ('Could not to connect to Mysql:'.mysqli_connect_error());
//var_dump($link_info);

//设置数据库字符集

$link_info->query("set names utf8");
