<head><title>wxloj | ui修改反馈</title></head><?php include "head.php";?>
    
    <body class="jb">
        <?php
            $f=fopen("../mor/ui/".htmlspecialchars(getname()).".ini","w");
            fwrite($f,$_POST["1"].PHP_EOL.$_POST["2"]);
            // setcookie("login","yes",time()+3600);
            // setcookie("user_name",$_POST["name"],time()+3600);
            // setcookie("user_password",md5($_POST["password1"]),time()+3600);
            // echo "修改成功！";
            info("Change UI!! ".$_POST["1"]." ".$_POST["2"]);
            Header("Location: index.php");
        ?>
    </body>
</html> 