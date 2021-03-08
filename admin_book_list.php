<?php
include ('session_check.php');
include ('mysql_connection.php');
?>
<!doctype html>
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
    <h1>全部书籍</h1>
    <form action="admin_book_search_result.php" method="post">
        <input type="search" name="bookname" placeholder="输入书籍名称">
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
            <th scope="col">书名</th>
            <th scope="col">作者</th>
            <th scope="col">出版社</th>
            <th scope="col">code</th>
            <th scope="col">简介</th>
            <th scope="col">价格</th>
            <th scope="col">状态</th>
            <th scope="col">操作</th>
            <th scope="col">操作</th>
            <th scope="col">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
//            $sql = 'select book_info.book_id,book_name,book_author,book_price,book_code,book_statu,book_chuban,book_introduction,GROUP_CONCAT(cate_name) as c_name from book_info,book_cate,book_info_cate where book_info.book_id = book_info_cate.book_id and book_info_cate.cate_id = book_cate.cate_id GROUP BY book_info.book_id';
            $sql = 'select book_id,book_name,book_author,book_chuban,book_code,book_introduction,book_price,book_status from book_info';
            $result = mysqli_query($link_info,$sql);
        foreach ($result as $row){
            echo "<tr>";
            echo "<td>{$row['book_id']}</td>";
            echo "<td>{$row['book_name']}</td>";
            echo "<td>{$row['book_author']}</td>";
            echo "<td>{$row['book_chuban']}</td>";
            echo "<td>{$row['book_code']}</td>";
            echo "<td>{$row['book_introduction']}</td>";
            echo "<td>{$row['book_price']}</td>";
            if($row['book_status']==0) echo "<td>在馆</td>"; else if($row['book_status']==1) echo "<td>已借出</td>";else  echo "<td>无状态信息</td>";
            echo "<td><a href='admin_book_update.php?id=$row[book_id]' value='$row[book_id]'>编辑</a></td>";
            echo "<td><a href='admin_book_delete.php?id=$row[book_id]' value='$row[book_id]'>删除</a></td>";
            echo "<td><a href='#' value='$row[book_id]'>借出</a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php
