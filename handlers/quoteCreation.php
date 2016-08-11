<?php
require_once 'dbconfig.php';

if($_POST)
{
    $quote_string = $_POST['quoteString'];
    $quote_Author = $_POST['quoteAuthor'];

    try{

        $stmt = $db_con->prepare("INSERT INTO tbl_quote(quoteString,quoteAuthor) VALUES(:quote_string,:quote_Author)");
        $stmt->bindParam(":ename", $quote_string);

        if($stmt->execute())
        {
            echo "Successfully Added";
        }
        else{
            echo "Query Problem";
        }
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}