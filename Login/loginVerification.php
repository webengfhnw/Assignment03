<html>
<head>
    <meta charset="UTF-8">
    <title>Check the password and username</title>
</head>
<body>
<?php
session_start();
if (isset($_POST['username']) AND isset($_POST['password'])) {
    if ($_POST['username'] == 'Andreas' AND $_POST['password'] == '007') {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['verified'] = true;
        echo "Welcome " . $_SESSION['username'];
        echo "<br>Your session id is: " . session_id();
        echo "<br><a href='index.php'> You have access now. </a>";
    } else {
        $_SESSION['verified'] = false;
        header("Location:loginForm.php");
    }
}
?>
</body>
</html>
