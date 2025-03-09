<head><title>wxloj | 这周吃啥啊?</title></head><?php include "head.php";?>
<div class="card1">这一周的食物都给你安排好了(纯属娱乐)[多选(bushi)]:
    <?php
        for($k=0;$k<10;$k++){
        echo "<table class=\"table table-bordered table-hover table-striped table-text-center\"><thead><tr><th></th><th>周一</th><th>周二</th><th>周三</th><th>周四</th><th>周五</th><th>周六</th><th>周日</th></tr></thead><tbody>";
            $name=["煎饼果子","热狗+鳕鱼","烧烤","汉堡","水饺","肉夹馍+馄饨","酸菜鱼","寿司","羊汤","炸酱面","小笼包","糁汤","牛肉汤","披萨","烤鸭"];
            $am=[1,0,0,0,0,0,0,0,0,1,1,0,0,1,0];
            $ans=[[],[],[],[],[],[],[]];
            for($i=0;$i<7;$i++){
                $a=rand(0,14);
                $b=rand(0,14);
                $uans=[$name[$a],$name[$b]];
                if($am[$b]){
                    list($a,$b)=array($b,$a);
                    $uans=[$name[$a],$name[$b]];
                }
                while($uans[0]==$uans[1]||$am[$b]||$ans[$i-1][0]==$uans[0]||$ans[$i-1][1]==$uans[0]||$ans[$i-1][0]==$uans[1]||$ans[$i-1][1]==$uans[1]||$ans[$i-2][0]==$uans[0]||$ans[$i-2][1]==$uans[0]||$ans[$i-2][0]==$uans[1]||$ans[$i-2][1]==$uans[1]){
                    $a=rand(0,14);
                    $b=rand(0,14);
                    $uans=[$name[$a],$name[$b]];
                    if($am[$b]){
                        list($a,$b)=array($b,$a);
                        $uans=[$name[$a],$name[$b]];
                    }
                    
                }$ans[$i]=$uans;
            }echo "<tr><th>上午</th>";
            for($i=0;$i<7;$i++){
                echo "<th>".$ans[$i][0]."</th>";
            }echo "</tr><tr><th>下午</th>";
            for($i=0;$i<7;$i++){
                echo "<th>".$ans[$i][1]."</th>";
            }echo "</tr>";
        echo "</tbody>";}?>
        </div>