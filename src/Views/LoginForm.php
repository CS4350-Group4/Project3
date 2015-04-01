<?php

namespace Views;


class LoginForm extends View
{
    public function __construct()
    {
        $this->content = <<<LOGIN_FORM
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Example Login Form</title>
        <link rel="stylesheet" type="text/css" href="css/Style1.css">
    </head>
    <body>
        <div align="center">
            <form method="POST" action="/auth">
                Username: <input type="text" name="username" size="15" /><br />
                Password: <input type="password" name="password" size="15" /><br />
                <br><b>Choose Authentication Method:</b><br>
                InFile <input type="radio" name="authenticationType" value="InFile" checked> InMemory <input type="radio" name="authenticationType" value="InMemory"><br>
                InMySQL <input type="radio" name="authenticationType" value="InMySQL">InSqLite <input type="radio" name="authenticationType" value="InSqLite"><br><br>
                <p><input type="submit" value="Login" /></p>
            </form>
        </div>
    </body>
</html>
LOGIN_FORM;
    }
}
