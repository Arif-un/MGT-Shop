<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 3/15/2018
 * Time: 2:14 PM
 */

require_once "database.php";
class total_sale
{

    public function insert($data)
    {
        $db = new database();

        $sql = "INSERT INTO `cus_total_tran`(`cus_name`, `trn`, `date`, `total`, `discount`, `vat`, `net_total`, `payment`,delivary_invoice_no) VALUES (?,?,?,?,?,?,?,?,?)";

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

        $stmt->execute();
    }

    public function totalDataByDate($from,$to)
    {
        $db = new database();

        $sql = "SELECT * FROM `cus_total_tran` WHERE date BETWEEN ? AND ?";

        $stmt = $db->con->prepare($sql);

        $stmt->bindParam(1, $from);
        $stmt->bindParam(2, $to);

        $stmt->execute();
        $rs=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }

    public function totalDataByDateByCus($from,$to,$cus_name)
    {
        $db = new database();

        $sql = "SELECT * FROM `cus_total_tran` WHERE date BETWEEN ? AND ? AND cus_name=?";

        $stmt = $db->con->prepare($sql);

        $stmt->bindParam(1, $from);
        $stmt->bindParam(2, $to);
        $stmt->bindParam(3, $cus_name);

        $stmt->execute();
        $rs=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }


    public function totalSumByDate($from,$to)
    {
        $db = new database();

        $sql = "SELECT COUNT(id) as tota_tran,SUM(total) as total,SUM(discount) as total_discount,SUM(vat) as total_vat,SUM(net_total) as all_total FROM `cus_total_tran` WHERE date BETWEEN ? AND ?";

        $stmt = $db->con->prepare($sql);

        $stmt->bindParam(1, $from);
        $stmt->bindParam(2, $to);

        $stmt->execute();
        $rs=$stmt->fetch(PDO::FETCH_ASSOC);
        return $rs;
    }

    public function totalSumByDateByCus($from,$to,$cus_name)
    {
        $db = new database();

        $sql = "SELECT COUNT(id) as tota_tran,SUM(total) as total,SUM(discount) as total_discount,SUM(vat) as total_vat,SUM(net_total) as all_total FROM `cus_total_tran` WHERE date BETWEEN ? AND ? AND cus_name=?";

        $stmt = $db->con->prepare($sql);

        $stmt->bindParam(1, $from);
        $stmt->bindParam(2, $to);
        $stmt->bindParam(3, $cus_name);

        $stmt->execute();
        $rs=$stmt->fetch(PDO::FETCH_ASSOC);
        return $rs;
    }

    public function all_tran()
    {
        $db = new database();

        $sql = "select * from cus_total_tran";

        $stmt = $db->con->prepare($sql);

        $stmt->execute();

        $rs=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }

}