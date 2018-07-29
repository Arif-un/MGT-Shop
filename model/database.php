<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 3/10/2018
 * Time: 7:52 PM
 */

class database{
    public $con;
     public function __construct(){

         /*try {
             $dir = "sqlite:".realpath(dirname(__FILE__)). "\invoice_data.db";
             // echo $dir ;
             //open the database
             $this->con = new PDO($dir);
             $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

             //echo "success";
         }
         catch (PDOException $e){
             print_r($e->getMessage());
         }*/
         {
             $server = "localhost";
             $username = "root";
             $password = "";

             try {
                 $this->con = new PDO("mysql:host=$server;dbname=shop", $username, $password);

                 $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                 //echo "Connected successfully";
             }
             catch (PDOException $err) {
                 echo "Connection failed: " . $err->getMessage();
             }
         }
}
}



