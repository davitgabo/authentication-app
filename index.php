<?php
define('__ROOT__', __DIR__);
include_once "/home/davitgabashvili/Projects/lesson1/Portal_OOP/Controller/router.php";
$router = new router();
$router->route("/login","BlogController","loginView");
$router->route("/","BlogController","loginView");
$router->route("/register","BlogController","registerView");
$router->route("/registration","UserController","fullReg");
$router->route("/loggedin","UserController","fullLog");
$router->route("/home","BlogController","home");
$router->route("/about","BlogController","about");
$router->route("/contact","BlogController","contact");
$router->route("/gallery","BlogController","gallery");
$router->route("/logout","UserController","logout");
$router->route("/adminpanel","BlogController","adminPanel");
$router->route("/manager","BlogController","manager");
$router->route("/user/delete/{id}","UserController","deleteuser");
