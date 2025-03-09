<html><?php include "head.php";?>
<head><title>wxloj | 题目</title></head>
    <body class="jb">
      <?php
    $id= $_GET["id"];
    $res1 = fopen("./problems/$id.md", "r");
    $res = fread($res1,filesize("./problems/$id.md"));
    $res1 = fopen("./problems/$id.ini", "r");
    $ini = fread($res1,filesize("./problems/$id.ini"));
    $name=explode("\n",$ini)[1];
    $res1 = fopen("./problems/$id.ju", "r");
    $ju = fread($res1,filesize("./problems/$id.ju"));
    $run_time=explode("\n",$ju)[2];
    $run_mo=explode("\n",$ju)[3];
    // echo $name;
    // echo "<div class=\"main\"><script></script><div class=\"row\" data-sticky-parent=\"\"><div class=\"medium-9 columns\"><div class=\"section visible\"><div class=\"problem-content-container\"><div class=\"problem-content\" data-marker-enabled=\"\"><div class=\"section__body typo\" data-fragment-id=\"problem-description\">";
    echo "<div class=\"card2\"><h2>#$id.$name</h2>";
    // if(isadmin()){
    //   echo "<div><a href=\"upd_problem.php?id=$id\">修改题目</a></div>";
    // }
    echo "<br></div>";
    echo "<div class=\"card3 x1c5\"><img src=\".\\img\\1.png\" width=\"20\" height=\"25\" />&ensp;$run_time ms";
    echo "&emsp;<img src=\".\\img\\2.png\" width=\"20\" height=\"25\" />&ensp;$run_mo MB";
    echo "</div><br><br>";
    echo "<div id=\"que\" script=\"margin-left:1px;\" class=\"card1 x1c25\">$res</div>";
    echo "<br><br><div class=\"card3\">"; 
    echo "<form action=\"tj.php?id=$id\" method=\"post\" class=\"x1c25\">";
    echo "<textarea type=\"text\" placeholder=\"c++代码\" name=\"code\" style=\"height:100%;width:100%\"></textarea><br>";
    echo "<br><div class=\"zj1\"> <input type=\"submit\" class=\"ebutton\"></div></from></div>";
    // echo "</div></div></div></div></div><div class=\"medium-3 columns\"><div data-sticky=\"large\" class=\"is_stuck\" style=\"position: fixed; top: 55px; width: 215px;\"><div class=\"section side section--problem-sidebar visible\"><div><ol class=\"menu\"><li class=\"menu__item scratchpad--hide\"><a class=\"menu__link\"><span class=\"icon icon-send\"></span> 递交</a></li></ol></div></div></div><div style=\"position: static; width: 215px; height: 52px; display: block; vertical-align: baseline; float: none;\"></div></div></div></div>";
    ?>
    <!-- </div> -->

    <script type="text/javascript" async
  src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML" async>
</script>
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

    </body>
</html>