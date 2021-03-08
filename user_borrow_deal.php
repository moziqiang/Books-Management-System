<?php
include ('session_check.php');
include ('mysql_connection.php');

$bid = $_GET['id'];
//echo $bid;

$times = date('Y-m-d H:i:s');
$borrow_sql = "insert into book_borrow (uid,bid,btime) values ($_SESSION[user_id],$bid,now())";

$res = mysqli_query($link_info,$borrow_sql);
$upinfo = mysqli_query($link_info,"update book_info set book_status = 1 where book_id = $bid");
if ($res && $upinfo){
    echo "<script>alert('借阅成功!');window.location='my_borrow.php';</script>";
}else{
    echo "<script>alert('借阅失败!');window.location='user_book_list.php';</script>";

}