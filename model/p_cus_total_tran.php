<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 3/15/2018
 * Time: 2:14 PM
 */

require_once "database.php";

class p_cus_total_tran
{

    public function insert($data)
    {
        $db = new database();

        $sql = "INSERT INTO `p_cus_total_tran`(`cus_name`, `trn`, `date`, `total`, `discount`, `vat`, `net_total`, `payment`,delivary_invoice_no,cus_in_date) VALUES (?,?,?,?,?,?,?,?,?,?)";

        $stmt = $db->con->prepare($sql);

        $stmt->bindParam(1, $data['cus_name']);
        $stmt->bindParam(2, $data['trn']);
        $stmt->bindParam(3, $data['date']);
        $stmt->bindParam(4, $data['total']);
        $stmt->bindParam(5, $data['discount']);
        $stmt->bindParam(6, $data['vatt']);
        $stmt->bindParam(7, $data['net_total']);
        $stmt->bindParam(8, $data['payment']);
        $stmt->bindParam(9, $data['delivary_invoice_no']);
        $stmt->bindParam(10, $data['cus_in_date']);

        $stmt->execute();
    }

    public function dlt_tmp($data)
    {
        $db = new database();

        $sql = "DELETE FROM `p_transection_tmp` WHERE pd_name=? limit 1";

        $stmt = $db->con->prepare($sql);

        $stmt->bindParam(1, $data['pdt_dlt']);

        $stmt->execute();
    }

    public function all_tran()
    {
        $db = new database();

        $sql = "select * from p_cus_total_tran";

        $stmt = $db->con->prepare($sql);

        $stmt->execute();

        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }

    public function delete_invoice($in_no)
    {
        $db = new database();

        $sql = "DELETE FROM `p_transaction` WHERE `invoice_no`= '$in_no'";

        $stmt = $db->con->prepare($sql);

        $stmt->execute();

        $sql2 = "DELETE FROM `p_cus_total_tran` WHERE `id`='$in_no'";

        $smt = $db->con->prepare($sql2);

        $smt->execute();

    }

    public function invoiceInfo($in_no)
    {
        $db = new database();

        $sql = "SELECT * FROM `p_cus_total_tran` WHERE `id`= '$in_no'";

        $stmt = $db->con->prepare($sql);

        $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }

}