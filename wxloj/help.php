<?php
    include "head.php";
    function has($name){
        return is_file("..\\mor\\password\\$name.pw");
    }
    if(!islogin()&&$_GET["who"]=="") Header("Location:dl.php");
    if(!has($_GET["who"])) Header("Location:404.php");
?>
<head><title>wxloj | 用户</title></head>
<?php
function pread($filePath) {
    if (!file_exists($filePath)) {
        file_put_contents($filePath, '0');
        return 0;
    } else {
        $content = file_get_contents($filePath);
        return $content;
    }
}
function getnamenow(){
    if($_GET["who"]=="") return getname();
    else return $_GET["who"];
}
?>
<script>
function checkIn() {
    var xhr = new XMLHttpRequest();
    var userName = document.cookie.replace(/(?:(?:^|.*;\s*)user_name\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    xhr.open('POST', 'check_in.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            alert(response); // 弹出响应信息
        }
    };
    xhr.send('user_name=' + encodeURIComponent(userName)+"&lf=1");
}
function checkIn1() {
    var xhr = new XMLHttpRequest();
    var userName = document.cookie.replace(/(?:(?:^|.*;\s*)user_name\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    xhr.open('POST', 'check_in.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            alert(response); // 弹出响应信息
        }
    };
    xhr.send('user_name=' + encodeURIComponent(userName)+"&lf=2");
}
function choujiang() {
    var xhr = new XMLHttpRequest();
    var userName = document.cookie.replace(/(?:(?:^|.*;\s*)user_name\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    xhr.open('POST', 'choujiang.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            alert(response); // 弹出响应信息 
        }
    };
    xhr.send('user_name=' + encodeURIComponent(userName)+"");
}
function miao() {
    alert("喵~ 点我干嘛呀~ 喵~");
}
</script>
<div class="card6 x1c25">
    <div class="x1c25" style="width: 100%">
        <div><h1> 用户信息 </h1></div>
        <div>
            用户名：
            <?php
                echo getnamenow();
            ?>
        </div>
        <div>
            W币：
            <?php
                $p=pread("../mor/wbi/".getnamenow().".w");
                echo strval($p);
            ?>
        </div>
        <div>
            等级：
            <?php
            function findMinimumX($y) {
                if($y==0){
                    return 0;
                }
                $x = 1; 
                $value = 100;
                while ($value <=$y) {
                    $x++;
                    $value *= 2; 
                }
            
                return $x;
            }
            echo findMinimumX($p);
            ?>
        </div>
    </div>
</div>
<br>
<?php 
    if($_GET["who"]==""||(islog()&&$_GET["who"]==getname())){
        echo '
<div class="card6 x1c25">
    <div class="x1c25" style="width: 100%">
        <div><h1> 获取W币 </h1></div>
        <div class="container"> 
            <button onclick="checkIn()" class="zj1 ebutton1">每日签到</button>
            <button onclick="checkIn1()" class="zj1 ebutton3">每日签到（双倍经验）（dogs）</button>
        </div>
        
        <div class="container"> 
            <button onclick="choujiang()" class="zj1 ebutton2">来个抽奖？！（100 W币一次，可获得0~200或114514个w币）</button>
            <button onclick="miao()" class="zj1 ebutton4">更多功能持续更新</button>
        </div>
    </div>
</div>
<br>    
    ';
    }
?>
<div class="card6 x1c25">
    <div class="x1c25" style="width: 100%">
        <div><h1> 简介 </h1></div>
        <br>
        <div>
            <div id="que"><?php
                    $filename ="../mor/resume/".getnamenow().".md";
                    if (file_exists($filename)) {
                        echo str_replace("\n","\n",htmlspecialchars(file_get_contents($filename)));
                    } else {
                        echo "这个人什么都没有写";
                    }
                ?></div>
        </div>
    </div>
</div>
<br>
<?php 
    if($_GET["who"]==""||(islog()&&$_GET["who"]==getname())){
        echo '
<div class="card6 x1c25">
    <div><h1> 修改个人信息';
        if($_GET["ok"]=="true") echo "   修改完成";
        else if($_GET["ok"]=="false") echo "   修改失败";
        echo ' 
    </h1></div>
    <form action="grjg.php" method="post">
        <div>
            账号：
            <input style="width: 40%"  data-v-66fcc50b="" type="text" placeholder="" name="name">
        </div>
        <br>
        <div>
            密码：
            <input style="width: 40%"  data-v-66fcc50b="" type="password" placeholder="" name="password">
        </div>
        <br>
        <div>
            新密码（无需修改就不填）：
            <input style="width: 40%"  data-v-66fcc50b="" type="password1" placeholder="" name="password1">
        </div>
        <br>
        <div>
            ';
                $f=getui()[0];
            echo'
            修改UI：
            <select style="width: 40%;height: 30px" name="1">
            <option value="11" ';echo ($f=="11")?"selected":"";echo'  >全部显示</option>
            <option value="00" ';echo ($f=="00")?"selected":"";echo' >全部不显示</option>
            <option value="01" ';echo ($f=="01")?"selected":"";echo' >不显示动态背景</option>
            <option value="10" ';echo ($f=="10")?"selected":"";echo' >不显示鼠标点击效果</option>
        </select>
        </div>
        <br>
        <div>
            <div> 简介：</div>
            <textarea type="text" name="resume" style="height:50%;width:100%">';
                    $filename ="../mor/resume/".getname().".md";
                    if (file_exists($filename)) {
                        echo htmlspecialchars(file_get_contents($filename));
                    } else {
                        echo "这个人什么都没有写";
                    }
                echo '</textarea>
        </div>
        <br>
        <div class="zj2"> <input type="submit" class="ebutton" value="修改"></div></div>
    </from>
</div>
    ';
    }
?>
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
