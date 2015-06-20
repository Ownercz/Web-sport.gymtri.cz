<?PHP
/*
 * Windows hack, do not use this edit in production
 */
$mysqli = new mysqli("localhost", "root" , "", "sport_gymtri_cz");
$mysqli->set_charset("utf8");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/*
 * Working version on Linux, XAMPP has problems with including config.php
 * Currently offline, will check for solution later, hardcoded fix above
 *
include "config.php";
$mysqli = new mysqli($DB_HOST, $DB_USER , $DB_PASS, $DB_NAME);
$mysqli = new mysqli($DB_HOST, $DB_USER , $DB_PASS, $DB_NAME);
$mysqli->set_charset("utf8");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}*/
?>


