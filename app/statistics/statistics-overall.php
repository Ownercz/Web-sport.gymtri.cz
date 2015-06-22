<?PHP include "../../functions/check.php";
include "../../functions/functions.php";
include "../../functions/dbconnect.php";
?>
<?php
/**
 * Created by PhpStorm.
 * User: radim_000
 * Date: 22. 6. 2015
 * Time: 16:18
 */
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}  //Get event id from previous page
//First we find every class registered in the event
$request = "SELECT * FROM `classes` WHERE `event_id` = 1 ORDER BY `yearbegin` DESC";
$result = $mysqli->query($request);
$i = 0;
while ($row = $result->fetch_array(MYSQL_ASSOC)) {
    $beginyear = $row["yearbegin"];
    $now = date("Y");
    $year = $now - $beginyear;

    $className = classConstruct($year, $row["type"]);
    $classesArray[$i] = $className;
    $requestInside = "SELECT *    FROM  `event_score` WHERE  `event_id` =1    AND  `class_name` LIKE  '$className';";
    //echo$requestInside."<br>";
    $resultInside = $mysqli->query($requestInside);
    while ($rowInside = $resultInside->fetch_array(MYSQL_ASSOC)) {
        $points[$i] = $points[$i] + $rowInside["score_points"];

    }
    //echo  $classesArray[$i]."|".$points[$i]."<br>";
    $i++;
}
$x = 0;
while ($x < ($i + 1)) {
   // echo $classesArray[$x] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $points[$x] . "<br>";
    $z = 0;
    while ($z < $x) {
        if ($points[$z] < $points[$z + 1]) {
            $tempclass = $classesArray[$z];
            $classesArray[$z] = $classesArray[$z + 1];
            $classesArray[$z + 1] = $tempclass;
            $tempPoints = $points[$z];
            $points[$z] = $points[$z + 1];
            $points[$z+1]=$tempPoints;
        }
        $z++;
    }
    $x++;
}
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
$x=0;
while ($x < ($i + 1)) {
    echo $classesArray[$x] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $points[$x] . "<br>";
    $x++;
}
