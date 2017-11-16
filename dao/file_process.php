<?php
/**
 * Created by PhpStorm.
 * User: Gao
 * Date: 2017/10/25
 * Time: 11:06
 */

function file_pro($email, $psw, $type){
    $pro = fopen("d:/etc/chap-secrets", "a") or die("Unable to open file!");
    flock($pro, LOCK_EX);
//$txt = "Mickey Mouse\n";
    $content = $email.' '.$type.' '.$psw." *\n";
    fwrite($pro, $content);
//$txt = "Minnie Mouse\n";
//    fwrite($myfile, $txt);
    flock($pro, LOCK_UN);
    fclose($pro);
}


