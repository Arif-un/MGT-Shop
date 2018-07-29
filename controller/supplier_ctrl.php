<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 3/11/2018
 * Time: 2:17 PM
 */

include_once "../model/supplier.php";
$obj =new supplier();


if (array_key_exists('u_name',$_POST)){
    // print_r($_POST);
$obj->update($_POST);
$_SESSION['msg'] = 1;
header('Location:../view/supplier.php');
}
elseif (array_key_exists('u_del_id',$_POST)){
    // print_r($_POST);
$obj->delete($_POST);
$_SESSION['msg'] = 1;
header('Location:../view/supplier.php');
}
elseif (array_key_exists('name',$_POST)){
    print_r($_POST);
    $obj->insert($_POST);
    header('Location:../view/supplier.php');
}


elseif (array_key_exists('c_name',$_POST)){

    $jsonformat=json_encode($obj->get_trn($_POST));
    print_r($jsonformat);
}
elseif (array_key_exists('u_name',$_POST)){
    // print_r($_POST);
    $obj->update($_POST);
    $_SESSION['msg'] = 1;
    header('Location:../view/customer.php');
}
elseif (array_key_exists('u_del_id',$_POST)){
    // print_r($_POST);
    $obj->delete($_POST);
    $_SESSION['msg'] = 1;
    header('Location:../view/customer.php');
}
