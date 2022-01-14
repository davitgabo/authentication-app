<?php
class Users
{
    private $host = "localhost";
    private $username = "root";
    private $password = "Password123!";
    private $DBname = "Project_OKI";

    protected function dataBaseConnect()
    {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->DBname);

        if ($conn->connect_error){
            echo "Failed to connect to MySQL: " . $conn -> connect_error;
            exit();
        } else {
            return $conn;
        }
    }

    public function userCheck($username)
    {
        $conn = $this->dataBaseConnect();
        $sql = "SELECT username FROM Users where username = '$username'";
        $result = $conn->query($sql);
        $users = $result->fetch_all(MYSQLI_ASSOC);

        if ($users){
                $status = "exists";
        } else {
            $status = "not exists";
        }
        return $status;
    }

    protected function authentication($username, $password)
    {
        $conn = $this->dataBaseConnect();
        $sql = "SELECT username, password, role FROM Users where username='$username'";
        $result = $conn->query($sql);
        $users = $result->fetch_all(MYSQLI_ASSOC);

        if ($users[0]['password'] == $password){
              $status = $users[0]['role'];
        } else {
            $status = "not authorized";
        }

        return $status;
    }

    protected function registration($username, $password)
    {
        $conn = $this->dataBaseConnect();
        $sql = "INSERT INTO Users (username, password) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            $alert = "$username you registered succesfully";
        } else {
            $alert = "something went wrong";
        }

        echo "<script type='text/javascript'> alert('$alert'); window.location.href = 'login'; </script>";
    }

    public function adminpanel($access)
    {
        $conn = $this->dataBaseConnect();
        $sql = "SELECT id, username, role FROM Users";
        $result = $conn->query($sql);
        $users = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($users as $value){
            $id = $value['id'];
            $username = $value['username'];
            $role = $value['role'];
            echo  " <tr>
                    <td> $id </td>
                    <td> $username </td>
                    <td> $role   </td>
                    <td><a href='/user/edit/$id'>edit</a></td>";

            if ($access=='administrator') {
                echo "<td><a href ='/user/delete/$id'> delete</a></td> </tr>";
            }else {
                echo "<td><button disabled>delete</button></td> </tr>";
            }
        }

    }

    protected function delete($id)
    {
        $conn = $this->dataBaseConnect();
        $sql = "Delete FROM Users where id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'> alert('Record Deleted successfully'); window.location.href = '../../adminpanel'; </script>";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $conn->close();
    }

    protected function edit($id, $field, $value)
    {
        $conn = $this->dataBaseConnect();
        $sql = "UPDATE Users SET $field='$value' WHERE id='$id'";

        if ($conn->query($sql) !== TRUE) {
             echo "Error Updating record: " . $conn->error;
        }
        $conn->close();
    }

}

