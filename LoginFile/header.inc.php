<?php
if (!isset($_SESSION['verified'])) {
    echo "Access denied!";
    echo "<a href='loginForm.php'> Login </a>";
    exit();
}