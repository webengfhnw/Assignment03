<?php
if (@$_GET['email'] <> "") {
    $time = time();

    // file open
    $handle = fopen("data.txt", "a");

    // write content of name
    fwrite($handle, $_GET['name']);

    // delimiter
    fwrite($handle, "|");

    // content of time
    fwrite($handle, $time);

    // delimiter
    fwrite($handle, "|");

    // email data
    fwrite($handle, $_GET['email'] . "\r\n");

    // close file
    fclose($handle);

    echo "Data has been stored";

} else {
    echo "Please enter your email address<br/>[Please enter your data at the beginning and at the end of your game]";
}
?>
<html>
<head><title> Data Form </title></head>
<body>
<!-- mit $_SERVER['PHP_SELF'] wird dieselbe Seite wieder aufgerufen-->
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">

    <p>Name:<br/>
        <input type="Text" name="name"></p>

    <p>Email:<br/>
        <input type="Text" name="email"></p>

    <input type="Submit" value="save">

</form>

<form action="processData.php" method="post">

    <p>Get your entries<br/>
        <input type="Text" name="email"></p>

    <input type="Submit" value="send">

</form>

</body>
</html>

