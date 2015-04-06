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
	require_once realpath(__DIR__.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'LoginForm.html');
});

//End point to web authenticate user to our webservice.
$app->post('/auth', function()
{
    $check = new \Common\Authentication\InSqLite();
    $check->authenticate(htmlentities($_POST['username']),htmlentities($_POST['password']));
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
$app->post('/api/auth',  function() use($app)
{
    $test = new \Common\Authentication\InSqLite();
    $response = 401;
    //echo $_POST['accesskey'];
    //if($test->verifyAccess("access987654321"))
    //{
        $response = $test->authenticate(htmlentities($_POST['username']), htmlentities($_POST['password']));
    //}
    if($response == 200)
    {
        return $app->response->status(200);
    }
    if($response == 401)
    {
        return $app->response->status(401);
    }
    return $app->response->status(500);
});

//Authentication point for twitter.... Needed or embedded function?
$app->post('/api/twitter', function() use($app)
{
    //TODO: code to access twitter.
});


$app->run();