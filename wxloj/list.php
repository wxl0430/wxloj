<?php
    include "head.php";
?>
<head><title>wxloj | 用户列表</title></head>
<?php 
function findMinimumX($y) {
    if($y==0) return 0;
    $x = 1; 
    $value = 100;
    while ($value <=$y) {
        $x++;
        $value *= 2; 
    }
    return $x;
}
function pread($filePath) {
    if (!file_exists($filePath)) {
        file_put_contents($filePath, '0');
        return 0;
    } else {
        $content = file_get_contents($filePath);
        return $content;
    }
}
function cmp($a,$b) {
    if ($a[1]==$b[1]) return strcmp($a[0],$b[0]);
    return ($a[1]>$b[1])? -1:1;
}
function get($a,$len){
    if(strlen($a)>$len) return substr($a,0,$len)."...";
    return $a;
}
$data=[];
$directory = "../mor/password";
$files = scandir($directory);
foreach ($files as $file) {
    if ($file == '.' ||$file == '..') {
        continue;
    }
    $filename = pathinfo($file, PATHINFO_FILENAME);
    $p=pread("../mor/wbi/".$filename.".w");
    $filename1 ="../mor/resume/".$filename.".md";
    if (file_exists($filename1)) {
        $l= str_replace("\n","\n",htmlspecialchars(file_get_contents($filename1)));
    } else {
        $l= "这个人什么都没有写";
    }
    $lf=[$filename,$p,findMinimumX($p),$l];
    array_push($data,$lf);
}
usort($data,'cmp');
// foreach($data as $i){
//     echo $i[0]." ".strval($i[1])." ".strval($i[2])."<br>";
// }
?>
<div class="card4"><table class="table table-bordered table-hover table-striped table-text-center"><thead><tr><th style="width: 30%;text-align: center;">用户名</th><th style="width: 13%;text-align: center;">W币</th><th style="width: 7%;text-align: center;">等级</th><th style="width: 50%;text-align: center;">个人简介</th></tr></thead><tbody>
<?php
foreach($data as $i){
    echo "<tr><td><a href=\"help.php?who=".htmlspecialchars_decode($i[0])."\">".htmlspecialchars_decode($i[0])."</a></td><td>".strval($i[1])."</td><td>".strval($i[2])." 级</td><td>".get($i[3],128)."</td></tr>";
}          
?>