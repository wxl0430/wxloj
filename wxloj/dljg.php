<html>
<head><title>wxloj | 登录反馈</title></head><?php include "head.php";?>
<body class="jb"><div class="card7">
<div style="width: 100%; height: 2%"></div>
<?php
    // echo htmlspecialchars($_POST["name"]).$_POST["password"]."\n";
    if(preg_match('/^[A-Za-z0-9_]+$/',$_POST["name"])&&preg_match('/^[A-Za-z0-9_]+$/',$_POST["password"])){
        if(file_exists("../mor/password/".htmlspecialchars($_POST["name"]).".pw")){
            $f=fopen("../mor/password/".htmlspecialchars($_POST["name"]).".pw","r");
            $n=fread($f,filesize("../mor/password/".htmlspecialchars($_POST["name"]).".pw"));
            fclose($f);
            // echo $n." ".md5($_POST["password"])."\n";
            if($n==md5($_POST["password"])){
                $map=[
                    "1min" => 60,
                    "5min" => 60*5,
                    "30min" => 60*30,
                    "1h" => 60*60,
                    "2h" => 60*60*2,
                    "3h" => 60*60*3,
                    "5h" => 60*60*5,
                    "12h" => 60*60*12,
                    "18h" => 60*60*18,
                    "1d" => 60*60*24,
                    "2d" => 60*60*24*2,
                    "5d" => 60*60*24*5,
                    "7d" => 60*60*24*7,
                    "14d" => 60*60*24*14,
                    "21d" => 60*60*24*21,
                    "30d" => 60*60*24*30
                ];
                $time=$map[$_POST["keep"]];
                setcookie("login","yes",time()+$time);
                setcookie("user_name",$_POST["name"],time()+$time);
                setcookie("user_password",md5($_POST["password"]),time()+$time);
                info("Login in!! name=".$_POST["name"]." password=".$n." ip=".ip()." time=".strval($time));
                echo "<h2>登录成功</h2><div style=\"width: 100%; height: 45%\"></div>";
            }else{
                info("Login Not!! name=".$_POST["name"]." upassword=".md5($_POST["password"])." password=".$n." ip=".ip());
                // echo $n;strpos($n,"BANED：");
                if(strpos($n,"等待管理员确认：")!==false){
                    echo "<h2>登录失败</h2><div style=\"width: 100%; height: 15%\"></div><h3>管理员未处理你的申请</h3><div style=\"width: 100%; height: 30%\"></div>";
                }else if(strpos($n,"管理员驳回了你的注册请求：")!==false){
                    echo "<h2>登录失败</h2><div style=\"width: 100%; height: 15%\"></div><h3>管理员驳回了你的注册申请</h3><div style=\"width: 100%; height: 30%\"></div>";
                }else if(strpos($n,"BANED:")!==false){
                    echo "<h2>登录失败</h2><div style=\"width: 100%; height: 15%\"></div><h3>账号被封禁</h3><div style=\"width: 100%; height: 30%\"></div>";
                }else{
                    echo "<h2>登录失败</h2><div style=\"width: 100%; height: 15%\"></div><h3>密码错误</h3><div style=\"width: 100%; height: 30%\"></div>";
                }
                // echo "登录失败：密码错误，管理员未通过或被封禁";
            }
        }else{
            echo "<h2>登录失败</h2><div style=\"width: 100%; height: 15%\"></div><h3>未找到账号</h3><div style=\"width: 100%; height: 30%\"></div>";
        }
    }else{
        echo "<h2>登录失败</h2><div style=\"width: 100%; height: 15%\"></div><h3>未找到账号</h3><div style=\"width: 100%; height: 30%\"></div>";
    }
?> 
<?php
// sleep(3);
echo "<br>3秒后自动跳转主页面<br>若未跳转点击<a href=\"index.php\">这里</a>";
Header("refresh:2;url=index.php");
?>
</div></body></html> 