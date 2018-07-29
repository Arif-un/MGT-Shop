<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 4/2/2018
 * Time: 10:29 PM
 */

session_start();
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
session_regenerate_id(true);
header('Location:../index.html');