<?php
include_once "/home/davitgabashvili/Projects/lesson1/Portal_OOP/Controller/BlogController.php";
include_once "/home/davitgabashvili/Projects/lesson1/Portal_OOP/Controller/UserController.php";
class router
{
    public function route($uri, $className, $function){

        if ( strpos($uri, "{id}") && strpos($_SERVER['REQUEST_URI'],trim($uri, "/{id}")) )
        {   $link = $_SERVER['REQUEST_URI'];
            $link_array = explode('/',$link);
            $argument = end($link_array);
            $obj = new $className();
            $obj->$function($argument);
        }
        else {
            if ($uri == $_SERVER['REQUEST_URI']) {
                $obj = new $className();
                $obj->$function();
            }
        }
    }

}