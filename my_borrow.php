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
            <th scope="col">借阅时间</th>
            <th scope="col">价格</th>
            <th scope="col">操作</th>

        </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT book_id,book_price,book_name,book_chuban,book_author,btime,rtime FROM book_info,book_borrow,book_user WHERE book_info.book_id = book_borrow.bid AND book_user.id = book_borrow.uid AND book_borrow.uid = $_SESSION[user_id] AND rtime is NULL";
            if ($sql){
                $result = mysqli_query($link_info,$sql);
                foreach ($result as $row){
//                    echo $_SESSION['user_id'];
                    echo "<tr>";
                    echo "<td>{$row['book_id']}</td>";
                    echo "<td>{$row['book_name']}</td>";
                    echo "<td>{$row['book_author']}</td>";
                    echo "<td>{$row['book_chuban']}</td>";
                    echo "<td>{$row['btime']}</td>";
                    echo "<td>{$row['book_price']}</td>";
                    echo"<td><a href='user_book_return.php?id=$row[book_id]'>归还</a></td>";
                    echo "</tr>";
                }
            }


        ?>
           </tbody>
       </table>
   </div>
   </body>
   </html>