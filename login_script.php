<?
include "config.php";
$login = $POST_["login"];
$password = $POST_["password"];

$login = $mysqli->real_escape_string($login);
$password = $mysqli->real_escape_string($password);