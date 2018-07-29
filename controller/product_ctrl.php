<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 3/11/2018
 * Time: 10:37 AM
 */

require_once "../model/product.php";

$obj = new product();

session_start();
//print_r($_POST);
if (isset($_POST['pd_name'])) {

    $data = $obj->chexkExist($_POST['pd_name'], $_POST['pd_code']);
    if ($data === false) {
        $obj->insert($_POST);

        $_SESSION['msg'] = 1;
        header('Location:../view/product.php');
    } else {
        echo "<h1 style=\"text-align: center;margin-top: 20px\">Product Already Exist !!</h1>";
    }

}
if (array_key_exists('pdt_name',$_POST)) {
    //echo "sdss";
    $jsonformat = json_encode($obj->get_product_info($_POST));
    print_r($jsonformat);
}
if (array_key_exists('u_pd_name',$_POST)) {
    //print_r($_POST);
    $obj->update($_POST);
    $_SESSION['msg'] = 1;
    header('Location:../view/product.php');
}

if (array_key_exists('pd_del',$_POST)) {

    $obj->delete_pd($_POST['pd_del']);
    echo "deleted";
}

