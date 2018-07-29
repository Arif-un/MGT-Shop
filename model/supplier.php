<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 3/11/2018
 * Time: 2:17 PM
 */
include_once "database.php";
class supplier
{


    public function insert($data)
    {
        $db = new database();

        $sql = "INSERT INTO `supplier`(`name`,trn,phone,fax,email,c_person,adress,`type`) VALUES (?,?,?,?,?,?,?,?)";

        $stmt = $db->con->prepare($sql);

        $stmt->bindParam(1,$data['name']);
        $stmt->bindParam(2,$data['trn']);
        $stmt->bindParam(3,$data['phone']);
        $stmt->bindParam(4,$data['fax']);
        $stmt->bindParam(5,$data['email']);
        $stmt->bindParam(6,$data['c_person']);
        $stmt->bindParam(7,$data['adress']);
        $stmt->bindParam(8,$data['type']);

        $stmt->execute();
    }

    public function all()
    {
        $db = new database();

        $sql = "SELECT * from `supplier`";

        $stmt = $db->con->prepare($sql);

        $stmt->execute();

        $rs=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }

    public function update($data)
    {
        $db = new database();

        $sql = "UPDATE `supplier` SET `name`=?,`trn`=?,`phone`=?,`fax`=?,`email`=?,`c_person`=?,`adress`=?,`type`=? WHERE id=?";

        $stmt = $db->con->prepare($sql);

        $stmt->bindParam(1,$data['u_name']);
        $stmt->bindParam(2,$data['u_trn']);
        $stmt->bindParam(3,$data['u_phone']);
        $stmt->bindParam(4,$data['u_fax']);
        $stmt->bindParam(5,$data['u_email']);
        $stmt->bindParam(6,$data['u_c_person']);
        $stmt->bindParam(7,$data['u_adress']);
        $stmt->bindParam(8,$data['u_type']);
        $stmt->bindParam(9,$data['u_id']);

        $stmt->execute();
    }

    public function delete($data)
    {
        $db = new database();

        $sql = "DELETE FROM `supplier` WHERE id=?";

        $stmt = $db->con->prepare($sql);

        $stmt->bindParam(1,$data['u_del_id']);

        $stmt->execute();
    }



    /*############################################################################################
    #########################################################################################*/




    public function get_trn($name)
    {
        $db = new database();

        $sql = "select trn from supplier where name=?";

        $stmt = $db->con->prepare($sql);
        $stmt->bindParam(1,$name['c_name']);
        $stmt->execute();

        $rs=$stmt->fetch(PDO::FETCH_ASSOC);

        return $rs;
    }


}