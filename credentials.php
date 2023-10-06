<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/signstyle.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footstyle.css">
</head>


<body class="wrap">
    <header><?php
            include('header.php');
            ?>
    </header>
    <div class="form">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="imgcontainer">
                <img src="assets/images/passport.jpg" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <label for="email"><b>Email adress</b></label>
                <input type="email" placeholder="Enter Email adress" name="email" required>

                <button type="submit" name="submit" value="signin">submit</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="container">
                <span class="psw"><a href="#">Forgot password?</a></span>
            </div>
        </form>
    </div>
    <?php
    include("footer.html");
    ?>
</body>


</html>