<?php
/**
 * Created by IntelliJ IDEA.
 * User: Gao
 * Date: 2017/10/18
 * Time: 22:52
 */
include '../dao/file_process.php';
function database_write($email, $psw, $ip, $owner){
    $conn = new PDO("mysql:host=localhost;dbname=mfp","root","971016");
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO mfp.content(name,password,server_ip,owner) VALUES (?,?,?,?)");

    $stmt->execute(array($email,$psw,$ip, $owner));
    //$result=$stmt->fetch();

    //return $result;
}

//Database process main logic.
function database_do($email, $psw, $ip, $owner){
    try{
        $conn = new PDO("mysql:host=localhost;dbname=mfp","root","971016");
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM mfp.content WHERE name=?");

        $stmt->execute(array($email));
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!$result){
            file_pro($email, $psw, "l2tp");
            database_write($email, $psw, $ip, $owner);
            return 0;
        }
        else{
            return 1;
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
