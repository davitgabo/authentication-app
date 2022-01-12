<?php
include_once "/home/davitgabashvili/Projects/lesson1/Portal_OOP/Controller/UserController.php";
class blogController extends Session
{
    private function render($filename,$data = []){
        include __ROOT__."/View/".$filename.".php";
    }

    public function adminPanel(){
        $this->sessionCheck("adminpanel");
        $this->render("adminpanel");
    }

    public function managerPanel(){
        $this->sessionCheck("adminpanel");
        $this->render("adminpanel");
    }

    public function home(){
        $this->sessionCheck("home");
        $this->render("home");
    }

    public function about(){
        $this->sessionCheck("about");
        $this->render("about");
    }

    public function contact(){
        $this->sessionCheck("contact");
        $this->render("contact");
    }

    public function gallery(){
        $this->sessionCheck("gallery");
        $this->render("gallery");
    }

    public function loginView(){
        $this->sessionCheck("login");
        $this->render("login");
    }

    public function registerView(){
        $this->sessionCheck("login");
        $this->render("register");
    }

    public function editform($id){
        $this->sessionCheck("adminpanel");
        define("id", $id);
        $this->render("edit");

    }

}