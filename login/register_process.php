<?php
/**
 * Created by IntelliJ IDEA.
 * User: Steve
 * Date: 09/08/2016
 * Time: 15:23
 */
session_start();
require_once('dbconfig.php');

if(isset($_POST['btn-register'])) {
    $user_name = trim($_POST['']);
    $user_email = trim($_POST['user_email']);
    $user_password = trim($_POST['password']);
    $password = md5($user_password);

//TODO: Fix up, use PDO
// Check if e-mail address syntax is valid or not
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid Email";
    } else {
        $result = mysql_query("SELECT * FROM registration WHERE email='$email'");
        $data = mysql_num_rows($result);
        if (($data) == 0) {
            $query = mysql_query("insert into registration(name, email, password) values ('$name', '$email', '$password')"); // Insert query
            if ($query) {
                echo "You have Successfully Registered.....";
            } else {
                echo "Error....!!";
            }
        } else {
            echo "This email is already registered, Please try another email...";
        }
    }
    mysql_close($connection);

}

