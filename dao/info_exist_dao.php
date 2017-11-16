<?php
/**
 * Created by PhpStorm.
 * User: Gao
 * Date: 2017/10/16
 * Time: 17:02
 */
function business_check($email){
    try{
        $conn = new PDO("mysql:host=localhost;dbname=mfp","root","971016");
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM mfp.content WHERE owner=?");

        $stmt->execute(array($email));
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if($result){
            return $result;
        }
        else{
            return 0;
        }
    }
    catch (PDOException $e){
        echo $e->getMessage();
    }
}
