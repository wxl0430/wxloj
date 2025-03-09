<html>
<head><title>wxloj | 客观题题目列表</title></head><?php include "head.php";?>
    
<body class="jb">
<div height="300" width="100" class="card5"><table class="table table-bordered table-hover table-striped table-text-center"><thead><tr><th style="width: 10%;text-align: center;">ID</th><th style="width: 80%;text-align: center;">题单名称</th><th style="width: 10%;text-align: center;">题目数</th></tr></thead><tbody>
<?php

        define('IMAGEPATH', './obt_problems/');
        foreach(glob(IMAGEPATH . '*.{json}', GLOB_BRACE) as $filename){
            $imgs[] =  basename($filename);
        }
        foreach ($imgs as $img)
        {
            $json_string = file_get_contents("./obt_problems/$img");
            $data = json_decode($json_string, true);
            $path=substr($img,0,(strlen($img)-5));
            
            echo "<tr><td>".$data["id"]."</td><td><a href=\"obt_problem.php?id=$path\">".$data["name"]."</a></td><td>".strval(sizeof($data["problem"]))."</td></tr>";
            // echo "<div class=\"card1 x1c5\">".$data["id"]."&emsp;&emsp;<a href=\"obt_problem.php?id=$path\">".$data["name"]."</a><div style=\"display: block;text-align:right;\">".$data[""]."&emsp;</div></div><br>";
            //echo "<div id=\"que\">$res</div>";
        }
        ?>
    <!--  -->
    </div>

    </body>
</html>