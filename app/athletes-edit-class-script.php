<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
   
</head>
<body >

Aktualizováno.
$row[0]."</td><td><input type='text' name='trida' size='1' value='".$row[5]."'></input></td><td><input type='text' name='jmeno' value='".$row[1]."'></input></td><td><input type='text' name='pohlavi' value='".$row[2]."'></input></td><td><input type='text' name='sex' size='1' value='".$row[3]."'></input></td><td><input type='text' name='narozeni' value='".$row[4]."'></input></td><td><input type='text' name='zacatek' value='".$row[6]."'></input></td><td><button type='submit' value='Aktualizovat' onClick='' class='btn btn-primary'>Aktualizovat</button></td></tr></form>


<?PHP  include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/check.php"; 


include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/dbconnect.php";
$class = $mysqli->real_escape_string($_GET['id']);
$trida = $mysqli->real_escape_string($_POST['trida']);
$jmeno = $mysqli->real_escape_string($_POST['jmeno']);
$prijmeni = $mysqli->real_escape_string($_POST['prijmeni']);
$sex = $mysqli->real_escape_string($_POST['sex']);
$narozeni = $mysqli->real_escape_string($_POST['narozeni']);
$zacatek = $mysqli->real_escape_string($_POST['zacatek']);

$request= "SELECT * FROM `athletes` WHERE `class` = '$class' AND `yearbegin` = '$yearbegin' ORDER BY `id` ASC"  ; 
 $result = $mysqli->query($request);


echo "<script>window.close();</script>";

?>


</body>
</html>