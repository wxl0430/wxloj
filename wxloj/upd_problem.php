<?php
    include "head.php";
    if(!islogin()) Header("Location:dl.php");
    else if(!isadmin()) Header("Location:problem.php?id=".strval($_GET["id"]));
?>
<head><title>wxloj | 修改题目</title></head>
<body class="jb">
    <form action="upr.php" method="post">
        <div class="card3">
            <!-- <div style="width: 100%; height: 2%"></div> -->
            <!-- <div style="width: 100%; height: 10%"> -->
                <h2 style="text-align: left;">修改题目</h2>
            <!-- </div>  -->
            <!-- <div style="width: 100%; height: 12%"></div>
            <div style="width: 100%; height: 10%">
                账号：
                <input style="width: 80%; height: 100%" type="text" placeholder="" name="name"><br>
            </div>
            <div style="width: 100%; height: 5%"></div>
            <div style="width: 100%; height: 10%">
                密码：
                <input style="width: 80%; height: 100%" type="password" placeholder="" name="password"><br>
            </div>
            <div style="width: 100%; height: 5%;"></div>
            <div style="width: 100%; height: 10%">
                有效期：
            </div>
            <div style="width: 100%; height: 5%;"></div> -->
            <div class="zj1"> <input type="submit" class="ebutton" value="登录"></div>
        </div>
    </form>
</body>