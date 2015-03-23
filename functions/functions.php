<?php
/**
 * Created by PhpStorm.
 * User: radim_000
 * Date: 23. 3. 2015
 * Time: 10:51
 */

function athleteinfo($athleteid,$mysqli){
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
function removescore($eventid,$athleteid,$mysqli){
    $request = "DELETE FROM `sport_gymtri_cz`.`event_score` WHERE `event_score`.`event_id` = $eventid AND `event_score`.`athlete_id` = $athleteid ";
    $result = $mysqli->query($request);
    return $result;
}