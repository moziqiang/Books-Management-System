<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>后台登录</title>
    <style>
        body{
            background-image: url("background.jpeg");
            background-repeat: no-repeat;
            background-size: 100%;
            background-size:cover;/* 将背景图片等比缩放填满整个容器 */
        }
        h3{
            text-align: center;
        }
        .login{
            color: #f5f5f5;
            width: 500px;
            /*height:500px;*/
            margin: auto;
            padding-top: 300px;
        }
        .btn{
            margin-top: 50px;
            width: 100%;
        }

    </style>
</head>
<body>
<div class="login">
    <form action="login_check.php" method="post">
        <h3>后台登录</h3>
        <div class="form-group">
            <label for="name">用户名</label>
            <input type="text"class="form-control" name="name" id="name">
<!--            <small class="form-text text-muted">输入你的用户名</small>-->
        </div>
        <div class="form-group">
            <label for="password">密码</label>
            <input type="password" class="form-control" name="password" id="password">
<!--            <small class="form-text text-muted">输入你的密码</small>-->
        </div>
        <label for="name">登录身份</label>
        <select name="id" id="select" class="form-control">
            <option value="0">学生</option>
            <option value="1">管理员</option>
        </select>
        <button type="submit" class="btn btn-primary">登录</button>
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

<?php
