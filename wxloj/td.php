<?php
include "head.php";
    info("Login out!!"." ip=".ip());
    setcookie("login","no",time()+3600);
    setcookie("user_name","",time()+3600);
    setcookie("user_password","",time()+3600);
    Header("Location: index.php");
?>