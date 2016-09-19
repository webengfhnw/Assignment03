<html>
<head>
    <meta charset="UTF-8">
    <title>Check the password and username</title>
</head>
<body>
<?php
session_start();
if (isset($_POST['username'])) {
    $name = $_POST['username'];
    $password = $_POST['password'];
    $login = $name . ";" . $password . ";\n";
    $access = false;

    $loginData = file("login.txt");
    for ($i = 0; $i < sizeof($loginData); $i++) {
        if ($loginData[$i] == $login) {
            $access = true;
        }
    }
    if ($access) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['verified'] = true;
        echo "Welcome " . $_SESSION['username'];
        echo "<br>Your session id is: " . session_id();
        echo "<br><a href='index.php'> You have access now. </a>";
    } else {
        $_SESSION['verified'] = false;
        echo "Username or password incorrect!";
        echo "<a href='loginForm.php'> back to the login </a>";
    }
    exit();
}
?>
<form action="" method="post">
    <input type="text" name="username" size="20"/> Username <br/>
    <input type="password" name="password" size="20"/> Password <br/><br/>

    <input type="submit" value="Login"/>
    <input type="reset" value="Reset"/>
</form>
</body>
</html>