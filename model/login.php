<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 4/2/2018
 * Time: 12:01 PM
 */
include_once "database.php";

class login
{

    public function allUser()
    {
        $db = new database();

        $sql = "SELECT * FROM `login`";

        $stmt = $db->con->prepare($sql);

        $stmt->execute();

        $RS = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $RS;
    }


    public function updateInfo($email, $username, $id)
    {
        $db = new database();

        $sql = " UPDATE `login` SET `email`=?,`username`=? WHERE id= ?";

        $stmt = $db->con->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $username);
        $stmt->bindParam(3, $id);
        $stmt->execute();
    }


    public function updatepass($email, $username, $pass, $id)
    {
        $db = new database();

        $sql = "UPDATE `login` SET `email`=?,`username`=?,`pass`=? WHERE id = ?";

        $stmt = $db->con->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $username);
        $stmt->bindParam(3, $pass);
        $stmt->bindParam(4, $id);
        $stmt->execute();
    }

    public function chkPass($pass='123')
    {
        $db = new database();

        $sql = "SELECT * FROM `login` WHERE `pass`= ?";

        $stmt = $db->con->prepare($sql);
        $stmt->bindParam(1, $pass);
        $stmt->execute();
        $rs= $stmt->fetch(PDO::FETCH_ASSOC);
        return$rs;
    }

    public function logiin($mail,$pass)
    {
        $db = new database();

        $sql = "SELECT * FROM `login` WHERE `pass`='$pass' AND `email`= '$mail' Or `username`= '$mail'";

        $stmt = $db->con->prepare($sql);
        $stmt->execute();
        $rs= $stmt->fetch(PDO::FETCH_ASSOC);
        return$rs;
    }
}
