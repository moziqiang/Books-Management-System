<?php
include ('mysql_connection.php');
$bid = $_GET['id'];
$returnsql = "UPDATE book_info,book_borrow SET book_status = 0,rtime = NOW() WHERE book_info.book_id = book_borrow.bid AND book_info.book_id = '$bid'";
//echo $returnsql;
$res = mysqli_query($link_info,$returnsql);
if ($res){
    echo "<script>alert('归还成功!');window.location='my_borrow.php';</script>";
}else{
    echo "<script>alert('归还失败!');window.location='my_borrow.php';</script>";
}