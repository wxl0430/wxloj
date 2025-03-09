<?php
    include "head.php";
    if(islogin()){
        if(file_exists("../mor/password/".htmlspecialchars($_POST["name"]).".pw")){
            $f=fopen("../mor/password/".htmlspecialchars($_POST["name"]).".pw","r");
            $n=fread($f,filesize("../mor/password/".htmlspecialchars($_POST["name"]).".pw"));
            fclose($f);
            if($n==md5($_POST["password"])){
                if($_POST["password1"]!=""){
                    $f=fopen("../mor/password/".htmlspecialchars($_POST["name"]).".pw","w");
                    fwrite($f,md5($_POST["password1"]));
                    setcookie("login","yes",time()+3600);
                    setcookie("user_name",$_POST["name"],time()+3600);
                    setcookie("user_password",md5($_POST["password1"]),time()+3600);
                    info("Change password!! name=".$_POST["name"]." password=".md5($_POST["password"])."new password=".md5($_POST["password1"])." ip=".ip());
                }
                $f=fopen("../mor/ui/".htmlspecialchars(getname()).".ini","w");
                fwrite($f,$_POST["1"]);
                info("Change UI!! ".$_POST["1"]);
                Header("Location: help.php?ok=true");
                if($_POST["resume"]!=""){
                    $f=fopen("../mor/resume/".getname().".md","w");
                    fwrite($f,$_POST["resume"]);
                }
            }else{
                info("Not change password!! name=".$_POST["name"]." upassword=".md5($_POST["password"])." password=".$n." want new password=".md5($_POST["password1"])." ip=".ip());
                Header("Location: help.php?ok=false");
            }
        }
    }
?>