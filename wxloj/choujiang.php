<?php
// 获取用户名
$userName =$_POST['user_name'];
$pointsFilePath = "../mor/wbi/{$userName}.w";

if (file_exists($pointsFilePath)) {
    $points = (int)file_get_contents($pointsFilePath);
    if ($points>=100){
        $x = rand(0, 201);
        if ($x == 201) {
            $y = 114514;
        } else {
            $y = $x;
        }
        if ($y > 100) {
            $randomZeroOrOne = rand(0, 1);
            $y = ($randomZeroOrOne == 1) ? $y :($y==114514? 114:$y - 100);
        }
        $points += $y-100;
        echo "抽奖成功，花费100 W币，获得$y W币,你现在有$points W币";
    }else{
        echo "抽奖失败，你没有100 W币来抽奖";
    }
    
    file_put_contents($pointsFilePath,$points);
} 
?>
