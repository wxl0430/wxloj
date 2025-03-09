<head>
<?php ob_start();?>
        <link rel="shortcut icon" href="./main.ico" type="image/x-icon" />
        <meta charset="utf-8">
        <style>
.navpage_detail_2017{width: auto !important}
#yustb4
{
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	width:100%;
	border-collapse:collapse;
}
#yustb4 td, #yustb4 th 
{
	font-size:1em;
	height:50px;
	padding:3px 7px 2px 7px;
    border-bottom: 1px solid #c8c8c8;
}
#tab th 
{
	font-size:1.1em;
	text-align:left;
	padding-top:5px;
	height:50px;
	padding-bottom:4px;
	background-color:#b1b1b1;
	color:#ffffff;
}
</style>
        <script src="/static/bootstrap-3.4.1-dist/js/bootstrap.js"></script>

    <link rel="stylesheet" href="/static/bootstrap-3.4.1-dist/css/bootstrap.css" th:href="@{/lib/semantic/dist/semantic.min.css}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

    <script id="MathJax-script" async src="https://cdn.bootcss.com/mathjax/3.0.5/es5/tex-mml-chtml.js ">
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
<!--          
            <script>
        function collect() {
            //开始javascript执行过程的数据收集
            console.profile();
            //配合profile方法，作为数据收集的结束
            console.profileEnd();
            //我们判断一下profiles里面有没有东西，如果有，肯定有人按F12了，没错！！
            if (console.clear) {
                //清空控制台
                console.clear()
            };
            if (typeof console.profiles == "object") {
                return console.profiles.length > 0;
            }
        }

        function check() {
            if ((window.console && (console.firebug || console.table && /firebug/i.test(console.table()))) || (typeof opera == 'object' && typeof opera.postError == 'function' && console.profile.length > 0)) {
                jump();
            }
            if (typeof console.profiles == "object" && console.profiles.length > 0) {
                jump();
            }
        }
        check();
        window.onresize = function() {
            //判断当前窗口内页高度和窗口高度
            if ((window.outerHeight - window.innerHeight) > 200||(window.outerWidth - window.innerWidth) > 200)
                jump();
        }

        function jump() {
            console.clear();
            alert('FUCK YOU,吊臂乱调控制台我祝你全家不得好死');
            window.location = "/fuckyou";
        }
        </script> 
     -->
        <style type="text/css">
        .x8 {
            font-size: 8em;
        }
        .x4 {
            font-size: 4em;
        }
        .x2 {
            font-size: 2em;
        }
        .x3 {
            font-size: 3em;
        }
        .x1c5 {
            font-size: 1.5em;
        }
        .x1c25 {
            font-size: 1.25em;
        }
        .xc25 {
            font-size: 0.25em;
        }
        .x1 {
            font-size: 1em;
        }
        .jb{
            /* background-image: url("lyz.gif");
            background-size: 100% 100%; */
            background-color: rgb(244, 244, 244);
            /* background : -webkit-linear-gradient(bottom,#fff,#FFEBCD);
            background : -o-linear-gradient(bottom,#fff,#FFEBCD);
            background : -moz-linear-gradient(bottom,#fff,#FFEBCD);
            background : linear-gradient(to top,#fff,#FFEBCD); 
            width:100%;*/
        }
        .card{
            display:block;
            margin-bottom:1.3em;
            background-color:#fff;
            border-radius:4px;
            box-shadow:0 1px 3px rgba(26,26,26,.1);
            box-sizing:border-box;
            margin: 0 auto;
        }
        .notsee{
            width: 0px;
            height: 0px;
        }
        .card1{
            display:block;
            margin-bottom:1.3em;
            background-color:#fff;
            border-radius:4px;
            box-shadow:0 1px 3px rgba(26,26,26,.1);
            box-sizing:border-box;
            width:70%;
            padding:20px 20px 20px 20px; 
            margin: 0 auto;
        }
        .card2{
            display:block;
            margin-bottom:1.3em;
            background-color:#fff;
            border-radius:4px;
            box-shadow:0 1px 3px rgba(26,26,26,.1);
            box-sizing:border-box;
            width:70%;
            padding:10px 20px 0px 20px; 
            margin: 0 auto;
        }
        .card3{
            display:block;
            margin-bottom:1.3em;
            background-color:#fff;
            border-radius:4px;
            box-shadow:0 1px 3px rgba(26,26,26,.1);
            box-sizing:border-box;
            width:70%;
            padding:20px 20px 20px 20px; 
            margin: 0 auto;
        }
        .card4{
            display:block;
            margin-bottom:1.3em;
            background-color:#fff;
            border-radius:4px;
            box-shadow:0 1px 3px rgba(26,26,26,.1);
            box-sizing:border-box;
            width:80%;
            padding:20px 20px 20px 20px; 
            margin: 0 auto;
        }
        .card5{
            display:block;
            margin-bottom:1.3em;
            background-color:#fff;
            border-radius:4px;
            box-shadow:0 1px 3px rgba(26,26,26,.1);
            box-sizing:border-box;
            width:80%;
            padding:20px 20px 10px 20px; 
            margin: 0 auto;
        }
        .card6{
            display:block;
            margin-bottom:1.3em;
            background-color:#fff;
            border-radius:4px;
            box-shadow:0 1px 3px rgba(26,26,26,.1);
            box-sizing:border-box;
            padding:20px 20px 20px 20px; 
            margin: 0 auto;
	        text-align: left;
            width: 70%;
            left: 50%;
            top: 5%;
        }
        .card7{
            display:block;
            margin-bottom:1.3em;
            background-color:#fff;
            border-radius:4px;
            box-shadow:0 1px 3px rgba(26,26,26,.1);
            box-sizing:border-box;
            padding:20px 20px 20px 20px; 
            position: absolute;
            margin: 0 auto;
	        text-align: center;
            width: 350px;
            height: 400px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
        }
        .right{
            float: right!important;
        }
        .new_code {
            display: block;
            white-space: pre-wrap;
        }
        .container-fluid {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        
        .zj{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
            border: 3px solid green; 
        }
        .zj1{
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 200px; */
            /* border: 0px solid green;  */
        }
        .zj2{
            display: flex;
            justify-content: left;
            align-items: center;
            /* height: 200px; */
            /* border: 0px solid green;  */
        }
        .ebutton{
            background-color:#1f6af6;
            color:white;
            width: 400px;
            height: 45px;
            border:0;
            font-size: 16px;
            box-sizing: content-box;				
            border-radius: 5px;

        }
        .ebutton:hover{
            background-color: #1b4aa5;
        }
        .ebutton1{
            background-color:#FFC0CB;
            color:black;
            width: 400px;
            height: 45px;
            border:0;
            font-size: 16px;
            box-sizing: content-box;				
            border-radius: 5px;

        }
        .ebutton1:hover{
            background-color: #FFD0DB;
        }	
        .ebutton2{
            background-color:#00FFFF;
            color:black;
            width: 400px;
            height: 45px;
            border:0;
            font-size: 16px;
            box-sizing: content-box;				
            border-radius: 5px;

        }
        .ebutton2:hover{
            background-color: #00EFEF;
        }
        .ebutton3{
            background-color:#00FF00;
            color:black;
            width: 400px;
            height: 45px;
            border:0;
            font-size: 16px;
            box-sizing: content-box;				
            border-radius: 5px;

        }
        .ebutton3:hover{
            background-color: #00EF00;
        }
        .ebutton4{
            background-color:#FF0000;
            color:black;
            width: 400px;
            height: 45px;
            border:0;
            font-size: 16px;
            box-sizing: content-box;				
            border-radius: 5px;

        }
        .ebutton4:hover{
            background-color: #EF0000;
        }
        .ebutton5{
            background-color:#1f6af6;
            color:white;
            width: 400px;
            height: 45px;
            border:0;
            float: left;
            font-size: 16px;
            box-sizing: content-box;				
            border-radius: 5px;

        }
        .ebutton5:hover{
            background-color: #1b4aa5;
        }
        .text {
            position: absolute;
            z-index: 9999999;
            font-weight: bold;
            user-select: none;
            font-size: 15;
        }
        li{
            list-style: none;
        }
        li a{
	        color:black;
	        text-decoration: none;
        }
        .me{
            padding-left: 10%;
            padding-right: 10%;
        }
        .boys{
            display:none;
            list-style:none;
            margin:0px;
        }
        #menu>li:hover .boys{
            display:block;
        }
        .divf{
            float:right;
        }
        
        /* 自动轮播样式 */
        .banner-container{
            width:1200px;
            height:400px;
            /* object-fit:contain; */
            /* 轮播图居中 */
            margin:1rem auto;
            /* 隐藏超出展示容器的内容 */
            overflow: hidden;
            position: relative;
        }

        .banner-container .banner-img-container {
            width:12000px;
            height:400px;
            overflow: hidden;
            position: absolute;
            /* 开启弹性盒，让图片横向排列 */
            display: flex;
            animation: run 40s ease infinite;
        }

        .banner-container .banner-img-container img{
            width:1200px;
            height:100%;
            object-fit:contain;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px; /* 正方形之间的间隔 */
            padding: 10px;
            width:100%;
        }

        .square {
            width: 50px; /* 正方形的宽度 */
            height: 50px; /* 正方形的高度 */
            display: flex;
            align-items: center; /* 垂直居中文字 */
            justify-content: center; /* 水平居中文字 */
            color: white; /* 文字颜色 */
            font-size: 24px; /* 文字大小 */
            position: relative; /* 为子元素定位 */
            cursor: pointer; /* 鼠标悬停时显示指针 */
        }

        /* .square:hover::after {
            content: attr(text);
            position: absolute;
            color: black; 
            font-size: 14px; 
            white-space: nowrap; 
        } */
        .tooltip {
            visibility: hidden;
            width: 120px;
            background-color: rgba(249, 249, 249, 0.8); /* 淡灰色背景 */
            color: black; /* 黑色文字 */
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 100%; /* 位于正方形上方 */
            left: 50%;
            margin-left: -60px; /* 偏移使弹窗居中 */
            opacity: 0;
            transition: opacity 0.3s;
        }

        .square:hover .tooltip {
            visibility: visible;
            opacity: 1;
        }
        /* 动画关键帧 */
        @keyframes run {
            0%,5%{
                /* margin-left: 0; */
                transform: translateX(0);
            }
            10%,15%{
                /* margin-left: -1200px;; */
                transform: translateX(-1200px);
            }
            20%,25%{
                /* margin-left: -2400px; */
                transform: translateX(-2400px);
            }
            30%,35%{
                /* margin-left: -3600px; */
                transform: translateX(-3600px);
            }
            40%,45%{
                /* margin-left: -4800px; */
                transform: translateX(-4800px);
            }
            50%,55%{
                /* margin-left: 0; */
                transform: translateX(-6000px);
            }
            60%,65%{
                /* margin-left: -1200px;; */
                transform: translateX(-7200px);
            }
            70%,75%{
                /* margin-left: -2400px; */
                transform: translateX(-8400px);
            }
            80%,85%{
                /* margin-left: -3600px; */
                transform: translateX(-9600px);
            }
            90%,95%{
                /* margin-left: -4800px; */
                transform: translateX(-10800px);
            }
            100%{
                /* margin-left: 0; */
                transform: translateX(0);
            }
        }

        </style>
    
        <link rel="stylesheet" href="./static/bootstrap-3.4.1-dist/css/bootstrap.css" th:href="@{/lib/semantic/dist/semantic.min.css}">
        
    </head>
    <!-- <link rel="stylesheet" media="all" href="/static/problem.css"> -->
    <nav class="navbar navbar-default" style="background-color: rgb(255,255,255); color: rgb(0, 0, 0);" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="/"><?php echo $c["shortname"] ?></a>
    </div>
    
    <div>
        <ul class="nav navbar-nav">
            <li class="active"></li>
            <li><a href="index.php" style="background-color: rgb(187, 255, 255);"><img src="main.ico" width="22" height="22"></img> &ensp;wxloj</a></li>
            <li><a href="problems.php">题目</a></li>
            <li><a href="je.php">提交记录</a></li>
            <li><a href="obt_problems.php">客观题</a></li>
            <li><a href="list.php">用户列表</a></li>
        </ul>
        <ul class="nav navbar-nav right" role="tablist">
            
            <!-- <li><a style="color: rgb(0, 0, 0);" href="update.php">更新日志</a></li> -->
		    <?php 
                if($_COOKIE["login"]=="yes") echo "<li class=\"nav-item dropdown\"><a class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\" href=\"help.php\"><span class=\"uoj-username\" style=\"color:rgb(63,196,104)\">".$_COOKIE["user_name"]."</span></a></li><li class=\"nav-item dropdown\"><a class=\"nav-link dropdown-toggle\" href=\"td.php\" data-toggle=\"dropdown\"><span class=\"uoj-username\" style=\"color:rgb(0,0,0)\">退出登录</span></a></li>";
                else echo "<li class=\"nav-item dropdown\"><a class=\"nav-link dropdown-toggle\" href=\"dl.php\" data-toggle=\"dropdown\"><span class=\"uoj-username\" style=\"color:rgb(0,0,0)\">登录</span></a></li><li class=\"nav-item dropdown\"><a class=\"nav-link dropdown-toggle\" href=\"zc.php\" data-toggle=\"dropdown\"><span class=\"uoj-username\" style=\"color:rgb(0,0,0)\">注册</span></a></li>";
            ?>
            
		</ul>
    </div>
    <script type="text/javascript" async
  src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML" async>
