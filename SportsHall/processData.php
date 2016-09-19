<?php
$email = $_POST['email'];

// open file
$lines = file('data.txt');

// how many lines
$sizeOfLines = sizeof($lines);

for ($x = 0; $x < $sizeOfLines; $x++) {
// explode creates a two dimensional array
    $lines[$x] = explode('|', $lines[$x]);
}

$found = 0;

for ($x = 0; $x < $sizeOfLines; $x++) {
// we need trim because of page break
    if (trim($lines[$x][2]) == $email) {
        if ($found == 0) {
            $timePoint1 = $lines[$x][1];
            $found = 1;
        } else {
            $timePoint2 = $lines[$x][1];
        }
    }
}
$diff = $timePoint2 - $timePoint1;
echo "The customer with email $email played $diff sec.<br/>";

if ($diff > 60 AND $diff <= 3600) {
    $min = floor($diff / 60);
    $sek = $diff - $min * 60;
    echo "The customer with email $email played $min minutes and $sek sec.";
}
if ($diff > 3600) {
// we can use floor to round down
    $std = floor($diff / 3600);
    $min = floor(($diff - $std * 3600) / 60);
    $sek = $diff - $std * 3600 - $min * 60;
    echo "The customer with email $email played $std hour(s) $min minutes $sek sec.";

    $mailFrom = "andreas.martin@fhnw.ch";
    $subject = "Customer played more than an hour";
    $content = "Dear Sir or Madam\n\nThe customer with email '$email' played more than an hour\n\nKind regards\n";
    $header = "From: andreas.martin@fhnw.ch";
    mail($mailFrom, $subject, $content, $header);
}