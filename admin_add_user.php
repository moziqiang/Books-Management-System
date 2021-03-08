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
include ('admin_header.php');
?>
<h1>这是增加用户</h1>

<div class="container-fluid">
    <div class="container">
        <form action="admin_user_add.php" method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">用户名称</span>
                </div>
                <input type="text" name="username" class="form-control" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">用户性别</span>
                </div>
                <input type="text" name="usersex" class="form-control" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">班级</span>
                </div>
                <input type="text" name="userclass" class="form-control" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">院系</span>
                </div>
                <input type="text" name="userp" class="form-control" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">年级</span>
                </div>
                <input type="text" name="usergrade" class="form-control" aria-describedby="basic-addon1">
            </div>
            <button type="submit" class="btn btn-info" style="width: 100%">添加用户</button>
        </form>
    </div>
</div>
</body>
</html>
