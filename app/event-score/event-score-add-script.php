<?PHP
include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/check.php"; 
include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/dbconnect.php";
include "disciplines.php";
if(isset($_POST['vykon'])){
$vykon = $_POST['vykon'];$vykon = str_replace(",",".",$vykon); 
    if (strpos($vykon,':') !== false) {
    $array = explode(":", $vykon, 2);
    $mins = $array[0]; $secondsb = $array[1];
    $secondsa = $mins*60;
    $vykon = $secondsa+$secondsb;
    }



}
if(isset($_POST['discipline'])){$discipline = $_POST['discipline']; }
if(isset($_GET['vek'])){$vek = $_GET['vek'];$vek = str_replace(",",".",$vek); }
if(isset($_GET['class'])){$class = $_GET['class'];$class = str_replace(",",".",$class); }
if(isset($_GET['sex'])){$sex = $_GET['sex'];$sex = str_replace(",",".",$sex); }
if(isset($_GET['id'])){$id = $_GET['id'];$id = str_replace(",",".",$id); }
if(isset($_GET['athleteid'])){$athleteid = $_GET['athleteid'];$athleteid = str_replace(",",".",$athleteid); }

$koeficient = koeficient($vek,$sex);

if($discipline =="60m"){
$points= sedesatka($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`) VALUES (NULL, '$id', '$class', '$athleteid', '1', '$vykon', '$points', '$sex', '$vek', '$koeficient')";
$result = $mysqli->query($request);
}
elseif($discipline =="100m"){
$points = stovka($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`) VALUES (NULL, '$id', '$class', '$athleteid', '2', '$vykon', '$points', '$sex', '$vek', '$koeficient')";
$result = $mysqli->query($request);
}
elseif($discipline =="1500m"){
$points = patnactistovka($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`) VALUES (NULL, '$id', '$class', '$athleteid', '3', '$vykon', '$points', '$sex', '$vek', '$koeficient')";
$result = $mysqli->query($request);
}
elseif($discipline =="3000m"){
$points = tritisicovka($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`) VALUES (NULL, '$id', '$class', '$athleteid', '4', '$vykon', '$points', '$sex', '$vek', '$koeficient')";
$result = $mysqli->query($request);
}
elseif($discipline =="dálka"){
$points = dalka($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`) VALUES (NULL, '$id', '$class', '$athleteid', '5', '$vykon', '$points', '$sex', '$vek', '$koeficient')";
$result = $mysqli->query($request);
}
elseif($discipline =="výška"){
$points = vyska($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`) VALUES (NULL, '$id', '$class', '$athleteid', '6', '$vykon', '$points', '$sex', '$vek', '$koeficient')";
$result = $mysqli->query($request);
}
elseif($discipline =="míč"){
$points = mic($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`) VALUES (NULL, '$id', '$class', '$athleteid', '7', '$vykon', '$points', '$sex', '$vek', '$koeficient')";
$result = $mysqli->query($request);
}
elseif($discipline =="granát"){
$points = granat($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`) VALUES (NULL, '$id', '$class', '$athleteid', '8', '$vykon', '$points', '$sex', '$vek', '$koeficient')";
$result = $mysqli->query($request);
}
elseif($discipline =="šplh"){
$points = splh($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`) VALUES (NULL, '$id', '$class', '$athleteid', '9', '$vykon', '$points', '$sex', '$vek', '$koeficient')";
$result = $mysqli->query($request);
}
elseif($discipline =="25m plavání"){
$points = dvacetpetkavz($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`) VALUES (NULL, '$id', '$class', '$athleteid', '10', '$vykon', '$points', '$sex', '$vek', '$koeficient')";
$result = $mysqli->query($request);
}
elseif($discipline =="50m plavání"){
$points = padesatkavz($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`) VALUES (NULL, '$id', '$class', '$athleteid', '11', '$vykon', '$points', '$sex', '$vek', '$koeficient')";
$result = $mysqli->query($request);
}
elseif($discipline =="100m plavání"){
$points = stovkavz($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`) VALUES (NULL, '$id', '$class', '$athleteid', '12', '$vykon', '$points', '$sex', '$vek', '$koeficient')";
$result = $mysqli->query($request);
}
else{exit;}
