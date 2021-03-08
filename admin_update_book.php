<?php

include('mysql_connection.php');
$bookid = $_POST['bid'];
$bookname = $_POST['bookname'];
$authorname = $_POST['authorname'];
$chubanname = $_POST['chubanname'];
$bookcode = $_POST['bookcode'];
$bookintroduct = $_POST['bookintroduct'];
$bookprice = $_POST['bookprice'];
$id_list = $_POST['cate_id'];

//暂时不做判断传值是否为空


if(empty($id_list)){
    echo "<script>alert('所选分类不能为空!');window.location='admin_book_update.php';</script>";
    exit();
}
//$sqlbookadd = "insert into book_info(book_name,book_Introduction,book_price,book_code,book_chuban,book_author) value ('$bookname','$bookintroduct','$bookprice','$bookcode','$chubanname','$authorname')";

$sqlupdate = "update book_info set book_name='$bookname',book_Introduction = '$bookintroduct',book_price='$bookprice',book_code='$bookcode',book_chuban='$chubanname',book_author='$authorname'where book_id = '$bookid'";

$book_info = mysqli_query($link_info,$sqlupdate);



// 更新书本分类步骤(此方法很蠢
// 第一步先获取后台传来的bid（书本id，
// 第二步根据此id先删除关联表记录
// 第三步获取传来的cate_id（此cate_id为一个列表，用于记录一篇文章记录的标签，标签可以有多个
// 第四步重新插入关联表！(能力有限，才出此下策
$delinfo = "delete from book_info_cate where book_id = '$bookid'";
$delres = mysqli_query($link_info,$delinfo);
if ($delinfo){
    foreach ($id_list as $cate_id){
//        $bookid = mysqli_insert_id($link_info);
//        echo "insert into book_info_cate(book_id,cate_id) value ('$bookid','$cate_id')";
        $catesql = "insert into book_info_cate(book_id,cate_id) value ('$bookid','$cate_id')";
        $res = mysqli_query($link_info,$catesql);
    }
    if ($res){
        echo "<script>alert('更新成功!');history.go(-1);</script>";
    }
}




