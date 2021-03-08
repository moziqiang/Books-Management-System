<?php
include ('mysql_connection.php');
include ('session_check.php');
$username = $_POST['username'];
$sex = $_POST['usersex'];
$userclass = $_POST['userclass'];
$userp = $_POST['userp'];
$usergrade = $_POST['usergrade'];
$userpassword = $_POST['userpassword'];

//echo $_SESSION['user_id'];
$sql = "update book_user set student_name = '$username',student_password = '$userpassword',student_p = '$userp',class_name = '$userclass',grade = '$usergrade',sex = '$sex' where id = $_SESSION[user_id]";
$res = mysqli_query($link_info,$sql);
if ($res){
    echo "<script>alert('更新成功!');history.go(-1);</script>";
}else{
    echo "<script>alert('更新失败!');history.go(-1);</script>";
}