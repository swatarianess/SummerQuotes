<?php
session_start();

include_once 'dbconfig.php';
$user_id = $_SESSION['user_session'];
$quoteID = $_POST['quoteID'];

try {

    $stmt = $this->db->prepare("DELETE FROM tbl_quote where id_quote =:id AND quotePoster =:userN");
    $stmt->bindParam(":id",$quoteID);
    $stmt->bindParam(":userN",$user_id);

    if ($stmt->execute()) {
        echo ('<script>alert("Successfully Added")</script>');
        header("Location: /handlers/quoteRemove.php");
    } else {
        echo ('<script>alert("Nothing")</script>');
        header('Location: /handlers/quoteRemove.php');
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
