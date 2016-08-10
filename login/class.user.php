<?php
class USER
{
    private $db;

    function __construct($db_con)
    {
        $this->db = $db_con;
    }

    public function register($uname,$umail,$upass)
    {
        try
        {
            $new_password = password_hash($upass, PASSWORD_DEFAULT);

            $stmt = $this->db->prepare("INSERT INTO tbl_users(user_name,user_email,user_password,joining_date) 
                                                       VALUES(:uname, :umail, :upass, NOW())");

            $stmt->bindparam(":uname", $uname);
            $stmt->bindparam(":umail", $umail);
            $stmt->bindparam(":upass", $new_password);
            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function login($uname,$umail,$upass)
    {
        try
        {
            $stmt = $this->db->prepare("SELECT * FROM tbl_users WHERE user_name=:uname OR user_email=:umail LIMIT 1");
            $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0)
            {
                if(password_verify($upass, $userRow['user_password']))
                {
                    $_SESSION['user_session'] = $userRow['user_id'];
                    $_SESSION['user_level'] = $userRow['user_level'];
                    $_SESSION['alert_count'] = 0;
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function remove(){

        if(isset($_Session['user_session'])){
            //Logged in
            if($_SESSION['user']);
        }
        //TODO remove user
    }

    public function is_loggedin()
    {
        if(isset($_SESSION['user_session']))
        {
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

    public function getUserType(){
        if(isset($_SESSION)) {
            switch ($_SESSION['user_level']) {
                case 2:
                    return 'Elevated';
                    break;
                case 3:
                    return 'Admin';
                    break;
                default:
                    return 'Members';
                    break;
            }
        } else {
            echo 'error';
        }
    }
}
