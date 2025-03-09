<html>
<head><title>这只是一个用于提交的php</title></head><?php include "head.php";?>
    <body class="jb">
    <?php
        // function chk($content)
        // { //定义处理违法关键字的方法
        //     $keyword = array('<','>','script'); //定义敏感词
        //     $m = 0;
        //     for ($i = 0; $i < count($keyword); $i++) { //根据数组元素数量执行for循环
        //         //应用substr_count检测文章的标题和内容中是否包含敏感词
        //         if (substr_count($content, $keyword[$i]) > 0) {
        //             $m++;
        //         }
        //     }
        
        //     return $m; //返回变量值，根据变量值判断是否存在敏感词
        // }
        if($_COOKIE["login"]=="yes"){
        $ti=time();
        $user=$_COOKIE["user_name"];
        //if(chk($_POST["code"])+chk($_GET["id"])+chk($_POST["us"])==0){
        if(file_exists("../mor/password/".$user.".pw"))
            $f=fopen("../mor/password/".$user.".pw","r");{
            if(filesize("../mor/password/".$user.".pw")==0) $res="";
            else $res = fread($f,filesize("../mor/password/".$user.".pw"));
            if($res==$_COOKIE["user_password"]){
                $f=fopen("../mor/cpp/".$ti.".cpp","w");
                fwrite($f,htmlspecialchars($_POST["code"]));
                fclose($f);
                $f=fopen("../mor/cpp/".$ti.".ini","w");
                fwrite($f,htmlspecialchars(($_GET["id"])));
                fclose($f);
                $f=fopen("../mor/je/".$ti.".txt","w");
                fwrite($f,"$user\nwaiting");
                fclose($f);
            }

        }}
        info("Submit an answer!!"." ip=".ip());
        
            Header("Location: je.php");

        ?>
    </body>
</html>