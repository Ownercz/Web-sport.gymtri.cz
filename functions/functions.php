<?php
/**
 * Created by PhpStorm.
 * User: radim_000
 * Date: 23. 3. 2015
 * Time: 10:51
 */

function athleteInfo($athleteid, $mysqli)
{
    $request = "SELECT * FROM `athletes` WHERE `id` = $athleteid";
    $result = $mysqli->query($request);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row;
}

function eventdiscipline($disciplineid, $eventid, $mysqli)
{
    $request = "SELECT * FROM `event_score` WHERE `event_id` = $eventid AND `discipline_id` = $disciplineid";
    $result = $mysqli->query($request);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row;
}

function removeevent($eventid, $mysqli)
{
    $request = "DELETE FROM `sport_gymtri_cz`.`event_score` WHERE `event_score`.`event_id` = $eventid";
    $result = $mysqli->query($request);
    $request = "DELETE FROM `sport_gymtri_cz`.`event` WHERE `event`.`id` = $eventid";
    $result = $mysqli->query($request);
    return $result;
}

function eventInfo($eventid, $mysqli)
{
    $request = "SELECT * FROM `sport_gymtri_cz`.`event` WHERE `event`.`id` = $eventid";
    $result = $mysqli->query($request);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row;
}

function eventAge($eventid, $athleteid, $mysqli)
{
    $eventinfo = eventInfo($eventid, $mysqli);
    $athleteinfo = athleteInfo($athleteid, $mysqli);
    //$beginyear = preg_replace("/ - Name:.*/", "", $athleteinfo["yearbegin"]);
    //$now = date("Y");
    //$year = $now-$beginyear;
    $eventdatecurrent = new DateTime($eventinfo["event_date"]);
    $birthdate = new DateTime($athleteinfo["birthdate"]);
    $vek = $eventdatecurrent->diff($birthdate);
    $vek = $vek->y;
    return $vek;


}

function eventAgeClass($eventid, $athleteid, $mysqli)
{
    $eventinfo = eventInfo($eventid, $mysqli);
    $athleteinfo = athleteInfo($athleteid, $mysqli);
    $beginyear = preg_replace("/ - Name:.*/", "", $athleteinfo["yearbegin"]);
    $now = date("Y");
    $year = $now - $beginyear;
    /*$eventdatecurrent = new DateTime($eventinfo["event_date"]);
    $birthdate = new DateTime($athleteinfo["birthdate"]);
    $vek = $eventdatecurrent->diff($birthdate);*/
    return $year;


}

function className($eventid, $athleteid, $mysqli)
{
    $year = eventAgeClass($eventid, $athleteid, $mysqli);
    $athleteinfo = athleteInfo($athleteid, $mysqli);
    return $year . "." . $athleteinfo["class"];
}

function removescore($eventid, $athleteid, $mysqli)
{
    $request = "DELETE FROM `sport_gymtri_cz`.`event_score` WHERE `event_score`.`event_id` = $eventid AND `event_score`.`athlete_id` = $athleteid ";
    $result = $mysqli->query($request);
    return $result;
}

function printNice($disciplineName, $time)
{
    if (in_array($disciplineName, array("3000m", "1500m", "100m", "60m", "100m plavání", "50m plavání", "25m plavání"))) {
        $minutes = 0;
        $seconds = 0;
        $total = $time;
        while ($total > 60) {
            $minutes++;
            $total = $total - 60;
        }
        $seconds = $time - (60 * $minutes);

        if ($minutes > 0) {
            if ($seconds < 10) {
                return $minutes . ":0" . number_format((float)$seconds, 2, ',', '');
            } else {
                return $minutes . ":" . number_format((float)$seconds, 2, ',', '');
            }
        } else {
            if ($seconds < 10) {
                return "0" . number_format((float)$seconds, 2, ',', '');
            } else {
                return  number_format((float)$seconds, 2, ',', '');
            }
        }
    } else {
        if ($time == "") {
            $time = 0;
        }
        return number_format((float)$time, 2, ',', '');
    }
}

