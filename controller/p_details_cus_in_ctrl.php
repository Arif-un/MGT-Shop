<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 3/25/2018
 * Time: 12:00 PM
 */

include_once "../model/p_details_cus_in.php";

$obj =new p_details_cus_in();
//$data=json_decode($_POST,true);
//print_r($_POST);

if(array_key_exists('chekPdEx',$_POST)){
    $data=$obj->checkProductExistence($_POST['chekPdEx'],$_POST['cus_name'],$_POST['invoice'],$_POST['pd_name']);
    echo $data;
}

if(array_key_exists('pdt_name',$_POST)){

    $obj->insert($_POST);
    echo "ok";
}
if(array_key_exists('del',$_POST)){
    $obj->delete($_POST['del']);
    echo "deleted";
}
if(array_key_exists('id_edit',$_POST)){
    $amnt=$_POST['quan']*$_POST['rate'];
    $obj->edit($_POST['quan'],$_POST['rate'],$amnt,$_POST['id_edit']);
    echo "edited";
}
if(array_key_exists('updateInvoice',$_POST)){

    $obj->update($_POST['payment'],$_POST['del_in'],$_POST['dis'],$_POST['updateInvoice']);
    echo "updated";
}
/*else{
    $data=$obj->all_tmp();
    echo json_encode($data);}*/