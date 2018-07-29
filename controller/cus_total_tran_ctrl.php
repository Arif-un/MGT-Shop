<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 3/15/2018
 * Time: 2:13 PM
 */

require_once "../model/cus_total_tran.php";
$obj = new cus_total_tran();
if(isset($_POST['vatt'])){
    $obj->insert($_POST);
}

if(isset($_POST['pdt_dlt'])){
    $obj->dlt_tmp($_POST);
}

if(isset($_POST['dlt_in'])){
    $obj->delete_invoice($_POST['dlt_in']);
    echo "deleted";
}
