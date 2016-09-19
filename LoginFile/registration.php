<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript">
        function verifyForm() {
            if (document.registration.password.value != document.registration.password2.value) {
                alert('The password are not identical');
                document.registration.password.focus();
                return false;
            }
            if (document.registration.password.value.length < 8) {
                alert('The password should have a length of at least 8');
                document.registration.password.focus();
                return false;
            }
            var nr_length = document.registration.password.value.replace(/[^0-9]/g, '').length;
            if (nr_length < 1) {
                alert('The password should contain a numeric element');
                document.registration.password.focus();
                return false;
            }
        }
    </script>
</head>
<body>
<?php
if (isset($_POST['username'])) {
    $fp = fopen("login.txt", "a");
    if (!$fp) {
        echo "Error";
        exit();
    }
    $entry = $_POST['username'] . ";" . $_POST['password'] . ";\n";
    fputs($fp, $entry);
}
?>
<form name="registration" action="registration.php" method="post" onsubmit="return verifyForm()">
    <input type="text" name="username" size="20"/> Username <br/>
    <input type="password" name="password" size="20"/> Password <br/>
    <input type="password" name="password2" size="20"/> Enter your password again <br/><br/>
    <input type="submit" value="Register"/>
    <input type="reset" value="Reset"/>
</form>
</body>
</html>
