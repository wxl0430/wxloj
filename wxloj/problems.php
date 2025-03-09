<html>
<head><title>wxloj | 题目列表</title></head><?php include "head.php";?>
    
<body class="jb">
    
<!-- <div class="card1 x2">题号&emsp;&emsp;&emsp;名称<div style="display: block;text-align:right;">难度&emsp;</div></div><br> -->
<div height="300" width="100" class="card5"><table class="table table-bordered table-hover table-striped table-text-center"><thead><tr><th style="width: 10%;text-align: center;">ID</th><th style="width: 80%;text-align: center;">题目名称</th><th style="width: 10%;text-align: center;">难度</th></tr></thead><tbody>
<?php

        for($i=1;$i;$i++)
        {
            $img=strval($i).".ini";
            if(!is_file("./problems/$img")) break;
            $res1 = fopen("./problems/$img", "r");
            $res = fread($res1,filesize("./problems/$img"));
            $ae = explode("\n",$res);
            $path=substr($img,0,(strlen($img)-4));
            echo "<tr><td>".$ae[0]."</td><td><a href=\"problem.php?id=$path\">".$ae[1]."</a></td><td>".$ae[2]."</td></tr>";
            // echo "<div class=\"card1 x1c5\">".$ae[0]."&emsp;&emsp;<a href=\"problem.php?id=$path\">".$ae[1]."</a><div style=\"display: block;text-align:right;\">$ae[2]&emsp;</div></div><br>";
            //echo "<div id=\"que\">$res</div>";
        }
        ?>
    <!--  -->
    <!-- </div> -->
    </div>
    </body>
</html>