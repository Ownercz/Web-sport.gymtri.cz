<?PHP
//include $_SERVER['DOCUMENT_ROOT']."/functions/check.php";
include $_SERVER['DOCUMENT_ROOT']."/functions/dbconnect.php";
include "disciplines.php";
if(isset($_GET['delete'])){
$athleteidtodelete=$_GET['athleteidtodelete'];
$request = "DELETE FROM `sport_gymtri_cz`.`event_score` WHERE `event_score`.`id` = $athleteidtodelete";
$result = $mysqli->query($request);
echo "<script>window.close();</script>";
exit;
}

if(isset($_POST['discipline'])){$discipline = $_POST['discipline']; }elseif(isset($_GET['discipline'])){$discipline=$_GET["discipline"];}
if(isset($_GET['vek'])){$vek = $_GET['vek'];$vek = str_replace(",",".",$vek); }
if(isset($_GET['trida'])){$trida = $_GET['trida']; }
if(isset($_GET['classid'])){$class = $_GET['classid']; }
if(isset($_GET['sex'])){$sex = $_GET['sex'];$sex = str_replace(",",".",$sex); }
if(isset($_GET['id'])){$id = $_GET['id'];$id = str_replace(",",".",$id); }
if(isset($_GET['athleteid'])){$athleteid = $_GET['athleteid'];$athleteid = str_replace(",",".",$athleteid); }
if($_POST['sebrlecup']=="yes"){
    $request1= "SELECT * FROM `discipline`"  ;
    $result1 = $mysqli->query($request1);
    $disciplines = array(); $disciplinesid=array();
    $i = 0;
    while($row1 = $result1->fetch_array(MYSQLI_NUM)){
        array_push($disciplines,  $row1[1]);
        array_push($disciplinesid,  $row1[0]);

    }
    foreach ($disciplines as &$disciplineOne) {
        //curl volání pro všechny disciplíny?id=".$id."&athleteid=".$row[0]."&vek=".$vek."&sex=".$row[3]."&classid=".$classid."&trida=".$trida."
        //běhy dle věku
        //online soupisky
        //startovka polohový závod
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/app/start-list/start-list-set-script.php?id=".$id."&athleteid=".$athleteid."&vek=".$vek."&sex=".$sex."&classid=".$class."&trida=".$trida."&discipline=".$disciplineOne);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output=curl_exec($ch);
        curl_close($ch);
    }
    echo "<script>window.close();</script>";
    exit;
}
/*athlete info*/
 $request1="SELECT * FROM `athletes` WHERE `id` = $athleteid ";
 $result1 = $mysqli->query($request1);
 while($row1 = $result1->fetch_array(MYSQLI_NUM)){$jmeno = $row1[1]; $prijmeni = $row1[2];}
    $request2 ="SELECT * FROM `event` WHERE `id` = $id ";
    $result2 = $mysqli->query($request2);
    while($row2 = $result2->fetch_array(MYSQLI_NUM)){$event_name=$row2[1]; $event_date = $row2[4];}

/*end of athlete info*/

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
else{exit;}
echo "<script>window.close();</script>";
