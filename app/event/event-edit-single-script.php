<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
   
</head>
<body >





<?PHP  include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/check.php"; 


include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/dbconnect.php";
$id = $mysqli->real_escape_string($_GET['id']);
$event_name = $mysqli->real_escape_string($_POST['event_name']);
$event_creator = $mysqli->real_escape_string($_POST['event_creator']);
$event_editor = $mysqli->real_escape_string($_POST['event_editor']);
$event_date = $mysqli->real_escape_string($_POST['event_date']);
$event_comment = $mysqli->real_escape_string($_POST['event_comment']);
if(isset($_GET['delete'])){$request= "DELETE FROM `sport_gymtri_cz`.`event` WHERE `event`.`id` = $id";$result = $mysqli->query($request);$request="DELETE FROM `sport_gymtri_cz`.`event_score` WHERE `event_score`.`event_id` = $id";$result = $mysqli->query($request);echo "<script>window.close();</script>";exit;}
$request= "UPDATE `sport_gymtri_cz`.`event` SET `event_name` = '$event_name', `event_creator` = '$event_creator', `event_editor` = '$event_editor', `event_date` = '$event_date', `event_comment` = '$event_comment' WHERE `event`.`id` = $id;"; 
 $result = $mysqli->query($request);


echo "<script>window.close();</script>";

?>


</body>
</html>