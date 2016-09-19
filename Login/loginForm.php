<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<?php
session_start();
session_destroy();
session_unset();
$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 86400, '/');
}
?>
<form action="loginVerification.php" method="post">
    <input type="text" name="username" size="30"/>Username<br/>
    <input type="password" name="password" size="30"/>Password<br/>
    <input type="submit" value="Login"/>
    <input type="reset" value="Reset"/>
</form>
</body>
</html>