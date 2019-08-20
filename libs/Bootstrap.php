<?php

class Bootstrap
{
    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, "/");
        $url = explode("/", $url);

        if (empty($url[0]))
        {
            require_once 'controllers/Index.php';
            $controller = new Index();
            $controller->loadModel('Index');
            $controller->index();
            return false;
        }

        $file = 'controllers/'.$url[0].'.php';

        if (file_exists($file))
        {
            require_once $file;
        }
        else
        {
            require_once 'controllers/Err.php';
            $controller = new Err();
            return false;
        }

        $controller = new $url[0];
        $controller->loadModel($url[0]);


        try
        {
            if (isset($url[2]))
            {
                if (method_exists($controller, $url[1]))
                {
                    $controller-> {$url[1]}($url[2]);
                }
            }
            else
            {
                if (isset($url[1]))
                {

                    if (method_exists($controller, $url[1]))
                    {
                        $controller->{$url[1]}();
                    }
                    else
                    {

                        $controller->index();
                    }
                }
                else
                {
                    $controller->index();
                }
            }
        }
        catch (Exception $exception)
        {
            echo "Napotkano problem";
            print_r($exception);
            die();
        }
    }

}