</script>
<!-- 这里是代码高亮 -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/cpp.min.js"></script> -->


<script>
    
   MathJax.Hub.Config({
     extensions: ["tex2jax.js"],
     jax: ["input/TeX", "output/HTML-CSS"],
     tex2jax: {
       inlineMath: [ ['$','$'], ["\\(","\\)"] ],
       displayMath: [ ['$$','$$'], ["\\[","\\]"] ],
       processEscapes: true
     },
     "HTML-CSS": { availableFonts: ["TeX"] },
   });
 </script>

<script>
   //Markdown文本
    var markdownContent = document.getElementById('que').innerHTML;

   //使用marked将Markdown转换为HTML
    var htmlContent = marked.parse(markdownContent, {
        mangle: false,
        headerIds: false
    });

   //将转换后的HTML插入到页面中
    document.getElementById('que').innerHTML = htmlContent;

   //MathJax加载完毕后的回调函数
    MathJax.Hub.Queue(["Typeset", MathJax.Hub, 'que', function() {
       //MathJax加载完毕后，再次解析Markdown中的数学公式
        var markdownContentWithMathJax = marked.parse(document.getElementById('que').innerHTML, {
            mangle: false,
            headerIds: false
        });

       //将解析后的Markdown内容插入到页面中
        document.getElementById('que').innerHTML = markdownContentWithMathJax;
    }]);
