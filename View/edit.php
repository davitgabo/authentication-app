<?php
include_once "/home/davitgabashvili/Projects/lesson1/Portal_OOP/Model/Users.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="all about little Oki">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>OKI</title>
</head>
<body>
<header>
    <a href="logout">Log out</a>
    <h1 class="Header" id="WebsiteHeader"> OKI BAXTADZE's Website </h1>
    <hr/>
    <h2>Admin panel</h2>
    <hr/>

</header>
<main>

        <?php  echo "edit profile for User".id;   ?>
        <form action="/adminpanel/edit/<?php echo id; ?> " method="post">
            <input
                    type="text"
                    class="inpfield"
                    name="user"
                    placeholder="Change Username"
            /><br />
            <input
                    type="password"
                    class="inpfield"
                    name="pass"
                    placeholder="Change Password"
            /><br />
            <input
                    type="password"
                    class="inpfield"
                    name="rptpass"
                    placeholder="Repeat New Password"
            /><br />
            <input type="submit" id="login" name="lgn" value="Edit" />
        </form>




</main>
<footer>






</footer>
</body>
</html>

