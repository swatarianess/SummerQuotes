<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ultraphatty
 * Date: 10/08/2016
 * Time: 10:29
 */
class QUOTE
{

    public function newQuote()
    {
        try {
            //TODO: Insert New Quotes into Database
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function editQuote()
    {
        //TODO: Update existing quote into Database
    }

    public function deleteQuote($user_level)
    {
        if($user_level > 1){
            //TODO: Allow [Admin/Mod] to delete quote From database.

        } else {
            //Do nothing
        }
    }

}