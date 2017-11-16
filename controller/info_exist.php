<?php
/**
 * Created by PhpStorm.
 * User: Gao
 * Date: 2017/10/16
 * Time: 17:00
 */

$email = $_GET['email'];
$callback = $_GET['callback'];
if($email){
    include '../dao/info_exist_dao.php';
    if(($email)){
        echo $callback.'('.json_encode(business_check($email)).')';
    }
    else{
        echo $callback.'('.json_encode(null).')';
    }
}
else{
    echo $callback.'('.json_encode(null).')';
}
