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


//funkce pro import trid
//funkce pro export cele DB
//funkce pro export vysledku souteze do csv