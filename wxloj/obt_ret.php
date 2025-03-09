<!-- 
    多选题判卷
    match:
        完全相同满分，否则0分
    floor:
        完全相同满分，多选0分，否则获得满分的向下取整分
    ceil:
        完全相同满分，多选0分，否则获得满分的向上取整分
    else:
        特殊配置
        match:完全正确的得分
        partial:部分选对（其他情况）
        wrong:错选（如用户选择BC,正确答案是AB或用户选择ABC,正确答案是AB）
        
 -->
 <html><?php include "head.php";?>

<head><title>wxloj | 客观题评测
</title>
<style>
  .hidden-content {
    display: none; /* 默认隐藏内容 */
  }
  
  /* 设置按钮样式为无边框且背景透明 */
  #toggleButton {
    background-color: transparent; /* 背景色透明 */
    border: none; /* 无边框 */
    padding: 0; /* 移除内边距 */
    margin: 0; /* 移除外边距 */
    cursor: pointer; /* 鼠标悬停时显示指针 */
    outline: none; /* 移除点击时的轮廓线 */
  }
  
  /* 可以添加一些文字样式，例如颜色和字体大小 */
  #toggleButton:hover {
    color: #0066cc; /* 鼠标悬停时改变文字颜色 */
  }
</style>
<script>
function toggleContentAndHideButton() {
  var content = document.getElementById('hiddenContent');
  var button = document.getElementById('toggleButton');
  
  // 显示内容
  content.style.display = 'block';
  
  // 隐藏按钮
  button.style.display = 'none';
}
</script>
</head>
    <body class="jb">
      <?php
