<?php
/**
 * Created by PhpStorm.
 * User: Gao
 * Date: 2017/7/28
 * Time: 11:39
 */

$color = '银色的';
$car = '奔驰车';
function ftest (){
    global $color, $car;
    echo "我有一辆",$color,$car,"。";
}

?>