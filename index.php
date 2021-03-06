<?php
defined('ROOT') || define('ROOT',realpath(dirname(__FILE__)));
const DS = DIRECTORY_SEPARATOR;
include_once ROOT.DS.'config'.DS.'config.php';
include_once ROOT.DS.'config'.DS.'dbconfig.php';
include_once ROOT.DS.'helpers'.DS.'core_helper.php'; 
include_once ROOT.DS.'library'.DS.'ti.php';
include_once ROOT.DS.'library'.DS.'unit_test.php';
include_once ROOT.DS.'library'.DS.'vendor'.DS.'autoload.php';

/*global variables*/
define('base_url', $base_url);
/*end global variables*/

header('Access-Control-Allow-Origin: *');
$router = new \Bramus\Router\Router(); 
/*
 * Note To Dev: please read the routing documentation here https://github.com/bramus/router
*/
$request = trim($_SERVER['REQUEST_URI'], "/");
$url = explode('/', $request);
$segment_0 = (isset($url[0])) ? $url[0] : '';
$segment_1 = (isset($url[1])) ? $url[1] : '';
$segment_2 = (isset($url[2])) ? $url[2] : '';
$segment_3 = (isset($url[3])) ? $url[3] : '';
$segment_4 = (isset($url[4])) ? $url[4] : '';

$requested_url = '';
if(isset($url[1])){
    if(strstr($segment_1, '?', true)){
        $requested_url .= '/'.strstr($segment_1, '?', true);
    }else{
        $requested_url .= '/'.$segment_1;
    }
}

if(isset($url[2])){
    if(strstr($segment_2, '?', true)){
        $requested_url .= '/'.strstr($segment_2, '?', true);
    }else{
        $requested_url .= '/'.$segment_2;
    }
}

if(isset($url[3])){
    if(strstr($segment_3, '?', true)){
        $requested_url .= '/'.strstr($segment_3, '?', true);
    }else{
        $requested_url .= '/'.$segment_3;
    }
}

if(isset($url[4])){
    if(strstr($segment_4, '?', true)){
        $requested_url .= '/'.strstr($segment_4, '?', true);
    }else{
        $requested_url .= '/'.$segment_4;
    }
}


/* --- controller route --- */
$router->match('GET|POST', '/controller/add-book([a-z0-9_-]+)?', function() {
    require ROOT.DS.'controllers'.DS.'add_book_listing_controller.php';
});
 

/* --- views route --- */
$router->get('', function() {
    require ROOT.DS.'views'.DS.'book.php';
});

$router->get('/', function() {
    require ROOT.DS.'views'.DS.'book.php';
});

$router->get('/home', function() {
    require ROOT.DS.'views'.DS.'book.php';
});


$router->run();

