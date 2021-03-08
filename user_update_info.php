<?php
include ('mysql_connection.php');
include ('session_check.php');
?>
<!doctype html>
<html lang="CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .form-group label{
            padding-left: 20px;
            padding-right: 20px;

        }
        .add_cate{
            margin-top: 100px;
        }
    </style>
</head>
<body>
<?php
include ('user_book_header.php');
?>
<h1>用户信息更新</h1>
<?php
    $sql = "select id,student_name,sex,class_name,student_p,grade,student_password from book_user where id = $_SESSION[user_id]";
    $res = mysqli_query($link_info,$sql);
    $row = mysqli_fetch_assoc($res);
?>
<div class="container-fluid">
    <div class="container">
        <form action="update_user.php" method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">用户名称</span>
                </div>
                <?php echo "<input type='text' value='$row[student_name]' name='username' class='form-control' aria-describedby='basic-addon1'>";?>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">用户性别</span>
                </div>
                <?php echo "<input type='text' value='$row[sex]' name='usersex' class='form-control' aria-describedby='basic-addon1'>";?>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">班级</span>
                </div>
                <?php echo "<input type='text' value='$row[class_name]' name='userclass' class='form-control' aria-describedby='basic-addon1'>";?>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">院系</span>
                </div>
                <?php echo "<input type='text' value='$row[student_p]' name='userp' class='form-control' aria-describedby='basic-addon1'>";?>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">年级</span>
                </div>
                <?php echo "<input type='text' value='$row[grade]' name='usergrade' class='form-control' aria-describedby='basic-addon1'>";?>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">登录密码</span>
                </div>
                <?php echo "<input type='text' value='$row[student_password]' name='userpassword' class='form-control' aria-describedby='basic-addon1'>";?>
            </div>
            <button type="submit" class="btn btn-info" style="width: 100%">更新信息</button>
        </form>
    </div>
</div>
</body>
</html>
