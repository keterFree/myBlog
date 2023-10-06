<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class='head'>
        <article class="user">
            <img src="assets/images/passport.jpg" alt="Avatar" class="headavatar"><br>
            <?php
            if (empty($_SESSION['status'])) {
                $_SESSION['status'] = false;
                echo "Try signing in";
            } else {
                echo $_SESSION['name'] . "<br>";
                echo $_SESSION['email'] . "<br>";
            }
            ?>
        </article>
    </div>
    <ul class="top">
        <li><a href="index.php">Home</a></li>
        <li><a href="Explore.php">Explore</a></li>
        <li><a href="#">Later</a></li>
        <li>
            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                <button type="submit" name="submit" value="redirect">
                    <?php
                    if ($_SESSION['status'] != true) {
                        $_SESSION['name'] = '';
                        $_SESSION['email'] = '';
                        echo "Sign in";
                    } else {
                        echo "Log out";
                    }
                    ?>
                </button>
            </form>
        </li>
    </ul>

    <div style="text-align:center;color:brown">

        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_SESSION['status'] != true) {
                if ($_SERVER['PHP_SELF'] == '/credentials.php') {
                    if ($_POST['submit'] == "signin") {
                        if (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) != null && !empty($_POST['psw']) && !empty($_POST['uname'])) {
                            echo 'processing input<br>';
                            $_SESSION['status'] = true;
                            $_SESSION['name'] = $_POST['uname'];
                            $_SESSION['psw'] = $_POST['psw'];
                            $_SESSION['email'] = $_POST['email'];
                            echo 'processed';
                            header("location:index.php");
                        } else {
                            echo "Ensure name, password and email are valid";
                        }
                    }
                } else {
                    header('location:credentials.php');
                }
            } else {
                session_destroy();
                session_start();
                header('location:index.php');
            }
        }


        ?>
    </div>
</body>

</html>