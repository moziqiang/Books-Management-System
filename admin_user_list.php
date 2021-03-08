<?php
include ('session_check.php');
include ('mysql_connection.php');
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .seach{
            max-width: 400px;
            /*border: 1px solid red;*/
            margin: auto;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="seach">
    <h1>用户列表</h1>
    <form action="admin_book_search_result.php" method="post">
        <input type="search" name="bookname" placeholder="输入用户名称">
        <button type="submit" class="btn btn-light">搜索</button>
    </form>
</div>
<?php
include ('admin_header.php');
?>
<div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">用户名</th>
            <th scope="col">班级</th>
            <th scope="col">年级</th>
            <th scope="col">院系</th>
            <th scope="col">性别</th>
            <th scope="col">状态</th>
            <th scope="col">操作</th>
            <th scope="col">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "select id,student_name,student_p,class_name,grade,sex,ustatus from book_user";
        $result = mysqli_query($link_info,$sql);
        foreach ($result as $row){
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['student_name']}</td>";
            echo "<td>{$row['class_name']}</td>";
            echo "<td>{$row['grade']}</td>";
            echo "<td>{$row['student_p']}</td>";
            echo "<td>{$row['sex']}</td>";
            if($row['ustatus']==0) echo "<td>已激活</td>"; else if($row['ustatus']==1) echo "<td>未激活</td>";else  echo "<td>无状态信息</td>";
            echo "<td><a href='' value='$row[id]'>编辑</a></td>";
            echo "<td><a href='' value='$row[id]'>删除</a></td>";
            echo "</tr>";
        }
    ?>
        </tbody>
    </table>
</div>
</body>
</html>