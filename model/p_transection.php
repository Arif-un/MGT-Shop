<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 3/13/2018
 * Time: 12:37 PM
 */

include_once "database.php";
class p_transection
{


    public function insert_tmp($data)
    {
        $db = new database();

        $sql = "INSERT INTO `p_transection_tmp`(`date`,cus_name,pd_name,pd_code,quantity,unit,payment,price,amount,invoice_no,delivary_invoice_no) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $db->con->prepare($sql);

        $stmt->bindParam(1, $data['date']);
        $stmt->bindParam(2, $data['cus_name']);
        $stmt->bindParam(3, $data['pdt_name']);
        $stmt->bindParam(4, $data['code']);
        $stmt->bindParam(5, $data['quantity']);
        $stmt->bindParam(6, $data['unit']);
        $stmt->bindParam(7, $data['payment']);
        $stmt->bindParam(8, $data['price']);
        $stmt->bindParam(9, $data['amount']);
        $stmt->bindParam(10, $data['invoice_no']);
        $stmt->bindParam(11, $data['delivary_invoice_no']);

        $stmt->execute();
    }

    public function invoice_no()
    {
        $db = new database();

        $sql = "SELECT id FROM `p_cus_total_tran` ORDER BY `p_cus_total_tran`.`id` DESC LIMIT 1";

        $stmt = $db->con->prepare($sql);

        $stmt->execute();

        $rs=$stmt->fetch(PDO::FETCH_COLUMN);
        return $rs;
    }

    public function all_tmp()
    {
        $db = new database();

        $sql = "SELECT * FROM `p_transection_tmp` ORDER BY `p_transection_tmp`.`id` asc";

        $stmt = $db->con->prepare($sql);

        $stmt->execute();

        $rs=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }

    public function delete()
    {
        $db = new database();

        $sql = "TRUNCATE TABLE `p_transection_tmp`";

        $stmt = $db->con->prepare($sql);

        $stmt->execute();
    }

    public function sum()
    {
        $db = new database();

        $sql = "select sum(amount) from p_transection_tmp";

        $stmt = $db->con->prepare($sql);

        $stmt->execute();

        $rs=$stmt->fetch(PDO::FETCH_COLUMN);
        return $rs;
    }

    public function final_transaction()
    {
        $db = new database();

        $sql = "insert into `p_transaction` (`date`,cus_name,pd_name,pd_code,quantity,unit,payment,price,amount,invoice_no,delivary_invoice_no) select `date`,cus_name,pd_name,pd_code,quantity,unit,payment,price,amount,invoice_no,delivary_invoice_no from p_transection_tmp";

        $stmt = $db->con->prepare($sql);

        $stmt->execute();
    }

    public function transactions($date,$cus_name,$in_no)
    {
        $db = new database();

        $sql = "SELECT * FROM `p_transaction` WHERE date= ? AND cus_name= ? AND invoice_no= ?";

        $stmt = $db->con->prepare($sql);
        $stmt->bindParam(1,$date);
        $stmt->bindParam(2,$cus_name);
        $stmt->bindParam(3,$in_no);

        $stmt->execute();

        $rs=$stmt->fetchall(PDO::FETCH_ASSOC);
        return $rs;
    }

    public function checkProductExistence($pd_name)
    {
        $db = new database();

        $sql = "SELECT * FROM `p_transection_tmp` WHERE `pd_name` = ?";

        $stmt = $db->con->prepare($sql);
        $stmt->bindParam(1,$pd_name);

        $stmt->execute();

        $rs=$stmt->fetch(PDO::FETCH_COLUMN);
        return $rs;
    }
}
