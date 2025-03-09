<html><?php include "head.php";?>

<head><title>wxloj | 客观题</title></head>
    <body class="jb">
      <?php
      function numberToLetter($number) {
        return chr(64 + $number);
    }
    $id= $_GET["id"];
    // echo $_GET["id"];
    // $res1 = fopen("./obt_problems/$id.ini", "r");
    // $ini = fread($res1,filesize("./obt_problems/$id.ini"));
    // // echo $ini;
    // $data=explode("\n",$ini);
    // $name=$data[1];
    // echo "<div class=\"card2\"><h2>#$id.$name</h2><br></div>";
    echo "<form action=\"obt_ret.php?id=$id\" method=\"post\">";
    // echo "<br><div class=\"zj1\"> <input type=\"submit\" class=\"ebutton\"></div></div>";
    $json_string = file_get_contents("./obt_problems/$id.json");
    $data = json_decode($json_string, true);
    echo "<div class=\"card2\"><h2>".$data["id"]."  ".$data["name"]."</h2><br></div>";
    $out="";
    $i=0;
    $j=0;
    $display=$data["display_point"];
    foreach ($data["problem"] as $problem) {
        $out=$out."<div>";
        if($display["display"]){
          $out=$out."<div><p style=\"color:".$display["color"].";display: inline;\">".$display["left"].$problem["point"].$display["right"]."</p></div>";
        }
        $out=$out."<div>".$problem["problem"]."\n </div>\n\n<div>";
        $j=0;
        if ($problem["type"]=="checkbox"){
          $checkbox="[]";
        }
        else{
          $checkbox="";
        }
        foreach($problem["options"] as $options){
            $j+=1;
            $out=$out."<div><input type=\"".$problem["type"]."\" name=\"".strval($i).$checkbox."\" value=\"".strval(numberToLetter($j))."\" />";
            $out=$out.$options."<br></div>";
        }
        $i+=1;
        $out=$out."</div><br></div>";
    }
    echo "</div><br><br><div class=\"card3\" id=\"que\"><div>".$out."</div><br><div class=\"zj1\"> <input type=\"submit\" class=\"ebutton\"></div></from></div>";  
    ?>

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