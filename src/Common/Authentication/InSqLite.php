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
        $dbh='';
        try
        {
            $dbh = new PDO("sqlite:../src/Data/sqliteDB");
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        $query ="Select username, password from users";
        $results = $dbh->query($query);
        while($row = $results->fetch(PDO::FETCH_ASSOC))
        {
            if($row["username"]=== $username && $row["password"] === $password)
            {
                $results->closeCursor();
                echo 'Login Successful for '.$username;
                return http_response_code(200);
            }
        }
        $results->closeCursor();
        echo 'Login Failed!';
        return http_response_code(401);
    }


}