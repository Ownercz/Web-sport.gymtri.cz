<?php
/**
 * Created by PhpStorm.
 * User: radim_000
 * Date: 23. 3. 2015
 * Time: 10:51
 */

function athleteInfo($athleteid,$mysqli){
    $request = "SELECT * FROM `athletes` WHERE `id` = $athleteid";
    $result = $mysqli->query($request);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row;
}
function eventdiscipline($disciplineid,$eventid,$mysqli){
    $request = "SELECT * FROM `event_score` WHERE `event_id` = $eventid AND `discipline_id` = $disciplineid";
    $result = $mysqli->query($request);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row;
}
function removeevent($eventid,$mysqli){
    $request = "DELETE FROM `sport_gymtri_cz`.`event_score` WHERE `event_score`.`event_id` = $eventid";
    $result = $mysqli->query($request);
    $request = "DELETE FROM `sport_gymtri_cz`.`event` WHERE `event`.`id` = $eventid";
    $result = $mysqli->query($request);
    return $result;
}
function eventInfo($eventid,$mysqli){
    $request = "SELECT * FROM `sport_gymtri_cz`.`event` WHERE `event`.`id` = $eventid";
    $result = $mysqli->query($request);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row;
}
function eventAge($eventid,$athleteid,$mysqli){
    $eventinfo = eventInfo($eventid,$mysqli);
    $athleteinfo= athleteInfo($athleteid,$mysqli);
    //$beginyear = preg_replace("/ - Name:.*/", "", $athleteinfo["yearbegin"]);
    //$now = date("Y");
    //$year = $now-$beginyear;
    $eventdatecurrent = new DateTime($eventinfo["event_date"]);
    $birthdate = new DateTime($athleteinfo["birthdate"]);
    $vek = $eventdatecurrent->diff($birthdate);
    $vek=$vek->y;
    return $vek;


}
function eventAgeClass($eventid,$athleteid,$mysqli){
    $eventinfo = eventInfo($eventid,$mysqli);
    $athleteinfo= athleteInfo($athleteid,$mysqli);
    $beginyear = preg_replace("/ - Name:.*/", "", $athleteinfo["yearbegin"]);
    $now = date("Y");
    $year = $now-$beginyear;
    /*$eventdatecurrent = new DateTime($eventinfo["event_date"]);
    $birthdate = new DateTime($athleteinfo["birthdate"]);
    $vek = $eventdatecurrent->diff($birthdate);*/
    return $year;


}
function className($eventid,$athleteid,$mysqli){
    $year = eventAgeClass($eventid,$athleteid,$mysqli);
    $athleteinfo= athleteInfo($athleteid,$mysqli);
    return $year.".".$athleteinfo["class"];
}
function removescore($eventid,$athleteid,$mysqli){
    $request = "DELETE FROM `sport_gymtri_cz`.`event_score` WHERE `event_score`.`event_id` = $eventid AND `event_score`.`athlete_id` = $athleteid ";
    $result = $mysqli->query($request);
    return $result;
}

function printNice($disciplineName,$time){
    if(in_array($disciplineName,array("3000m","1500m","100m","60m","100m plavání","50m plavání","25m plavání"))){$minutes=0;$seconds=0;$total=$time;
    while($total>60){
        $minutes++;
        $total=$total-60;
    }
        $seconds=$time-(60*$minutes);
        $seconds= str_replace(".",",",$seconds);
        if($minutes>0){return $minutes.":".$seconds;}
        else{return $seconds;}
    }else{return $time;}
}

function printDot($text){
    return str_replace(".",",",$text);
}

function valueFormat(){
    print "<h2>Formát výkonů</h2>
     <table><tr><th>Název disciplíny</th><th>jednotky</th><th>formát</th></tr>
     <tr><td>60m,100m,1500m,3000m sprint</td><td>sekundy</td><td>[s]</td></tr>
     <tr><td>granát, míč</td><td>metry</td><td>[m]</td></tr>
     <tr><td>dálka, výška</td><td>centimetry</td><td>[cm]</td></tr>
     <tr><td>šplh</td><td>sekundy</td><td>[s]</td></tr>
     <tr><td>25m,50m,100m plavání</td><td>sekundy</td><td>[s]</td></tr>

     </table>";
}
function copyright(){
    include "../../functions/check.php";
    print "<div style='font-size:10px; position:relative;bottom:0;'><div style='float:right;'>
Gymtri Sport verze " . $version . "<br>© Radim Lipovčan ".date("Y")."</div></div></div></div></page>";
}

//funkce pro import trid
//funkce pro export cele DB
//funkce pro export vysledku souteze do csv