﻿<?PHP
include $_SERVER['DOCUMENT_ROOT'] . "/functions/check.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/dbconnect.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/scriptpage.php";


$id = $mysqli->real_escape_string($_GET['id']);
$trida = $mysqli->real_escape_string($_POST['trida']);
$jmeno = $mysqli->real_escape_string($_POST['jmeno']);
$prijmeni = $mysqli->real_escape_string($_POST['prijmeni']);
$sex = $mysqli->real_escape_string($_POST['sex']);
$narozeni = $mysqli->real_escape_string($_POST['narozeni']);
$zacatek = $mysqli->real_escape_string($_POST['zacatek']);
if (isset($_GET['delete'])) {
    $request = "DELETE FROM `sport_gymtri_cz`.`athletes` WHERE `athletes`.`id` = $id";
    $result = $mysqli->query($request);
    echo "<script>window.close();</script>";
    exit;
}
if ($_POST['jmeno'] == '' || $_POST['trida'] == '' || $_POST['prijmeni'] == '' || $_POST['sex'] == '' || $_POST['narozeni'] == '' || $_POST['zacatek'] == '' || $_GET['id'] == '') {
} else {
    $request = "UPDATE `sport_gymtri_cz`.`athletes` SET `first_name` = '$jmeno', `last_name` = '$prijmeni', `gender` = '$sex', `birthdate` = '$narozeni', `class` = '$trida', `yearbegin` = '$zacatek' WHERE `athletes`.`id` = $id;";
    $result = $mysqli->query($request);
}


echo "<script>window.close();</script>";

?>