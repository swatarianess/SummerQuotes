<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ultraphatty
 * Date: 08/08/2016
 * Time: 21:49
 */
 session_start();
 unset($_SESSION['user_session']);

 if(session_destroy())
 {
     header("Location: login.php");
 }