function compareArrays($array1,$array2) {
    // 如果两个数组的长度不同，则不可能完全相同
    if (count($array1) !== count($array2)) {
        // 检查第一个数组是否被第二个数组包含
        foreach ($array1 as$value) {
            if (!in_array($value,$array2)) {
                return "wrong";
            }
        }
        return "partial";
    }

    // 两个数组长度相同，检查是否每个元素都存在
    foreach ($array1 as$value) {
        $countInArray1 = count(array_keys($array1, $value));
        $countInArray2 = count(array_keys($array2, $value));
        if ($countInArray1 !==$countInArray2) {
            return "wrong";
        }
    }

    // 如果所有元素都存在且数量相同，则两个数组相同
    return "right";
}  
function arrayToJsonString($array) {
    // 使用array_map来确保所有值都被双引号包围
    $quotedArray = array_map(function($value) {
        // 如果是字符串，则添加双引号；否则直接返回值
        return is_string($value) ? '"' .$value . '"' : $value;
    }, $array);

    // 将键和值组合成 "key": "value" 的形式
    $arrayPairs = [];
    foreach ($quotedArray as$key => $value) {
        $arrayPairs[] = '"' .$key . '": ' . $value;
    }

    // 将所有键值对组合成一个字符串，并用逗号分隔
    $jsonString = '[' . implode(', ',$arrayPairs) . ']';

    return $jsonString;
}  
    
        $id= $_GET["id"];
        $json_string = file_get_contents("./obt_problems/$id.json");
        $data = json_decode($json_string, true);
        $json_string1 = file_get_contents("../mor/obt_ans/$id.json");
        $data_ans = json_decode($json_string1, true);
        $point=0;
        $sum_point=0;
        $ans_ret=[];
        for($i=0;$i<sizeof($data_ans["ans"]);$i+=1) {
            $this_point=0;
            //开始判题 判断是单选还是多选
            if($data_ans["ans"]["$i"]["type"]=="radio"){
                //单选题，相同满分，否则零分
                if($_POST["$i"]=="") $_POST["$i"]="[未选择]";
                if($_POST["$i"]==$data_ans["ans"][$i]["answer"]){
                    $this_point=$data["problem"][$i]["point"];
                    array_push($ans_ret,[
                        "point" => $this_point,
                        "type" => "right",
                        "user_answer" => $_POST["$i"],
                        "right_answer" => $data_ans["ans"][$i]["answer"]
                    ]);
                }else{
                    $this_point=0;
                    array_push($ans_ret,[
                        "point" => $this_point,
                        "type" => "wrong",
                        "user_answer" => $_POST["$i"],
                        "right_answer" => $data_ans["ans"][$i]["answer"]
                    ]);
                }
            }else{
                //多选题，分类判定
                //规则如下
                // match:
                //     完全相同满分，否则0分
                // floor:
                //     完全相同满分，多选0分，否则获得满分的向下取整分
                // ceil:
                //     完全相同满分，多选0分，否则获得满分的向上取整分
                // else:
                //     特殊配置
                //     match:完全正确的得分
                //     partial:部分选对（其他情况）
                //     wrong:错选（如用户选择BC,正确答案是AB或用户选择ABC,正确答案是AB）
                // echo $i." first:".$_POST["$i"]." second:".$data_ans["ans"][$i]["answer"];
                $this_point=0;
                if(isset($_POST["$i"])){
                    $ret=compareArrays($_POST["$i"],$data_ans["ans"][$i]["answer"]);
                    if($data_ans["ans"][$i]["scoring"]["type"]=="match"){
                        if($ret=="right"){
                            $this_point=$data["problem"][$i]["point"];
                            array_push($ans_ret,[
                                "point" => $this_point,
                                "type" => "right",
                                "user_answer" => implode(",", $_POST["$i"]),
                                "right_answer" => implode(",", $data_ans["ans"][$i]["answer"])
                            ]);
                        }else{
                            array_push($ans_ret,[
                                "point" => $this_point,
                                "type" => "wrong",
                                "user_answer" => implode(",", $_POST["$i"]),
                                "right_answer" => implode(",", $data_ans["ans"][$i]["answer"])
                            ]);
                        }
                    }else if($data_ans["ans"][$i]["scoring"]["type"]=="floor"){
                        if($ret=="right"){
                            $this_point=$data["problem"][$i]["point"];
                            array_push($ans_ret,[
                                "point" => $this_point,
                                "type" => "right",
                                "user_answer" => implode(",", $_POST["$i"]),
                                "right_answer" => implode(",", $data_ans["ans"][$i]["answer"])
                            ]);
                        }else if($ret=="wrong"){
                            array_push($ans_ret,[
                                "point" => $this_point,
                                "type" => "wrong",
                                "user_answer" => implode(",", $_POST["$i"]),
                                "right_answer" => implode(",", $data_ans["ans"][$i]["answer"])
                            ]);
                        }else{
                            $this_point=intval($data["problem"][$i]["point"]/2);
                            array_push($ans_ret,[
                                "point" => $this_point,
                                "type" => "partial",
                                "user_answer" => implode(",", $_POST["$i"]),
                                "right_answer" => implode(",", $data_ans["ans"][$i]["answer"])
                            ]);
                        }
                    }else if($data_ans["ans"][$i]["scoring"]["type"]=="ceil"){
                        if($ret=="right"){
                            $this_point=$data["problem"][$i]["point"];
                            array_push($ans_ret,[
                                "point" => $this_point,
                                "type" => "right",
                                "user_answer" => implode(",", $_POST["$i"]),
                                "right_answer" => implode(",", $data_ans["ans"][$i]["answer"])
                            ]);
                        }else if($ret=="wrong"){
                            array_push($ans_ret,[
                                "point" => $this_point,
                                "type" => "wrong",
                                "user_answer" => implode(",", $_POST["$i"]),
                                "right_answer" => implode(",", $data_ans["ans"][$i]["answer"])
                            ]);
                        }else{
                            $this_point=intval(($data["problem"][$i]["point"]+1)/2);
                            array_push($ans_ret,[
                                "point" => $this_point,
                                "type" => "partial",
                                "user_answer" => implode(",", $_POST["$i"]),
                                "right_answer" => implode(",", $data_ans["ans"][$i]["answer"])
                            ]);
                        }
                    }else{
                        if($ret=="right"){
                            $this_point=$data_ans["ans"][$i]["scoring"]["match"];
                            array_push($ans_ret,[
                                "point" => $this_point,
                                "type" => "right",
                                "user_answer" => implode(",", $_POST["$i"]),
                                "right_answer" => implode(",", $data_ans["ans"][$i]["answer"])
                            ]);
                        }else if($ret=="wrong"){
                            $this_point=$data_ans["ans"][$i]["scoring"]["wrong"];
                            array_push($ans_ret,[
                                "point" => $this_point,
                                "type" => "wrong",
                                "user_answer" => implode(",", $_POST["$i"]),
                                "right_answer" => implode(",", $data_ans["ans"][$i]["answer"])
                            ]);
                        }else{
                            $this_point=$data_ans["ans"][$i]["scoring"]["partial"];
                            array_push($ans_ret,[
                                "point" => $this_point,
                                "type" => "partial",
                                "user_answer" => implode(",", $_POST["$i"]),
                                "right_answer" => implode(",", $data_ans["ans"][$i]["answer"])
                            ]);
                        }
                    }
                }else{
                    array_push($ans_ret,[
                        "point" => $this_point,
                        "type" => "wrong",
                        "user_answer" => "[未选择]",
                        "right_answer" => implode(",", $data_ans["ans"][$i]["answer"])
                    ]);
                }
                // if($data_ans["scoring"]["type"]=="match")
            }
            $sum_point+=$data["problem"][$i]["point"];
            $point+=$this_point;
        }
        // echo $point." ".$sum_point."\n";
        // for($i=0;$i<sizeof($data_ans["ans"]);$i+=1){
        //     echo "$i:<br>";
        //     echo arrayToJsonString($ans_ret[$i]);
        //     echo "<br>";
            
        // }
        echo "<div class=\"card2\"><h2>".$data["id"]."  ".$data["name"]."</h2><br></div>";
        echo "<br><div class=\"card2\"><h3>评测结果</h3><br>";
        echo "<div> 得分/满分 $point/$sum_point 得分率 ".strval(floor($point/$sum_point *100 * 100) / 100)."%</div>";
        echo "<div><h4>评测总览</h4><br>";
        echo "<div class=\"container\">";
        for($i=0;$i<sizeof($data_ans["ans"]);$i+=1){
            $color=$data_ans["display"][$ans_ret[$i]["type"]];
            echo '<div class="square" style="background-color: '.$color.';">';
            echo "<div class=\"tooltip\">第 ".strval($i+1) ." 题<br>得分：".strval($ans_ret[$i]["point"])."<br>状态：".$ans_ret[$i]["type"]."<br>你的答案：".$ans_ret[$i]["user_answer"]."<br>正确答案：".$ans_ret[$i]["right_answer"]."</div>";
            echo strval($i+1);
            echo '</div>';
        }
        echo "</div>";
        echo "<div><button id=\"toggleButton\" onclick=\"toggleContentAndHideButton()\">点击显示评测结果源数据</button><div id=\"hiddenContent\" class=\"hidden-content\">";
        echo "<pre><glmos-code-explain></glmos-code-explain><code>";
        //这里为评测结果源数据
        for($i=0;$i<sizeof($data_ans["ans"]);$i+=1){
            echo strval($i+1).".";  
            echo arrayToJsonString($ans_ret[$i]);
            echo "<br>";
        }
        echo "</code></pre></div></div><br>";
        echo "</div></div>";
        $out="";
        $i=0;
        $j=0;
        $display=$data["display_point"];
        foreach ($data["problem"] as $problem) {
            $color=$data_ans["display"]["problem_".$ans_ret[$i]["type"]];
            $out=$out."<div style=\"background-color: $color;\">";
            if($display["display"]){
                $out=$out."<div><p style=\"color:".$display["color"].";display: inline;\">".str_replace("[point]",strval($ans_ret[$i]["point"]),str_replace("[user_ans]",strval($ans_ret[$i]["user_answer"]),str_replace("[ans]",strval($ans_ret[$i]["right_answer"]),str_replace("[problem_point]",strval($data["problem"][$i]["point"]),$data_ans["display"]["problem_out"]))))."</p></div>";
            }
            $out=$out."<div><div>".$problem["problem"]."\n </div>\n\n<div>";
            $j=0;
            foreach($problem["options"] as $options){
                $j+=1;
                $out=$out."<div><input type=\"".$problem["type"]."\"/>";
                $out=$out.$options."<br></div>";
            }
            $i+=1;
            $out=$out."</div><br></div></div>";
        }
        echo "<br><div class=\"card3\" id=\"que\"><div>".$out."</div><br></div>";  
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