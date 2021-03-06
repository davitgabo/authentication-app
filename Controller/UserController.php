<?php
include_once "/home/davitgabashvili/Projects/lesson1/Portal_OOP/Model/Users.php";
include_once "/home/davitgabashvili/Projects/lesson1/Portal_OOP/Controller/Session.php";
class UserController extends Users
{

    public function logout(){
        $object = new Session();
        $object->sessionClose();
        header('location: login');
    }

    private function reg($username,$password,$repeatPassword){
        if ($password != $repeatPassword || strlen($username)<4 || strlen($password)<4 || $this->userCheck($username)=="exists")
        {
            echo "<script type='text/javascript'> alert('try different username or password'); window.location.href = 'register'; </script>";

        } else
        {
            $this->registration($username,$password);
        }
    }

    private function login($username, $password){
        $role = $this->authentication($username,$password);
        $object = new Session();
        if ($role=="authenticated"){
            $object->sessionStart($role);                   //todo:: if logic change to role argument
            header("location: home");
        }
        else if ($role=="administrator" || $role=="manager" ){
            $object->sessionStart($role);
            header("location: adminpanel");
        }
        else {
            echo "<script type='text/javascript'> alert('wrong username or password'); window.location.href = 'login'; </script>";
        }
    }

    public function fullLog()
    {
        $this->login($_POST['username'],$_POST['password']);
    }

    public function fullReg()
    {
        $this->reg($_POST['uname'],$_POST['psw'],$_POST['rptpsw']);
    }

    public function deleteUser($id)
    {
        $this->delete($id);
    }



    public function editUser($id)
    {
        $username = trim($_POST['user']);
        $password = trim($_POST['pass']);
        $rptpassword = trim($_POST['rptpass']);

        if (!empty($username) ){
            $this->edit($id,"username",$username);
            $alert = "Username Updated! ";
        }
        else {
            $alert = "No Updates in Username! ";
        }

        if (!empty($password)){

            if ($password==$rptpassword) {
                $this->edit($id, "password", $password);
                $alert.= "Password Updated!";
            }
            else {
                $alert .= "Passwords dont match";
            }
        }
        else {$alert .="No Updates in Password!"; }

        echo "<script type='text/javascript'> alert('$alert'); window.location.href = '/adminpanel'; </script>";
    }


}
