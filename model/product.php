<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 3/11/2018
 * Time: 10:23 AM
 */
include_once "database.php";
class product
{


    public function insert($data)
    {
        $db = new database();

        $sql = "INSERT INTO `product`(`product_name`,product_code,unit,price) VALUES (?,?,?,?)";

        $stmt = $db->con->prepare($sql);

        $stmt->bindParam(1,$data['pd_name']);
        $stmt->bindParam(2,$data['pd_code']);
        $stmt->bindParam(3,$data['unit']);
        $stmt->bindParam(4,$data['price']);

        $stmt->execute();
    }

    public function all()
    {
        $db = new database();

        $sql = "SELECT * from product";

        $stmt = $db->con->prepare($sql);

        $stmt->execute();

        $rs=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    public function get_product_info($name)
    {
        $db = new database();

        $sql = "select * from product where product_name=?";

        $stmt = $db->con->prepare($sql);
        $stmt->bindParam(1,$name['pdt_name']);
        $stmt->execute();

        $rs=$stmt->fetch(PDO::FETCH_ASSOC);

        return $rs;
    }


    public function chexkExist($name,$code)
    {
        $db = new database();

        $sql = "SELECT * FROM `product` WHERE `product_name` = '$name' OR `Product_code`= '$code'";

        $stmt = $db->con->prepare($sql);

        $stmt->execute();

        $rs=$stmt->fetch(PDO::FETCH_COLUMN);

        return $rs;
    }

    public function update($data)
    {
        $db = new database();

        $sql = "UPDATE `product` SET `product_name`= ? ,`Product_code`= ?,`unit`= ?,`price`= ? WHERE  `id` = ?";

        $stmt = $db->con->prepare($sql);
        $stmt->bindParam(1,$data['u_pd_name']);
        $stmt->bindParam(2,$data['u_pd_code']);
        $stmt->bindParam(3,$data['u_unit']);
        $stmt->bindParam(4,$data['u_price']);
        $stmt->bindParam(5,$data['u_id']);
        $stmt->execute();
    }

    public function delete_pd($pd)
    {
        $db = new database();

        $sql = "DELETE FROM `product` WHERE `product_name`='$pd'";

        $smt = $db->con->prepare($sql);

        $smt->execute();

    }

}