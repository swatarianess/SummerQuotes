<?php
/**
 * Created by IntelliJ IDEA.
 * User: Steve
 * Date: 08/08/2016
 * Time: 21:44
 */

session_start();

  $db_host = "localhost";
  $db_user = "sec_user";
  $db_pass = "12345678**";
  $db_name = "projectsd";

  try{

   $db_con = new PDO("mysql:hoast={$db_host};dbname={$db_name}",$db_user,$db_pass);
   $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e){
   die($e->getMessage());
  }

include_once 'class.user.php';
$user = new USER($db_con);
