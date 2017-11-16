<?php
/**
 * Created by PhpStorm.
 * User: Gao
 * Date: 2017/10/24
 * Time: 23:27
 */

 //header('Access-Control-Allow-Origin:*');
 $email = $_GET['email'];
 $psw = $_GET['psw'];
 $ip = $_GET['ip'];
 $owner = $_GET['owner'];
 $callback = $_GET['callback'];
 include  '../dao/info_add_dao.php';
 $result = database_do($email,$psw, $ip, $owner);
 //if($result){
 //     $result = database_do(email, psw);
 //}
 switch ($result){
     case 0:
         $arr = array("ac" => "ACCESS");
         echo $callback.'('.json_encode($arr).')';
         break;
     case 1:
         $arr = array("ac" => "DENY");
         echo $callback.'('.json_encode($arr).')';
         break;
 }