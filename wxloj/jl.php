<html>
<head><title>wxloj | 提交记录</title></head><?php include "head.php";?>
    <body class="jb">
    
    <div id="32" height="300" width="100" class="card x8"></div>
    <div class="card4"><table class="table table-bordered table-hover table-striped table-text-center"><thead><tr><th>ID</th><th>题目</th><th>提交者</th><th>结果</th><th>分数</th><th>提交时间</th></tr></thead><tbody>
    <?php
        define('IMAGEPATH', '../mor/je/');
        foreach(glob(IMAGEPATH . '*.{txt}', GLOB_BRACE) as $filename){
            $imgs[] =  basename($filename);
        }
        if($imgs!=[]){
            $i=$_GET["id"];
            //$imgs=array_reverse($imgs);
            $img=$imgs[$i-1];
            $res1 = fopen("../mor/je/$img", "r");
            $res = fread($res1,filesize("../mor/je/$img"));
            $ae = explode("\n",$res);
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
            if(!file_exists("../mor/okcpp/$path.cpp")){
                $codef=fopen("../mor/cpp/$path.cpp","r");
                $code=fread($codef,filesize("../mor/cpp/$path.cpp"));
            }else{
                $codef=fopen("../mor/okcpp/$path.cpp","r");
                $code=fread($codef,filesize("../mor/okcpp/$path.cpp"));
            }
            //echo "<div class=\"card x1c5\">用户：".$ae[0]."&emsp;&emsp;&emsp;&emsp;状态：".$ae[1]."&emsp;&emsp;&emsp;&emsp;题目：".$ae2[0].$ae2[1]."&emsp;&emsp;&emsp;&emsp;时间戳：$path</div><br>";
            echo "<tr><td>#$i</td><td><a href=\"problem.php?id=$path1\">".$ae2[0]." ".$ae2[1].
            "</a></td><td><a href=\"help.php?who=".htmlspecialchars_decode($ae[0])."\">".htmlspecialchars_decode($ae[0])."</a></td><td>"
            .$ae[1]."</td><td>".$ae[2].
            "</td><td><small>".date("Y-m-d H:i:s",$path)."
            </small></td></tr></tbody></table></div><br><br>";
            $anslist=array_slice($ae,3,sizeof($ae));
            // echo sizeof($anslist);
            if(sizeof($anslist)>0){
                echo "<div class=\"card4\"><table class=\"table table-bordered table-hover table-striped table-text-center\"><thead><tr><th>测试点序号</th><th>状态</th><th>分数</th><th>时间</th><th>空间</th></tr></thead><tbody>";
                $il=0;
                foreach($anslist as $i){
                    $il++;
                    $tmp=explode(" ",$i);
                    echo "<tr><td>#$il</td><td>$tmp[0]</td><td>$tmp[1]</td><td>$tmp[2] ms</td><td>$tmp[3] $tmp[4]</td></tr>";
                }
                echo "</tbody></table></div><br><br>";
            }
            if(isadmin()||(getname()==$ae[0])){
                echo "<div class=\"card4\"><pre class=\"sh_sourceCode\"><code class=\"new_code sh_cpp language-cpp\">$code</code></pre></div>";
            }
            //echo "<div id=\"que\">$res</div>";            
            //$code=htmlspecialchars($code);
            
        }
    ?>
    </div></div>


    </body>
</html>