</script>

<!-- <body img="lyz.gif"> -->
    </div></nav>
    <?php $ui=getui()[0];
    if($ui==11||$ui==01) echo "<script src=\"js/rap1.js\"></script>";
if($ui==11||$ui==10) echo "<canvas class=\"notsee\"><script src=\"js/rap.js\" color=\"50,50,50\" opacity=\"1\" count=\"225\" zindex=\"-114\"></script></canvas>";
?>
<?php

function getname(){
    return $_COOKIE["user_name"];
}
function getupassword(){
    return $_COOKIE["user_password"];
}
function islog(){
    return $_COOKIE["login"]=="yes";
}
function isfile($filename){
    return file_exists($filename);
} 
function read($filename){
    $f=fopen($filename,"r");
    if(filesize($filename)) $n=fread($f,filesize($filename));
    else $n="";
    fclose($f);
    return $n;
}
function info($x){
    $time=date("Y-m-d H:i:s",time());
    //if(log()) 
    $name=getname();
    //else $name="NLI";
    $log="[".$time."][".$name."] ".$x."\n";
    $f=fopen("../mor/info.log","a");
    fwrite($f,$log);
    fclose($f);
}
function islogin(){
    if(islog()){
        if(isfile("../mor/password/".getname().".pw")){
            $p=read("../mor/password/".getname().".pw");
            return $p==getupassword();
        }
    }
}
function isadmin(){
    return $_COOKIE["login"]=="yes"&&$_COOKIE["user_name"]=="admin"&&islogin();
}
function copystr($str,$size){
    $res="";
    for($x=0;$x<$size;$x++) $res=$res.$str;
    return $res;
}
function ukeym($res,$code,$len){
    for($i=0;$i<32;$i++) $res=md5($res);
    if($code=="L") return substr($res,0,$len);
    else if($code=="R") return substr($res,32-$len,$len);
    else if($code=="M") return substr($res,(32-$len)/2+1,$len);
    else return $res;
}
function ukey($name,$password,$code){
    return ukeym($name.$password,substr($code,0,1),(int)(substr($code,1,strlen($code)-1)));
}
function l($code){
    return ukey(getname(),getupassword(),$code);
}
function rulogin(){
    return islog()&&(!islogin());
}
function getui(){
    if(islog()){
        $res1 = fopen("../mor/ui/".getname().".ini", "r");
        $res = fread($res1,filesize("../mor/ui/".getname().".ini"));
        $ae2 = explode("\n",$res);
        return $ae2;
    }else{
        return [10];
    }
}
if(rulogin()){
    info("Ru login!! password=".getupassword());
    setcookie("login","no",time()+3600);
    setcookie("user_name","",time()+3600);
    setcookie("user_password","",time()+3600);
    Header("Location: index.php");
}
function ip()//by https://www.cnblogs.com/forforever/p/12674056.html
{
    static $realip;
    if (isset($_SERVER)){
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")){
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        } else {
            $realip = getenv("REMOTE_ADDR");
        } 
    }
    return $realip;
}
function ipc(){//不是wxl本人书写，网上搜索，忘记网址了
    $ip = ip();
    // $ip="203.107.45.167";
    // 过滤空数据
    if(!$ip) {
        
        $ipinfo = array(
            'code' => 201,
            'msg' => '未传入ip地址'
        );
        echo json_encode($ipinfo,JSON_UNESCAPED_UNICODE);
        exit;
    }
    
    // 验证ipv4地址合法性
    if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        
        $ipinfo = array(
            'code' => 201,
            'msg' => '这不是一个正确的ip地址'
        );
        echo json_encode($ipinfo,JSON_UNESCAPED_UNICODE);
        exit;
    }
    
    // 请求接口
    $methods = [
        'getMethod_1',
        'getMethod_2',
        'getMethod_3',
        'getMethod_4',
        'getMethod_5'
    ];
    // HTTP请求封装
    function cUrlGetIP($url) {
        
        // cUrl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $header[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        return curl_exec($ch);
        curl_close($ch);
    }
    
    // 中国34个省级行政区域
    $provinces = array(
        "北京",
        "天津",
        "河北",
        "山西",
        "内蒙古",
        "辽宁",
        "吉林",
        "黑龙江",
        "上海",
        "江苏",
        "浙江",
        "安徽",
        "福建",
        "江西",
        "山东",
        "河南",
        "湖北",
        "湖南",
        "广东",
        "广西",
        "海南",
        "重庆",
        "四川",
        "贵州",
        "云南",
        "西藏",
        "陕西",
        "甘肃",
        "青海",
        "宁夏",
        "新疆",
        "香港",
        "澳门",
        "台湾"
    );
    
    // 接口1
    // http://ipshudi.com/{ip}.htm
    function getMethod_1($ip) {
        
        $response = file_get_contents('http://ipshudi.com/'.$ip.'.htm');
        $str1 = substr($response, strripos($response, "归属地"));
        $str2 = substr($str1, 0, strrpos($str1, "运营商"));
        $str3 = substr($str2, strripos($str2, "<span>") + 6);
        $str4 = substr($str3, 0, strripos($str3, "</span>") + 6);
        
        // 提取国家
        $country = substr($str4, 0, strpos($str4, ' '));
        
        // 提取省份
        $str5 = substr($str4, 0, strrpos($str4, " <a href"));
        $province = substr($str5, strpos($str5, ' ') + 1);
        
        // 提取城市
        preg_match('/>([^<]+)</', $str4, $matches);
        $city = $matches[1];
        
        // 提取县区
        $str6 = substr($str4, strripos($str4, "</a>"));
        $district = preg_replace('/[^\x{4e00}-\x{9fa5}]+/u', '', $str6);
        
        // 判断是否获取成功
        if($country || $province || $city || $district) {
            
            // 拼接数组
            $ipinfo = array(
                'code' => 200,
                'msg' => '获取成功',
                'ipinfo' => $country.$province.$city,
            );
        }else {
            
            $ipinfo = array(
                'code' => 201,
                'msg' => '获取失败'
            );
        }
        
        return json_encode($ipinfo,JSON_UNESCAPED_UNICODE);
    }
    
    // 接口2
    // https://searchplugin.csdn.net/api/v1/ip/get?ip={ip}
    function getMethod_2($ip) {
        
        $response = cUrlGetIP('https://searchplugin.csdn.net/api/v1/ip/get?ip='.$ip);
        $code = json_decode($response,true)['code'];
        
        if($code == 200) {
            
            $str1 = json_decode($response,true)['data']['address'];
            
            // 国家
            $country = explode(' ', $str1)[0];
            
            // 省份
            $province = explode(' ', $str1)[1];
            
            // 城市
            $city = explode(' ', $str1)[2];
            
            // 县区
            $district = '';
            
            // 判断是否获取成功
            if($country || $province || $city || $district) {
                
                // 拼接数组
                $ipinfo = array(
                    'code' => 200,
                    'msg' => '获取成功',
                    'ipinfo' => $country.$province.$city,
                );
            }else {
                
                $ipinfo = array(
                    'code' => 201,
                    'msg' => '获取失败'
                );
            }
        }else {
            
            $ipinfo = array(
                'code' => 201,
                'msg' => '获取失败'
            );
        }
        
        return json_encode($ipinfo,JSON_UNESCAPED_UNICODE);
    }
    
    // 接口3
    // https://ipchaxun.com/{ip}/
    function getMethod_3($ip) {
        
        $response = cUrlGetIP('https://ipchaxun.com/'.$ip.'/');
        $str1 = substr($response, strripos($response, "归属地") + 15);
        $str2 = substr($str1, 0, strrpos($str1, "运营商"));
        
        // 提取省份
        global $provinces;
        foreach ($provinces as $province_) {
            if (strpos($str2, $province_) !== false) {
                $province = $province_;
                break;
            }
        }
        
        // 提取国家
        $str3 = substr($str2, 0, strrpos($str2, $province));
        $country = preg_replace('/[^\x{4e00}-\x{9fa5}]+/u', '', $str3);
        
        // 提取城市
        $str4 = substr($str2, strripos($str2, "nofollow") + 10);
        $city = substr($str4, 0, strrpos($str4, "</a>"));
        
        // 提取县区
        $str6 = substr($str2, strripos($str2, "</a>") + 4);
        $district = substr($str6, 0, strrpos($str6, "</span>"));
        
        // 判断是否获取成功
        if($country || $province || $city || $district) {
            
            // 拼接数组
            $ipinfo = array(
                'code' => 200,
                'msg' => '获取成功',
                'ipinfo' => $country.$province.$city,
            );
        }else {
            
            $ipinfo = array(
                'code' => 201,
                'msg' => '获取失败'
            );
        }
        
        return json_encode($ipinfo,JSON_UNESCAPED_UNICODE);
    }
    
    // 接口4
    // https://api.vvhan.com/api/getIpInfo?ip={ip}
    function getMethod_4($ip) {
        
        $response = cUrlGetIP('https://api.vvhan.com/api/getIpInfo?ip='.$ip);
        $success = json_decode($response,true)['success'];
        
        if($success == true) {
            
            $str1 = json_decode($response,true)['info'];
            
            // 国家
            $country = $str1['country'];
            
            // 省份
            $province = $str1['prov'];
            
            // 城市
            $city = $str1['city'];
            
            // 县区
            $district = '';
            
            // 判断是否获取成功
            if($country || $province || $city || $district) {
                
                // 拼接数组
                $ipinfo = array(
                    'code' => 200,
                    'msg' => '获取成功',
                    'ipinfo' => $country.$province.$city,
                );
            }else {
                
                $ipinfo = array(
                    'code' => 201,
                    'msg' => '获取失败'
                );
            }
        }else {
            
            $ipinfo = array(
                'code' => 201,
                'msg' => '获取失败'
            );
        }
        
        return json_encode($ipinfo,JSON_UNESCAPED_UNICODE);
    }
    
    // 接口5
    // https://c.runoob.com/wp-content/themes/toolrunoob2/option/ajax.php?type=checkIP&REMOTE_ADDR={ip}
    function getMethod_5($ip) {
        
        $response = cUrlGetIP('https://c.runoob.com/wp-content/themes/toolrunoob2/option/ajax.php?type=checkIP&REMOTE_ADDR='.$ip);

        $flag = json_decode($response,true)['flag'];
        
        if($flag == true) {
            
            $str1 = json_decode($response,true)['data'];
            
            // 国家
            $country = $str1['country'];
            
            // 省份
            $province = $str1['regionName'];
            
            // 城市
            $city = $str1['city'];
            
            // 县区
            $district = '';
            
            // 判断是否获取成功
            if($country || $province || $city || $district) {
                
                // 拼接数组
                $ipinfo = array(
                    'code' => 200,
                    'msg' => '获取成功',
                    'ipinfo' => $country.$province.$city,
                );
            }else {
                
                $ipinfo = array(
                    'code' => 201,
                    'msg' => '获取失败'
                );
            }
        }else {
            
            $ipinfo = array(
                'code' => 201,
                'msg' => '获取失败'
            );
        }
        
        return json_encode($ipinfo,JSON_UNESCAPED_UNICODE);
    }

    foreach ($methods as $method) {
        $response = json_decode($method($ip));
        if ($response->code === 200) {
            
            // 如果请求成功，输出请求结果并停止循环
            echo $response->ipinfo;
            break;
        }
    }
    
    if (!isset($response) || $response->code !== 200) {
        
        $ipinfo = array(
            'code' => 201,
            'msg' => '请求失败~'
        );
        echo json_encode($ipinfo,JSON_UNESCAPED_UNICODE);
        exit;
    }
    
    
}
// echo "!!!";
// echo ip();
// echo ipc();
// echo "end";
// l("L2");
// l("L4");
// l("L8");
// l("L16");
// l("R2");
// l("R4");
// l("R8");
// l("R16");
// l("M2");
// l("M4");
// l("M8");
// l("M16");
// l("ALL");
?>