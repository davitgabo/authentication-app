<?php
include_once "/home/davitgabashvili/Projects/lesson1/Portal_OOP/Model/DBconnection.php";
class Users
{
    private $host = "localhost";
    private $username = "root";
    private $password = "Password123!";
    private $DBname = "Project_OKI";
    protected function DBconnect(){
        $conn = new mysqli($this->host, $this->username, $this->password, $this->DBname);
        if ($conn->connect_error){
            echo "Failed to connect to MySQL: " . $conn -> connect_error;
            exit();
        }
        else {
            return $conn;
        }
    }

    public function userCheck($username){
        $conn = $this->DBconnect();
        $sql = "SELECT username FROM Users where username = '$username'";
        $result = $conn->query($sql);
        $users = $result->fetch_all(MYSQLI_ASSOC);
        if ($users){
                $status = "exists";
            }
        else $status = "not exists";
        return $status;
    }

    protected function authentication($username, $password){
        $conn = $this->DBconnect();
        $sql = "SELECT username, password, role FROM Users"; // TODO:: change it to the "WHERE" logic
        $result = $conn->query($sql);
        $users = $result->fetch_all(MYSQLI_ASSOC);
        foreach ($users as $value){

          if ($value['username'] == $username && $value['password'] == $password ){
              $status = $value['role'];
              return $status;
          }
        }
        $status = "not authorized";
        return $status;
    }
    protected function registration($username, $password){
        $conn = $this->DBconnect();
        $sql = "INSERT INTO Users (username, password) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'> alert('$username you registered succesfully'); window.location.href = 'login'; </script>";
        } else {
            echo "<script type='text/javascript'> alert('something went wrong'); window.location.href = 'register'; </script>";
        }
    }

    public function adminpanel($access){
        $conn = $this->DBconnect();
        $sql = "SELECT id, username, role FROM Users";
        $result = $conn->query($sql);
        $users = $result->fetch_all(MYSQLI_ASSOC);
        foreach($users as $value){
            $id = $value['id'];
            $username = $value['username'];
            $role = $value['role'];
            echo "<tr>";
            echo    "<td> $id </td>";
            echo    "<td> $username </td>";
            echo    "<td> $role </td>";
            echo    "<td><a href ='/user/edit/$id'>edit</a></td>";
            if ($access=="administrator") { echo    "<td><a href ='/user/delete/$id'>delete</a></td>";}
            else {echo "<td><button disabled>delete</button></td>";}
            echo "</tr>";
        }
    }

    protected function delete($id){
        $conn = $this->DBconnect();
        $sql = "Delete FROM Users where id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'> alert('Record Deleted successfully'); window.location.href = '../../adminpanel'; </script>";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }

    protected function edit($id, $field, $value){
        $conn = $this->DBconnect();
        $sql = "UPDATE Users SET $field='$value' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'> alert('Record Updated successfully'); window.location.href = '../../adminpanel'; </script>";
        } else {
            echo "Error Updating record: " . $conn->error;
        }
        $conn->close();
    }

}

