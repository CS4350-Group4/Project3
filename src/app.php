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

//Webservice Landing page.
$app->get('/', function()
{

});

//End point to web authenticate user to our webservice.
$app->post('/auth', function()
{
    new \Views\VerifyLogin();
});




//Create API End Points

//Landing API page
$app->get('/api/', function()
{
    require_once realpath(__DIR__.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'API_Directions.html');
});

//Gain access to use API
$app->get('/api/access', function()
{
   //TODO: code to gain access to api sites.
});

//Authentication point for our webservice
$app->post('/api/auth', function()
{
    $test = new \Common\Authentication\InSqLite();
    $response = $test->authenticate(htmlentities($_POST['username']),htmlentities($_POST['password']));
    return $response;
});

//Authentication point for twitter.... Needed or embedded function?
$app->post('/api/twitter', function()
{
    //TODO: code to access twitter.
});


$app->run();