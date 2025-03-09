<head><title>wxloj | 注册反馈</title></head><?php include "head.php";?>
<body class="jb"><div class="card7">
<div style="width: 100%; height: 2%"></div>
        <?php
            if(preg_match('/^[A-Za-z0-9_]+$/',$_POST["name"])&&preg_match('/^[A-Za-z0-9_]+$/',$_POST["password"])){
                if(!file_exists("../mor/password/".htmlspecialchars($_POST["name"]).".pw")){
                    $f=fopen("../mor/password/".htmlspecialchars($_POST["name"]).".pw","w");
                    fwrite($f,"等待管理员确认：".md5($_POST["password"]));
                    fclose($f);
                    $f=fopen("../mor/ui/".htmlspecialchars($_POST["name"]).".ini","w");
                    fwrite($f,"10");
                    fclose($f);
                    // echo "注册成功！等待管理员确认！";
                    info("Register ok!! name=".$_POST["name"]." password=".md5($_POST["password"]));
                    echo "<h2>注册成功</h2><div style=\"width: 100%; height: 15%\"></div><h3>等待管理员确认</h3><div style=\"width: 100%; height: 30%\"></div>";
                }else{
                    // echo "注册失败！";
                    info("Not register!! name=".$_POST["name"]." password=".md5($_POST["password"])." ip=".ip());
                    echo "<h2>注册失败</h2><div style=\"width: 100%; height: 15%\"></div><h3>用户名被占用</h3><div style=\"width: 100%; height: 30%\"></div>";
                }
                
            }else{
                info("Not register!! name=".$_POST["name"]." password=".md5($_POST["password"])." ip=".ip());
                    echo "<h2>注册失败</h2><div style=\"width: 100%; height: 15%\"></div><h3>只允许大小写字母,数字和下划线</h3><div style=\"width: 100%; height: 30%\"></div>";
            }
            
        ?>
        <?php
            // sleep(3);
            echo "<br>3秒后自动跳转主页面";
            Header("refresh:2;url=index.php");
        ?>
    </body>
</html> 
