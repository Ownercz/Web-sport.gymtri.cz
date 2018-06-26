<?PHP
include"../../functions/check.php";
include"../../functions/dbconnect.php";
include"../../functions/scriptpage.php";

if (isset($_GET["count"])) {
    $count = $_GET["count"];
} else {
    $count = 1;
}
$trida = array();
$prijmeni = array();
$jmeno = array();
$sex = array();
$narozeni = array();
$zacatek = array();
$i = 0;
$a = 1;
while ($i < $count) {
    array_push($trida, $_POST['trida' . $a]);
    array_push($prijmeni, $_POST['prijmeni' . $a]);
    array_push($jmeno, $_POST['jmeno' . $a]);
    array_push($sex, $_POST['sex' . $a]);
    array_push($narozeni, $_POST['narozeni' . $a]);
    array_push($zacatek, $_POST['zacatek' . $a]);

    print$_POST['zacatek' . $a] . "<br>";
    $i++;
    $a++;
}
$i = 0;
$a = 0;
while ($i < $count) {
    $jmenoi = $mysqli->real_escape_string($jmeno[$a]);
    $prijmenii = $mysqli->real_escape_string($prijmeni[$a]);
    $sexi = $mysqli->real_escape_string($sex[$a]);
    $narozenii = $mysqli->real_escape_string($narozeni[$a]);
    $tridai = $mysqli->real_escape_string($trida[$a]);
    $zacateki = $mysqli->real_escape_string($zacatek[$a]);
    $request = "INSERT INTO `sport_gymtri_cz`.`athletes` (`id`, `first_name`, `last_name`, `gender`, `birthdate`, `class`, `yearbegin`) VALUES (NULL, '$jmenoi', '$prijmenii', '$sexi', '$narozenii','$tridai', '$zacateki')";
    $result = $mysqli->query($request);
    $i++;
    $a++;
}
header('Location: ..');
exit;
?>
