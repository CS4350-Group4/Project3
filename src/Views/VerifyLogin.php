<?php
/**
 * Created by PhpStorm.
 * User: Clinton
 * Date: 3/28/2015
 * Time: 3:09 AM
 */

namespace Views;


use Common\Authentication\FileBased;
use Common\Authentication\InMemory;
use Common\Authentication\InMySQL;
use Common\Authentication\InSqLite;

class VerifyLogin extends View
{
    public function __construct()
    {
        $this->content = <<<VERIFYLOG
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Verify Login</title>
        <link rel="stylesheet" type="text/css" href="css/Style1.css">
    </head>
    <body>
        <div align="center">
VERIFYLOG;


        $this->show();
        $authtype='';
        if($_POST['authenticationType']=== "InMemory")
        {
            $authtype= new InMemory();
        }
        if($_POST['authenticationType']=== "InFile")
        {
            $authtype= new FileBased();
        }
        if($_POST['authenticationType']=== "InMySQL")
        {
            $authtype= new InMySQL();
        }
        if($_POST['authenticationType']==="InSqLite")
        {
            $authtype= new InSqLite();
        }
        echo 'Authentication by: '. $_POST['authenticationType'].'<br>';
        $authtype->authenticate($_POST['username'],$_POST['password']);
        echo "</div>
</body>
</html>";
    }

}