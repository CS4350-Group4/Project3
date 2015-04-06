<?php
/**
 * Created by PhpStorm.
 * User: Clinton
 * Date: 3/17/2015
 * Time: 6:44 PM
 */

namespace Common\Authentication;

use PDO;

class InSqLite implements IAuthentication
{

    protected $dbh;
    protected $responsecode;

    public function __construct()
    {
        $this->responsecode = 401;
        try
        {
            $this->dbh = new PDO("sqlite:../src/Data/sqliteDB");
        }
        catch(PDOException $e)
        {
            $this->responsecode = 500;
        }
    }
    /**
     * Function authenticate
     *
     * @param string $username
     * @param string $password
     * @return mixed
     *
     * @access public
     */
    public function authenticate($username, $password)
    {
        //$dbh='';
        //$responsecode = 401;

        $query ="Select username, password from users";
        $results = $this->dbh->query($query);
        while($row = $results->fetch(PDO::FETCH_ASSOC))
        {
            if($row["username"]=== $username && $row["password"] === $password)
            {
                $this->responsecode = 200;
                //echo 'Login Successful for '.$username;
            }
        }
        $results->closeCursor();
        //echo 'Login Failed!';
        return $this->responsecode;
    }

    /**
     * Function verify access
     *
     *
     */
    public function verifyAccess($accesskey)
    {
        $query = "Select * from accesskeys where key ='".$accesskey."'";
        echo $query;
        $results = $this->dbh->query($query);
        echo $results->rowCount();
        if($results->rowCount() > 0)
        {
            $results->closeCursor();
            return true;
        }
        $results->closeCursor();
        return false;
    }

}