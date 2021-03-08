<?php
include ('mysql_connection.php');
$username = $_POST['username'];
$usersex = $_POST['usersex'];
$userclass = $_POST['userclass'];
$userp = $_POST['userp'];
$usergrade = $_POST['usergrade'];

$addsql = "insert into book_user(student_name,class_name,grade,sex,student_p) values ('$username','$userclass','$usergrade','$usersex','$userp')";
//echo $addsql;
$res = mysqli_query($link_info,$addsql);
if ($res){
    echo "<script>alert('添加成功!');window.location='admin_add_user.php';</script>";
    exit();
}else{
    echo "<script>alert('添加失败!');window.location='admin_add_user.php';</script>";

}


