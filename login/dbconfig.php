<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ultraphatty
 * Date: 08/08/2016
 * Time: 21:44
 */

  $db_host = "localhost";
  $db_name = "dbregistration";
  $db_user = "root";
  $db_pass = "";

  try{

   $db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
   $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
 ?>