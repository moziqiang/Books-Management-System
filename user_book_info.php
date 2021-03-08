<?php
include ('mysql_connection.php');
include ('session_check.php');
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
        h2{
            text-align: center;
        }
    </style>
</head>
<body>
<?php
    include ('user_book_header.php');
    $sql = "SELECT COUNT(uid) AS num FROM book_borrow WHERE uid = $_SESSION[user_id]";
    $res = mysqli_query($link_info,$sql);
    $num = mysqli_fetch_assoc($res);




?>

<h2>欢迎用户 <?php echo $_SESSION['username'];?></h2>
<h2><?php if ($num['num']==0) echo "你还未有借书"; else{echo "你当前共借了".$num['num']."本书籍";} ?></h2>
<?php
    $rsql = "SELECT COUNT(id) as num FROM book_borrow WHERE uid = $_SESSION[user_id] AND rtime is not null";
    $result = mysqli_query($link_info,$rsql);
    $rnum = mysqli_fetch_assoc($result);
?>
<h2><?php if ($rnum['num']==0) echo "还没有归还书籍记录"; else{echo "你当前共还了".$rnum['num']."本书籍";} ?></h2>

</body>
</html>
