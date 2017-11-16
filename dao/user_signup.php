<?php
/**
 * Created by PhpStorm.
 * User: Gao
 * Date: 2017/10/16
 * Time: 11:05
 */
function database_write($email, $psw){
    $conn = new PDO("mysql:host=localhost;dbname=mfp","root","971016");
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO mfp.userbasic(email,password,username) VALUES (?,?,?)");

    $stmt->execute(array($email,$psw,null));
    //$result=$stmt->fetch();

    //return $result;
}

//Database process main logic.
function database_do($email, $psw){
    try{
        $conn = new PDO("mysql:host=localhost;dbname=mfp","root","971016");
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM mfp.userbasic WHERE email=?");

        $stmt->execute(array($email));
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!$result){
           database_write($email, $psw);
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