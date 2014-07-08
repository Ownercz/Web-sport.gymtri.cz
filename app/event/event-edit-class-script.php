<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
   
</head>
<body >

Aktualizováno.



<?PHP  include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/check.php"; 


include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/dbconnect.php";
$id = $mysqli->real_escape_string($_GET['id']);
$trida = $mysqli->real_escape_string($_POST['trida']);
$jmeno = $mysqli->real_escape_string($_POST['jmeno']);
$prijmeni = $mysqli->real_escape_string($_POST['prijmeni']);
$sex = $mysqli->real_escape_string($_POST['sex']);
$narozeni = $mysqli->real_escape_string($_POST['narozeni']);
$zacatek = $mysqli->real_escape_string($_POST['zacatek']);

$request= "UPDATE `sport_gymtri_cz`.`athletes` SET `first_name` = '$jmeno', `last_name` = '$prijmeni', `gender` = '$sex', `birthdate` = '$narozeni', `class` = '$trida', `yearbegin` = '$zacatek' WHERE `athletes`.`id` = $id;"  ; 
 $result = $mysqli->query($request);


echo "<script>window.close();</script>";

?>


</body>
</html>