<?php
include ('mysql_connection.php');
$bookname = $_POST['bookname'];
$authorname = $_POST['authorname'];
$chubanname = $_POST['chubanname'];
$bookcode = $_POST['bookcode'];
$bookintroduct = $_POST['bookintroduct'];
$bookprice = $_POST['bookprice'];
$id_list = $_POST['cate_id'];

//暂时不做判断传值是否为空

if(empty($id_list)){
    echo "<script>alert('所选分类不能为空!');window.location='admin_book_add.php';</script>";
    exit();
}
$sqlbookadd = "insert into book_info(book_name,book_Introduction,book_price,book_code,book_chuban,book_author) value ('$bookname','$bookintroduct','$bookprice','$bookcode','$chubanname','$authorname')";

$sqlinsert_res = mysqli_query($link_info,$sqlbookadd);
$bookid = mysqli_insert_id($link_info);
if ($sqlinsert_res){
    foreach ($id_list as $cate_id){

//        echo "insert into book_info_cate(book_id,cate_id) value ('$bookid','$cate_id')";
        $catesql = "insert into book_info_cate(book_id,cate_id) value ('$bookid','$cate_id')";
        $res = mysqli_query($link_info,$catesql);
        if ($res){
            echo "<script>alert('添加成功!');window.location='admin_book_add.php';</script>";
        }
    }
}else{
    echo "<script>alert('添加失败!');window.location='admin_book_add.php';</script>";
}
