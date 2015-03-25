<?PHP
include $_SERVER['DOCUMENT_ROOT'] . "/functions/check.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/dbconnect.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/functions.php";
include "disciplines.php";
$rest =athleteInfo(43,$mysqli);
echo $rest["gender"];
echo stovka(1, 17, "F", $mysqli);
