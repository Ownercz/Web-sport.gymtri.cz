<?PHP
include $_SERVER['DOCUMENT_ROOT'] . "/functions/check.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/dbconnect.php";
include "disciplines.php";
if (isset($_GET['delete'])) {
    $athleteidtodelete = $_GET['athleteidtodelete'];
    $request = "DELETE FROM `sport_gymtri_cz`.`event_score` WHERE `event_score`.`id` = $athleteidtodelete";
    $result = $mysqli->query($request);
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
if (isset($_GET['vek'])) {
    $vek = $_GET['vek'];
    $vek = str_replace(",", ".", $vek);
}
if (isset($_GET['trida'])) {
    $trida = $_GET['trida'];
}
if (isset($_GET['classid'])) {
    $class = $_GET['classid'];
}
if (isset($_GET['sex'])) {
    $sex = $_GET['sex'];
    $sex = str_replace(",", ".", $sex);
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = str_replace(",", ".", $id);
}
if (isset($_GET['athleteid'])) {
    $athleteid = $_GET['athleteid'];
    $athleteid = str_replace(",", ".", $athleteid);
}

/*athlete info*/
$request1 = "SELECT * FROM `athletes` WHERE `id` = $athleteid ";
$result1 = $mysqli->query($request1);
while ($row1 = $result1->fetch_array(MYSQLI_NUM)) {
    $jmeno = $row1[1];
    $prijmeni = $row1[2];
}
$request2 = "SELECT * FROM `event` WHERE `id` = $id ";
$result2 = $mysqli->query($request2);
while ($row2 = $result2->fetch_array(MYSQLI_NUM)) {
    $event_name = $row2[1];
    $event_date = $row2[4];
}
/*end of athlete info*/
$koeficient = koeficient($vek, $sex);
print $koeficient . $discipline;
if ($discipline == "60m") {
    $points = sedesatka($koeficient, $vykon, $sex);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '1', `score_value` = '111', `score_points` = '11', `koeficient` = '1' WHERE `event_score`.`id` = $id";
    echo $request;
    $result = $mysqli->query($request);
} elseif ($discipline == "100m") {
    $points = stovka($koeficient, $vykon, $sex);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '2', `score_value` = '111', `score_points` = '11', `koeficient` = '1' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "1500m") {
    $points = patnactistovka($koeficient, $vykon, $sex);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '3', `score_value` = '111', `score_points` = '11', `koeficient` = '1' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "3000m") {
    $points = tritisicovka($koeficient, $vykon, $sex);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '4', `score_value` = '111', `score_points` = '11', `koeficient` = '1' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "dálka") {
    $points = dalka($koeficient, $vykon, $sex);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '5', `score_value` = '111', `score_points` = '11', `koeficient` = '1' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "výška") {
    $points = vyska($koeficient, $vykon, $sex);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '6', `score_value` = '111', `score_points` = '11', `koeficient` = '1' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "míč") {
    $points = mic($koeficient, $vykon, $sex);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '7', `score_value` = '111', `score_points` = '11', `koeficient` = '1' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "granát") {
    $points = granat($koeficient, $vykon, $sex);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '8', `score_value` = '111', `score_points` = '11', `koeficient` = '1' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "šplh") {
    $points = splh($koeficient, $vykon, $sex);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '9', `score_value` = '111', `score_points` = '11', `koeficient` = '1' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "25m plavání") {
    $points = dvacetpetkavz($koeficient, $vykon, $sex);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '10', `score_value` = '111', `score_points` = '11', `koeficient` = '1' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "50m plavání") {
    $points = padesatkavz($koeficient, $vykon, $sex);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '11', `score_value` = '111', `score_points` = '11', `koeficient` = '1' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} elseif ($discipline == "100m plavání") {
    $points = stovkavz($koeficient, $vykon, $sex);
    $request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '12', `score_value` = '111', `score_points` = '11', `koeficient` = '1' WHERE `event_score`.`id` = $id";
    $result = $mysqli->query($request);
} else {
    exit;
}
echo "<script>window.close();</script>";
