<?php

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
            <h1 class="Header" id="WebsiteHeader"> OKI BAXTADZE's Website </h1>
            <hr/>
            <nav>
                <div class="navig">    
                    <a href="register" class="nav" id="Register">Register</a>
                    <a href="login" class="nav" id="Contact">Log in</a>
                </div>
            </nav>
        
            <hr/>

        </header>
        <main>
            <span id="RegisterLabel">
               <h3> Please register to see <b>OKI's Website</b> </h3>
                <form action="registration" method="post">
                        <label for="User" class="RegisterField">Username:</label><br>
                        <input type="text" id="User" name="uname" class="RegisterField"><br>
                        <label for="password" class="RegisterField">Password:</label><br>
                        <input type="password" id="password" name="psw" class="RegisterField"><br>
                        <label for="repeatpassword" class="RegisterField">Repeat Password:</label><br>
                        <input type="password" id="repeatpassword" name="rptpsw" class="RegisterField"><br>
                        <input type="submit" id="registration" name="rgstr" value="Register" class="RegisterField">
                </form>
            </span>
        </main>
    </body>
</html>