<?php
// 获取用户名
$userName =$_POST['user_name'];
// 设置文件路径
if ($_POST["lf"]==2)
    $signInFilePath = "../mor/qd1/{$userName}.qd";
else
    $signInFilePath = "../mor/qd/{$userName}.qd";
$pointsFilePath = "../mor/wbi/{$userName}.w";

// 获取当前日期
$currentDate = date('Y-m-d');

// 检查用户是否已经签到
if (file_exists($signInFilePath)) {
    $signInDate = file_get_contents($signInFilePath);
    if ($signInDate ===$currentDate) {
        echo "本日你已签到，明日再来吧";
        exit;
    }
}

// 更新签到日期文件
file_put_contents($signInFilePath,$currentDate);

// 更新用户积分
if (file_exists($pointsFilePath)) {
    $points = (int)file_get_contents($pointsFilePath);
    $points += 100;
    file_put_contents($pointsFilePath,$points);
} else {
    file_put_contents($pointsFilePath, 100); // 如果文件不存在，则创建并初始化为100
}

echo "签到成功，获得100 W币";
?>
