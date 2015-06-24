    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <meta charset="UTF-8"/>
    <head>
        <title></title>
        <link href='print.css' rel='stylesheet'>
        <link href='nice.css' rel='stylesheet'>
    </head>
    <body>
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
        if(isset($rowInside["score_points"])){$points[$i] = $points[$i] + $rowInside["score_points"];}else{$points[$i]=0;}

    }
    //echo  $classesArray[$i]."|".$points[$i]."<br>";
    $i++;
}
$x = 0;
while ($x < ($i + 1)) {
   // echo $classesArray[$x] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $points[$x] . "<br>";
    $z = 0;
    while ($z < ($i + 1)) {
        if (($z+1)!=13&&$points[$z] < $points[$z + 1]  ) {
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
    $info=eventInfo($id,$mysqli);
    echo "<page size='A4'><div class='book'>
    <div class='page'>
        <div class='subpage'><h1><strong> Vyhodnocení soutěže ".$info["event_name"]." </strong></h1>Soutěž konána dne: " . $info["event_name"] . " <br>Vytvořil: " . $info["event_creator"] . " <br>Zapisovali: " . $info["event_editor"] . " <br> <h2>Vítězná třída: " . $classesArray[0] . "</h2>";
    echo "<table class='thetable'><tr><th>Umístění</th><th>Třída</th><th>Celkový počet bodů</th></tr>";
$x=0;
while ($x < ($i)) {
    echo "<tr><td>".($x+1).".</td><td>".$classesArray[$x] . "</td><td>" . $points[$x] . "</td></tr>";
    $x++;
}
    echo"</table>";
    printInfo();
    copyright();
    echo"</div></div></div></page>";
