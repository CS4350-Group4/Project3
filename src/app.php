<?php
/**
 * Created by PhpStorm.
 * User: Clinton
 * Date: 3/25/2015
 * Time: 7:47 PM
 */

/**
 * Create extensions to be used on web browser
 */



$app = new \Slim\Slim();

//Create HTTP End points
$app->get('/', function()
{
    $welcomeScreen = new \Views\LoginForm();
    $welcomeScreen->show();

});
$app->post('/auth', function()
{
    new \Views\VerifyLogin();
});

//Create API End Points
$app->post('/api/auth', function()
{
    $test = new \Common\Authentication\InMemory();
    $test->authenticate($_POST['username'],$_POST['password']);
});

$app->run();