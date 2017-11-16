<?php
/**
 * Created by PhpStorm.
 * User: Gao
 * Date: 2017/7/28
 * Time: 11:33
 */

//header('Access-Control-Allow-Origin:*');
$email = $_GET['email'];
$psw = $_GET['psw'];
$callback = $_GET['callback'];
include '../dao/user_check.php';
$result = database_do($email,$psw);
switch ($result){
    case 0:
        session_start();
        $_SESSION['su'] = "u";
        $_SESSION['noone_email'] = $email;
        $arr = array("ac" => "ACCESS");
        echo $callback.'('.json_encode($arr).')';
        break;
    case 1:
        echo "DENY";
        break;
    case 2:
        echo "NONE";
        break;
}

