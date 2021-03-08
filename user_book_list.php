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
        <form action="user_book_search_result.php" method="post">
            <input type="search" name="bookname" placeholder="输入书籍名称">
            <button type="submit" class="btn btn-light">搜索</button>
        </form>
    </div>
    <?php
    include ('user_book_header.php');
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
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = 'SELECT book_id,book_name,book_author,book_chuban,book_code,book_Introduction,book_price,book_status FROM book_info';
            $result = mysqli_query($link_info,$sql);
            foreach ($result as $row){
                echo "<tr>";
//                echo $row['bstatus'];
                echo "<td>{$row['book_id']}</td>";
                echo "<td>{$row['book_name']}</td>";
                echo "<td>{$row['book_author']}</td>";
                echo "<td>{$row['book_chuban']}</td>";
                echo "<td>{$row['book_code']}</td>";
                echo "<td>{$row['book_Introduction']}</td>";
                echo "<td>{$row['book_price']}</td>";
                if($row['book_status']==0) echo "<td><a href='user_borrow_deal.php?id=$row[book_id]'>可借阅</a></td>"; else if($row['book_status']==1) echo "<td>已借出</td>";else  echo "<td>无状态信息</td>";
//                echo "<td><a href='admin_book_update.php?id=$row[book_id]' value='$row[book_id]'>编辑</a></td>";
//                echo "<td><a href='admin_book_delete.php?id=$row[book_id]' value='$row[book_id]'>删除</a></td>";
//                if($row['bstatus']==0) echo "<td><a href='#'>借出</a></td>"; else if($row['bstatus']==1) echo "<td><a href='#'>归还</a></td>";else  echo "<td>暂无操作</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    </body>
    </html>
<?php
