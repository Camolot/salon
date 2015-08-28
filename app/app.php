<?php
    require_once __DIR__."/../vendor/autoload.php";
    //require_once __DIR__."/../"
    //require_once

    $app = new Silex\Application();
    $app['debug'] = true;

    $server = 'mysql:localhost;dbname=salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
      'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();
?>
