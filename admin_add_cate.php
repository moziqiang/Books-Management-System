<?php
//header("Content-Type:text/html;charset=GB2312");
include ('mysql_connection.php');
$catename = $_POST['cate'];
//echo $catename;
//return $catename;
$addcatesql = "insert into book_cate(cate_name)value('$catename')";
$result = mysqli_query($link_info,$addcatesql);
if ($result){
    //使用mysqli_insert_id 返回插入后自增id
    $id = mysqli_insert_id($link_info);
    //使用urlencode()转码！目的为了使返回的前端能够正常显示！
    $data = array("id"=>$id,"name"=>urlencode($catename));
    echo urldecode(json_encode($data));
//    echo "<script>alert('添加成功!');window.location='admin_book_add.php';</script>";
}else{
    echo "<script>alert('添加失败!');window.location='admin_book_add.php';</script>";
}

