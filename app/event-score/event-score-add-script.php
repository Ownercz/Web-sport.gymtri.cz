<?PHP
include $_SERVER['DOCUMENT_ROOT'] . "/functions/check.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/dbconnect.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/functions.php";
include "disciplines.php";
if (isset($_POST['delete'])) {
    $id = $_GET['id'];
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `score_value` = NULL, `score_points` = NULL, `koeficient` = NULL WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
    //echo$id;
    echo "<script>window.close();</script>";
    exit;
}
if (isset($_POST['vykon'])) {
    $vykon = $_POST['vykon'];
    $vykon = str_replace(",", ".", $vykon);
    if (strpos($vykon, ':') !== false) {
        $array = explode(":", $vykon, 2);
        $mins = $array[0];
        $secondsb = $array[1];
        $secondsa = $mins * 60;
        $vykon = $secondsa + $secondsb;
    }
}

if (isset($_POST['discipline'])) {
    $discipline = $_POST['discipline'];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //$id = str_replace(",", ".", $id);
}

/*athlete info*/

$request = "SELECT * FROM `event_score` WHERE `id` = $id";
$result = $mysqli->query($request);
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {$event_id=$row["event_id"]; $athlete_id=$row["athlete_id"];}
$athlete=athleteInfo($athlete_id,$mysqli);
$sex=$athlete["gender"];
$vek=eventAge($event_id,$athlete_id,$mysqli);
/*end of athlete info*/
$koeficient = koeficient($vek, $sex);
//echo $koeficient."|".$vykon."|".$sex."<br";
if ($discipline == "60m") {
    $points = sedesatka($koeficient, $vykon, $sex, $mysqli);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '1', `score_value` = '$vykon', `score_points` = '$points', `koeficient` = '$koeficient' WHERE `event_score`.`id` = $id";
    echo $request;
    $result = $mysqli->query($request);
} elseif ($discipline == "100m") {
    $points = stovka($koeficient, $vykon, $sex, $mysqli);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '2', `score_value` = '$vykon', `score_points` = '$points', `koeficient` = '$koeficient' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "1500m") {
    $points = patnactistovka($koeficient, $vykon, $sex, $mysqli);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '3', `score_value` = '$vykon', `score_points` = '$points', `koeficient` = '$koeficient' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "3000m") {
    $points = tritisicovka($koeficient, $vykon, $sex, $mysqli);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '4', `score_value` = '$vykon', `score_points` = '$points', `koeficient` = '$koeficient' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "dálka") {
    $points = dalka($koeficient, $vykon, $sex, $mysqli);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '5', `score_value` = '$vykon', `score_points` = '$points', `koeficient` = '$koeficient' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "výška") {
    $points = vyska($koeficient, $vykon, $sex, $mysqli);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '6', `score_value` = '$vykon', `score_points` = '$points', `koeficient` = '$koeficient' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "míč") {
    $points = mic($koeficient, $vykon, $sex, $mysqli);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '7', `score_value` = '$vykon', `score_points` = '$points', `koeficient` = '$koeficient' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "granát") {
    $points = granat($koeficient, $vykon, $sex, $mysqli);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '8', `score_value` = '$vykon', `score_points` = '$points', `koeficient` = '$koeficient' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "šplh") {
    $points = splh($koeficient, $vykon, $sex, $mysqli);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '9', `score_value` = '$vykon', `score_points` = '$points', `koeficient` = '$koeficient' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "25m plavání") {
    $points = dvacetpetkavz($koeficient, $vykon, $sex, $mysqli);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '10', `score_value` = '$vykon', `score_points` = '$points', `koeficient` = '$koeficient' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "50m plavání") {
    $points = padesatkavz($koeficient, $vykon, $sex, $mysqli);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '11', `score_value` = '$vykon', `score_points` = '$points', `koeficient` = '$koeficient' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "100m plavání") {
    $points = stovkavz($koeficient, $vykon, $sex, $mysqli);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '12', `score_value` = '$vykon', `score_points` = '$points', `koeficient` = '$koeficient' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} else {
    exit;
}
//echo$points."ok";
echo "<script>window.close();</script>";
