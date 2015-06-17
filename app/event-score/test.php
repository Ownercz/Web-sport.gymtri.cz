<?PHP
include"../../functions/check.php";
include"../../functions/dbconnect.php";
include"../../functions/functions.php";
include "disciplines.php";
$rest =athleteInfo(43,$mysqli);
echo $rest["gender"];
echo stovka(1, 17, "F", $mysqli);
