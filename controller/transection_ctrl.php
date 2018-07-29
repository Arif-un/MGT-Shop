<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 3/13/2018
 * Time: 12:36 PM
 */
include_once "../model/transection.php";

$obj =new transection();
//$data=json_decode($_POST,true);
//print_r($_POST);
if(array_key_exists('pdt_name',$_POST)){
    echo "here";
    $obj->insert_tmp($_POST);

}

if(isset( $_POST['amnt'])){
    $sum=$obj->sum();
    echo $sum;
}
if(isset( $_POST['save'])){
    $obj->final_transaction();
    echo "success";
}
if(isset( $_POST['chekPdEx'])){
    $data=$obj->checkProductExistence($_POST['chekPdEx']);
    echo $data;
   // echo "chk";
}
else{
    $data=$obj->all_tmp();
    /*echo json_encode($data);*/}




