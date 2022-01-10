<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="all about little Oki" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style.css" />
    <title>OKI</title>
</head>
<body>
<header>
    <div class="HeaderDIV">
        <h1 class="Header" id="WebsiteHeader">OKI BAXTADZE's Website</h1>
    </div>
    <hr/>
    <nav>
        <div class="navig">
            <a href="register" class="nav" id="Register">Register</a>
            <a href="login" class="nav" id="Contact">Log in</a>
        </div>
    </nav>

    <hr />
</header>

<main>
      <span class="input login" id="UserLogin">
        Please Log in to see <b>OKI's Website</b>

        <form action="loggedin" method="post">
          <input
              type="text"
              class="inpfield"
              id="User"
              name="username"
              placeholder="Username"
          /><br />
          <input
              type="password"
              class="inpfield"
              id="password"
              name="password"
              placeholder="Password"
          /><br />
          <input type="submit" id="login" name="lgn" value="Log in" />
        </form>
      </span>
</main>
</body>
</html>