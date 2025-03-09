<head><title>wxloj | 修改反馈</title></head><?php include "head.php";?>
<body class="jb"><div class="card7">
<div style="width: 100%; height: 2%"></div>
<?php
    if(file_exists("../mor/password/".htmlspecialchars($_POST["name"]).".pw")){
        $f=fopen("../mor/password/".htmlspecialchars($_POST["name"]).".pw","r");
        $n=fread($f,filesize("../mor/password/".htmlspecialchars($_POST["name"]).".pw"));
        fclose($f);
        if($n==md5($_POST["password"])){
            $f=fopen("../mor/password/".htmlspecialchars($_POST["name"]).".pw","w");
            fwrite($f,md5($_POST["password1"]));
            setcookie("login","yes",time()+3600);
            setcookie("user_name",$_POST["name"],time()+3600);
            setcookie("user_password",md5($_POST["password1"]),time()+3600);
            echo "<h2>修改成功</h2><div style=\"width: 100%; height: 45%\"></div>";
            info("Change password!! name=".$_POST["name"]." password=".md5($_POST["password"])."new password=".md5($_POST["password1"])." ip=".ip());
        }else{
            echo "<h2>修改失败</h2><div style=\"width: 100%; height: 45%\"></div>";
            info("Not change password!! name=".$_POST["name"]." upassword=".md5($_POST["password"])." password=".$n." want new password=".md5($_POST["password1"])." ip=".ip());
        }
    }
    
?>
<?php
// sleep(3);
echo "<br>3秒后自动跳转主页面<br>若未跳转点击<a href=\"index.php\">这里</a>";
Header("refresh:2;url=index.php");
?>
</body>