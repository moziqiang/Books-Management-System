<?php
include ('mysql_connection.php');

//登录检查
//var_dump($link_info);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $password = $_POST["password"];
    $id = $_POST["id"];

}else{
    echo "<script>alert('非法传参!');window.location='login.php';</script>";

}
if($id == 0){
    $usersql = "select * from book_user where student_name = "." '$name'"." and student_password = ".$password;
    echo $usersql."<br>";
    $userresult = mysqli_query($link_info,$usersql);

    echo mysqli_num_rows($userresult);
    if (mysqli_num_rows($userresult)==1 ){
        $res = mysqli_fetch_assoc($userresult);
        session_start();
        $_SESSION['username']=$name;
//        var_dump($res);
        $_SESSION['user_id'] = $res['id'];
        echo "<script>window.location='user_book_info.php'</script>";

    }else{
        echo "<script>alert('登陆失败,请检查账号密码!');window.location='login.php';</script>";
    }
}else if($id == 1){
    $rootsql = "select * from book_admin where name = "." '$name'"." and password = ".$password;
    $rootresult = mysqli_query($link_info,$rootsql);
    if (mysqli_num_rows($rootresult)==1 ){
        session_start();
        $_SESSION['rootname']=$name;
        echo "<script>window.location='admin_book_index.php'</script>";
    }else{
        echo "<script>alert('登陆失败,请检查账号密码!');window.location='login.php';</script>";
    }
}








