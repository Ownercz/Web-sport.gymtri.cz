<?PHP
include $_SERVER['DOCUMENT_ROOT']."/functions/check.php"; 
include $_SERVER['DOCUMENT_ROOT']."/functions/dbconnect.php";
include "disciplines.php";
if(isset($_GET['delete'])){
$id=$_GET['id'];
$request = "DELETE FROM `sport_gymtri_cz`.`event_score` WHERE `event_score`.`id` = $id";
$result = $mysqli->query($request);
echo "<script>window.close();</script>";
}
if(isset($_POST['discipline'])){$discipline = $_POST['discipline']; }elseif(isset($_GET['discipline'])){$discipline=$_GET["discipline"];}
if(isset($_GET['id'])){$id = $_GET['id'];$id = str_replace(",",".",$id); }
$request = "UPDATE `sport_gymtri_cz`.`event_score` SET `discipline_id` = '$discipline' WHERE `event_score`.`id` = $id;";
$result = $mysqli->query($request);


/*athlete info*/
 /*$request1="SELECT * FROM `athletes` WHERE `id` = $athleteid ";
 $result1 = $mysqli->query($request1);
 while($row1 = $result1->fetch_array(MYSQLI_NUM)){$jmeno = $row1[1]; $prijmeni = $row1[2];}
    $request2 ="SELECT * FROM `event` WHERE `id` = $id ";
    $result2 = $mysqli->query($request2);
    while($row2 = $result2->fetch_array(MYSQLI_NUM)){$event_name=$row2[1]; $event_date = $row2[4];}
*/
/*end of athlete info*/
/*
if($discipline =="60m"){
//$points= sedesatka($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`,  `gender`, `age`,  `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '1',   '$sex', '$vek',  '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
echo$request;
$result = $mysqli->query($request);
}
elseif($discipline =="100m"){
//$points = stovka($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`,  `gender`, `age`,  `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '2',   '$sex', '$vek',  '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="1500m"){
//$points = patnactistovka($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`,  `gender`, `age`,  `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '3',   '$sex', '$vek',  '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="3000m"){
//$points = tritisicovka($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`,  `gender`, `age`,  `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '4',   '$sex', '$vek',  '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="dálka"){
//$points = dalka($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`,  `gender`, `age`,  `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '5',   '$sex', '$vek',  '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="výška"){
//$points = vyska($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`,  `gender`, `age`,  `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '6',   '$sex', '$vek',  '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="míč"){
//$points = mic($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`,  `gender`, `age`,  `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '7',   '$sex', '$vek',  '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="granát"){
//$points = granat($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`,  `gender`, `age`,  `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '8',   '$sex', '$vek',  '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="šplh"){
//$points = splh($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`,  `gender`, `age`,  `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '9',   '$sex', '$vek',  '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="25m plavání"){
//$points = dvacetpetkavz($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`,  `gender`, `age`,  `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '10',   '$sex', '$vek',  '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="50m plavání"){
//$points = padesatkavz($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`,  `gender`, `age`,  `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '11',   '$sex', '$vek',  '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);
}
elseif($discipline =="100m plavání"){
//$points = stovkavz($koeficient,$vykon,$sex);
$request = "INSERT INTO `sport_gymtri_cz`.`event_score` (`id`, `event_id`, `class_id`, `athlete_id`, `discipline_id`,  `gender`, `age`,  `first_name`, `last_name`, `class_name`, `event_name`, `event_date`) VALUES (NULL, '$id', '$class', '$athleteid', '12',   '$sex', '$vek',  '$jmeno', '$prijmeni', '$trida', '$event_name', '$event_date')";
$result = $mysqli->query($request);

}
else{exit;}*/
echo "<script>window.close();</script>";
