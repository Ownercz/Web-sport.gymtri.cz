﻿<?PHP
include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/check.php"; 
include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/dbconnect.php";
include "disciplines.php";
if(isset($_GET['delete'])){
$idathletestodelete=$_GET['athleteid'];
$request = "DELETE FROM `sport_gymtri_cz`.`event_score` WHERE `event_score`.`id` = $idathletestodelete";
$result = $mysqli->query($request);
echo "<script>window.close();</script>";
exit;
}
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
if(isset($_GET['trida'])){$trida = $_GET['trida']; }
if(isset($_GET['classid'])){$class = $_GET['classid']; }
if(isset($_GET['sex'])){$sex = $_GET['sex'];$sex = str_replace(",",".",$sex); }
if(isset($_GET['id'])){$id = $_GET['id'];$id = str_replace(",",".",$id); }
if(isset($_GET['athleteid'])){$athleteid = $_GET['athleteid'];$athleteid = str_replace(",",".",$athleteid); }

/*athlete info*/
 $request1="SELECT * FROM `athletes` WHERE `id` = $athleteid ";
 $result1 = $mysqli->query($request1);
 while($row1 = $result1->fetch_array(MYSQLI_NUM)){$jmeno = $row1[1]; $prijmeni = $row1[2];}
    $request2 ="SELECT * FROM `event` WHERE `id` = $id ";
    $result2 = $mysqli->query($request2);
    while($row2 = $result2->fetch_array(MYSQLI_NUM)){$event_name=$row2[1]; $event_date = $row2[4];}

/*end of athlete info*/
$koeficient = koeficient($vek,$sex);
print $koeficient.$discipline;
if($discipline =="60m"){
$points= sedesatka($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`, `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '1', '$vykon', '$points', '$sex', '$vek', '$koeficient', '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
echo$request;
$result = $mysqli->query($request);
}
elseif($discipline =="100m"){
$points = stovka($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`, `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '2', '$vykon', '$points', '$sex', '$vek', '$koeficient', '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="1500m"){
$points = patnactistovka($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`, `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '3', '$vykon', '$points', '$sex', '$vek', '$koeficient', '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="3000m"){
$points = tritisicovka($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`, `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '4', '$vykon', '$points', '$sex', '$vek', '$koeficient', '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="dálka"){
$points = dalka($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`, `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '5', '$vykon', '$points', '$sex', '$vek', '$koeficient', '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="výška"){
$points = vyska($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`, `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '6', '$vykon', '$points', '$sex', '$vek', '$koeficient', '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="míč"){
$points = mic($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`, `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '7', '$vykon', '$points', '$sex', '$vek', '$koeficient', '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="granát"){
$points = granat($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`, `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '8', '$vykon', '$points', '$sex', '$vek', '$koeficient', '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="šplh"){
$points = splh($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`, `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '9', '$vykon', '$points', '$sex', '$vek', '$koeficient', '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="25m plavání"){
$points = dvacetpetkavz($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`, `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '10', '$vykon', '$points', '$sex', '$vek', '$koeficient', '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="50m plavání"){
$points = padesatkavz($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`, `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '11', '$vykon', '$points', '$sex', '$vek', '$koeficient', '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="100m plavání"){
$points = stovkavz($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`, `score_value`, `score_points`, `gender`, `age`, `koeficient`, `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '12', '$vykon', '$points', '$sex', '$vek', '$koeficient', '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
else{exit;}
echo "<script>window.close();</script>";