<?php
/**
 * Created by PhpStorm.
 * User: Gao
 * Date: 2017/10/16
 * Time: 11:03
 */

//header('Access-Control-Allow-Origin:*');
$email = $_GET['email'];
$psw = $_GET['psw'];
$callback = $_GET['callback'];
include  '../dao/user_signup.php';
$result = database_do($email,$psw);
//if($result){
//     $result = database_do(email, psw);
//}
switch ($result){
    case 0:
        session_start();
        $_SESSION['su'] = "u";
        $arr = array("ac" => "ACCESS");
        $_SESSION['noone_email'] = $email;
        echo $callback.'('.json_encode($arr).')';
        break;
    case 1:
        $arr = array("ac" => "DENY");
        echo $callback.'('.json_encode($arr).')';
        break;
}