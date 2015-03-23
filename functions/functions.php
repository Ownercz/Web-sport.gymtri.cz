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