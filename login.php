<?php
    global $connection;
    include_once "./connection.php";

    # TODO: prevent access to pages unless session/login exists

//    echo session_id() . "\n\n";
//    echo session_status() . "\n\n";

    if (session_status() === PHP_SESSION_NONE) {
        if (isset($_POST["login"])) {
            $username = mysqli_real_escape_string($connection, $_POST["username"]);
            $password = mysqli_escape_string($connection, $_POST["password"]);

            $query = "SELECT * FROM users WHERE barcode='$username'";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $db_pass = $row["password"];
            }
            if ($result->num_rows > 0) if (password_verify($password, $db_pass)) {
//                    echo "\n\ncorrect username + password";
//                    session_start();
                $_SESSION['user_barcode'] = $username;
                header('Location: ./home.php');
            }
            else {
                echo "\n\nwrong username/password";
            }
            else {
                echo "\n\nno user like that exists";
            }
        }
    }
    else {
        header('Location: ./home.php');
    }
?>

<h2>hammer login</h2>
<form action="./login.php" method="post">

    <label for="username">Username: </label>
    <input type="text" id="username" name="username"><br><br>

    <label for="password">Password: </label>
    <input type="password" id="password" name="password"><br><br>

    <input type="submit" value="Login" name="login">
</form>
