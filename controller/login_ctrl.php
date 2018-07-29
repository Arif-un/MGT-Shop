<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 4/1/2018
 * Time: 11:10 PM
 */
include_once "../model/login.php";
$obj = new login();
session_start();
print_r($_POST);
if(isset($_POST['login_id'])){
    $rs=$obj->logiin($_POST['login_id'],$_POST['pass']);
    if ($rs == false) {

        header('Location:../index.html');
    } else {
        echo "here";
       $_SESSION['login']['username']=$_POST['login_id'];
        header('Location:../index.php');
    }
}
else if(isset($_POST['oldPass'])) {
    if ($_POST['oldPass'] != "" && $_POST['newPass'] != "") {
        $r = $obj->chkPass($_POST['oldPass']);
        if ($r == false) {
            $_SESSION['msg'] = 2;
            header('Location:../view/user.php');
        } else {
            $obj->updatepass($_POST['mail'], $_POST['name'], $_POST['newPass'], $_POST['id']);
            $_SESSION['msg'] = 1;
            header('Location:../view/user.php');
        }
    }

    }
    else if (isset($_POST['oldPass'])) {
        if ($_POST['id'] != "") {
            $obj->updateInfo($_POST['mail'], $_POST['name'], $_POST['id']);
            $_SESSION['msg'] = 1;
            header('Location:../view/user.php');
        }
    }


