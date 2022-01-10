<?php
include_once "/home/davitgabashvili/Projects/lesson1/Portal_OOP/Model/Users.php";

$uri = "Model/test.php";

$b = strpos( $_SERVER['REQUEST_URI'], trim($uri,".php") );
echo $b;
