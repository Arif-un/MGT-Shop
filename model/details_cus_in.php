<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 3/25/2018
 * Time: 12:00 PM
 */
include_once "database.php";
class details_cus_in
{
    public function checkProductExistence($date,$cusname,$invoice,$pd_name)
    {
        $db = new database();

        $sql = "SELECT * FROM `transaction` WHERE `date`= ? AND `cus_name`= ? AND `invoice_no` = ? AND `pd_name`= ?";

        $stmt = $db->con->prepare($sql);
        $stmt->bindParam(1,$date);
        $stmt->bindParam(2,$cusname);
        $stmt->bindParam(3,$invoice);
        $stmt->bindParam(4,$pd_name);

        $stmt->execute();

        $rs=$stmt->fetch(PDO::FETCH_COLUMN);
        return $rs;
    }
    public function insert($data)
    {
        $db = new database();

        $sql = "INSERT INTO `transaction`(`date`,cus_name,pd_name,pd_code,quantity,unit,payment,price,amount,invoice_no,delivary_invoice_no) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

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

    public function total($invoice)
    {
        $db = new database();

        $sql = "SELECT sum(amount) as total FROM `transaction` WHERE invoice_no='$invoice'";

        $stmt = $db->con->prepare($sql);
        $stmt->bindParam(1,$invoice);
        $stmt->execute();

        $rs=$stmt->fetch(PDO::FETCH_ASSOC);
        return $rs;
    }

    public function discount($invoice)
    {
        $db = new database();

        $sql = "SELECT `discount` FROM `cus_total_tran` WHERE `id`='$invoice'";

        $stmt = $db->con->prepare($sql);
        $stmt->bindParam(1,$invoice);
        $stmt->execute();

        $rs=$stmt->fetch(PDO::FETCH_ASSOC);
        return $rs;
    }

    public function update_amnt($total,$dis,$vat,$n_total,$id)
    {
        $db = new database();

        $sql = "UPDATE `cus_total_tran` SET `total`=?,`discount`=?,`vat`=?,`net_total`=? WHERE `id`= ?";

        $stmt = $db->con->prepare($sql);
        $stmt->bindParam(1,$total);
        $stmt->bindParam(2,$dis);
        $stmt->bindParam(3,$vat);
        $stmt->bindParam(4,$n_total);
        $stmt->bindParam(5,$id);
        $stmt->execute();
    }

    public function delete($id)
    {
        $db = new database();

        $sql = "DELETE FROM `transaction` WHERE `id` = '$id'";

        $stmt = $db->con->prepare($sql);
        $stmt->execute();

    }

    public function edit($quan,$price,$amount,$id)
    {
        $db = new database();

        $sql = "UPDATE `transaction` SET `quantity`=?,`price`=?,`amount`=? WHERE id= ?";

        $stmt = $db->con->prepare($sql);
        $stmt->bindParam(1,$quan);
        $stmt->bindParam(2,$price);
        $stmt->bindParam(3,$amount);
        $stmt->bindParam(4,$id);
        $stmt->execute();

    }

    public function update($payment,$del,$dis,$invoice)
    {
        $db = new database();

        $sql = "UPDATE `transaction` SET `payment`='$payment',`delivary_invoice_no`='$del' WHERE invoice_no= '$invoice'";

        $stmt = $db->con->prepare($sql);

        $stmt->execute();


        $sql2 = "UPDATE `cus_total_tran` SET `discount`='$dis',`payment`='$payment',`delivary_invoice_no`='$del' WHERE id='$invoice'";

        $stmt2 = $db->con->prepare($sql2);

        $stmt2->execute();

    }
}