function printDot($text)
{
    if ($text == "") {
        $text = 0;
    }
    return str_replace(".", ",", $text);
}

function valueFormat()
{
    print "<table style='position:relative;bottom:0;'><h2>Formát výkonů</h2>
     <tr><th>Název disciplíny</th><th>jednotky</th><th>formát</th></tr>
     <tr><td>60m,100m,1500m,3000m sprint</td><td>minuty:sekundy</td><td>[m]:[s]</td></tr>
     <tr><td>granát, míč</td><td>metry</td><td>[m]</td></tr>
     <tr><td>dálka, výška</td><td>centimetry</td><td>[cm]</td></tr>
     <tr><td>šplh</td><td>sekundy</td><td>[s]</td></tr>
     <tr><td>25m,50m,100m plavání</td><td>minuty:sekundy</td><td>[m]:[s]</td></tr>

     </table>";
}

function printInfo()
{
    print "<div style='font-size:10px; position:relative;bottom:0;'><div style='float:left;'>
Vytištěno: " . date("H:i:s d-m-Y") . "</div></div>";
}

function copyright()
{
    include "../../functions/check.php";
    print "<div style='font-size:10px; position:relative;bottom:0;'><div style='float:right;'>
Gymtri Sport verze " . $version . "<br>© Radim Lipovčan " . date("Y") . "</div></div>";
}

function pageDivider($headline, $dateEvent, $time, $disciplines, $author, $type)
{

    echo "</table></div>";
    //if($type=="discipline-single"){valueFormat();}
    printInfo();
    copyright();
    echo "</div></div></div></page>";
    echo "<page size='A4'><div class='book'>
    <div class='page'>
        <div class='subpage'>";


    if ($type == "start-list") {
        echo "<h1>Gymtri startovací listina - <strong>" . $headline . "</strong></h1>
        Soutěž konána: " . $dateEvent . " v " . $time . " <br><br>Zapisující: _________________ <br> <h2>Disciplína: " . $disciplines . "</h2>";
        echo "<table class='thetable'><tr><th>#</th><th>Jméno</th><th>Příjmení</th><th>Datum narození</th><th>Třída</th><th>1. pokus</th><th>2. pokus</th><th>3. pokus</th></tr>";
    }


    if ($type == "discipline-single") {
        echo "<h1>Gymtri výsledková listina - <strong>" . $headline . "</strong></h1>
        Soutěž konána dne: " . $dateEvent . " <br>Vytvořil: " . $time . " <br>";
        if ($author != "") {
            echo "Zapisovali: " . $row2[3] . "<br>";
        }
        echo " <h2>Disciplína: " . $disciplines . "</h2>";
        echo "<table class='thetable'><tr><th>#</th><th>Jméno</th><th>Příjmení</th><th>Výkon</th><th>Body</th></tr>";
    }
    if ($type == "stats-single") {
        echo "<h1>Gymtri výsledková listina - <strong>Průběžné výsledky závodníků</strong></h1>
       ";
        if ($author != "") {
            echo "Zapisovali: " . $row2[3] . "<br>";
        }
        echo " <h2>Disciplína: " . $disciplines . "</h2>";
        echo "<table class='thetable'><tr><th>#</th><th>Jméno</th><th>Příjmení</th><th>Výkon</th></tr>";
    }
    if ($type == "find") {
        echo "<h1>Gymtri Sport</h1>
       ";
        if ($author != "") {
            echo "Zapisovali: " . $row2[3] . "<br>";
        }
        echo " <h2>Sourozenecké dvojice ze startujících závodníků</h2>";
        echo "<table class='thetable'><tr><th>Jméno</th><th>Příjmení</th><th>Jméno</th><th>Příjmení</th></tr>";
    }


}

function classConstruct($prefix, $year)
{
    return $prefix . "." . $year;
}
//funkce pro import trid
//funkce pro export cele DB
//funkce pro export vysledku souteze do csv
