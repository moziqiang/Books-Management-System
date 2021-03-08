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

    <title>图书管理系统</title>
    <style>
        .header{
            font-size: 14px;
        }
        /*body{*/
        /*    background-image: url("bg1.jpg");*/
        /*    !*background-size:100% 100%;*!*/
        /*    background-repeat: no-repeat;*/

        /*}*/
        li{
            list-style-type: none;
        }
        .contain{
            width: inherit;
        }
        .contain_body{
            max-width: 226px;
            margin: 40px auto;
            /*border: 1px solid red;*/

        }
        .cate{
            /*max-width: 1600px;*/
            /*border: 1px solid red;*/

        }
        button a{
            color: black;
            display: inline-block;
            width: 100%;
            text-decoration: none;
        }
        button a:hover{text-decoration:none}
        .cate_list{
            max-width: 1200px;
            /*border: 1px solid rebeccapurple;*/

        }
        .cate_list button{
            width: 33%;
            margin-top: 10px;
            /*background-color: black;*/
        }
    </style>
</head>
<body>
<?php
include ('admin_header.php');
?>
    <div class="contain">
        <div class="contain_body">
            <?php
                $sql = "select count(*) as num from book_info";
                $res = mysqli_query($link_info,$sql);
                $result=mysqli_fetch_array($res);
                echo"<h1>当前藏书".$result["num"]."本</h1>";
            ?>

            <?php
                $sql = "select count(*) as user from book_user";
                $res = mysqli_query($link_info,$sql);
                $result=mysqli_fetch_array($res);
                echo"<h1>当前用户".$result["user"]."人</h1>";
            ?>
        </div>
    </div>
    <div class="cate">
        <div class="container-fluid cate_list">
            <h2>图书类别</h2>
            <?php
                $sql = "SELECT cate_name,COUNT(cate_name) AS num FROM book_cate,book_info_cate WHERE book_cate.cate_id = book_info_cate.cate_id GROUP BY cate_name";
                $res = mysqli_query($link_info,$sql);
                foreach ($res as $row){
//                    echo $row['cate_name'];
                    echo "<button style='background-color: lawngreen' type='button' class='btn btn-primary'>";
                echo "<a href='admin_cate_info.php?name=$row[cate_name]'>";
                        echo $row['cate_name'];
                    echo "<span class='badge badge-light'>$row[num]</span>";
                    echo "<span class='sr-only'>unread messages</span>";
                echo "</a>";
            echo "</button>";
                }
            ?>
        </div>
    </div>
</body>
</html>

