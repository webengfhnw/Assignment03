<?php
session_start();

include "header.inc.php";

echo "Good day " . $_SESSION['username'];
echo "<br/>";
echo "You session ID is: " . session_id();
echo "<br/><a href='loginForm.php'> logout </a>";