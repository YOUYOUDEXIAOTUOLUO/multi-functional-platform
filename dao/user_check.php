<?php
/**
 * Created by PhpStorm.
 * User: Gao
 * Date: 2017/7/26
 * Time: 14:08
 */

//$dbase = array(
//    'dsn' => 'mysql:host=localhost;dbname=mfp;port=3306;charset=utf8',
//    'host' => 'localhost',
//    'port' => '3306',
//    'dbname' => 'mfp',
//    'username' => 'root',
//    'password' => '971016',
//    'charset' => 'utf8'
//);
//$email = "darkh_0420@163.com";
//$psw = "123456";
//$usrname = "yydxtl";
function database_do($email, $psw){
    try{
        $conn = new PDO("mysql:host=localhost;dbname=mfp","root","971016");
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM mfp.userbasic WHERE email=?");

        $stmt->execute(array($email));
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if($result){
            $stmt = $conn->prepare("SELECT * FROM mfp.userbasic WHERE email=? AND password=?");
            $stmt->execute(array($email,$psw));
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                return 0;
            }
            else{
                return 1;
            }
        }
        else{
            return 2;
        }
//        $stmt->setFetchMode(PDO::FETCH_COLUMN);
//        if($stmt->fetchColumn()){
//            $stmt = $conn->prepare("SELECT * FROM mfp.userbasic WHERE email = :email, psw = :psw");
//            $stmt->bindParam(':email',$email);
//            $stmt->bindParam(':psw',$psw);
//            $stmt->setFetchMode(PDO::FETCH_COLUMN);
//            if($stmt->fetchColumn()){
//                return 0;
//            }
//            else{
//                echo 1;
//            }
//        }
//        else{
//            echo 2;
//        }
//        $conn = null;
    }
    catch (PDOException $e){
        echo $e->getMessage();
    }
}

//func();
//function func(){

//}

?>
