<html>
<head><title>wxloj | 提交记录</title></head><?php include "head.php";?>
    <body class="jb">
    
    <div id="32" height="300" width="100" class="card5 x8">
    <table class="table table-bordered table-hover table-striped table-text-center"><thead><tr><th style="width: 5%;text-align: center;">ID</th><th style="width: 25%;text-align: center;">题目</th><th style="width: 10%;text-align: center;">提交者</th><th style="width: 15%;text-align: center;">状态</th><th style="width: 15%;text-align: center;">分数</th><th style="width: 20%;text-align: center;">提交时间</th><th></th></tr></thead><tbody>
    <?php
        define('IMAGEPATH', '../mor/je/');
        foreach(glob(IMAGEPATH . '*.{txt}', GLOB_BRACE) as $filename){
            $imgs[] =  basename($filename);
        }
        if($imgs!=[]){
        $i=sizeof($imgs)+1;
        $imgs=array_reverse($imgs);
        foreach ($imgs as $img)
        {
            $i-=1;
            $res1 = fopen("../mor/je/$img", "r");
            $res = fread($res1,filesize("../mor/je/$img"));
            $ae = explode("\n",$res);//ae是结果
            $path=substr($img,0,(strlen($img)-4));
            if(file_exists("../mor/okcpp/$path.ini")){
                $res1 = fopen("../mor/okcpp/$path.ini", "r");
                $res = fread($res1,filesize("../mor/okcpp/$path.ini"));
            }else{
                $res1 = fopen("../mor/cpp/$path.ini", "r");
                $res = fread($res1,filesize("../mor/cpp/$path.ini"));
            }
            $ae1 = explode("\n",$res);
            $res1 = fopen("./problems/".$ae1[0].".ini", "r");
            $res = fread($res1,filesize("./problems/".$ae1[0].".ini"));
            $ae2 = explode("\n",$res);
            $path1=$ae1[0];
            //echo "<div class=\"card x1c5\">用户：".$ae[0]."&emsp;&emsp;&emsp;&emsp;状态：".$ae[1]."&emsp;&emsp;&emsp;&emsp;题目：".$ae2[0].$ae2[1]."&emsp;&emsp;&emsp;&emsp;时间戳：$path</div><br>";
            echo "<tr><td>#$i</td><td><a href=\"problem.php?id=$path1\">".$ae2[0]." ".$ae2[1]."</a></td><td><a href=\"help.php?who=".htmlspecialchars_decode($ae[0])."\">".htmlspecialchars_decode($ae[0])."</a></td><td>".$ae[1]."</td><td>".$ae[2]."</td><td><small>".date("Y-m-d H:i:s",$path)."</small></td><td><a href=\"jl.php?id=$i\">详情<a>&emsp;</td></tr>";
            //echo "<div id=\"que\">$res</div>";
        }}
    ?>
    </tbody></table>
    </div>


    </body>
</html>