<?PHP
include $_SERVER['DOCUMENT_ROOT']."/functions/dbconnect.php";
include $_SERVER['DOCUMENT_ROOT']."/functions/check.php"; 

$eventname = $mysqli->real_escape_string($_POST['eventname']);
$eventorganisator = $mysqli->real_escape_string($_POST['eventorganisator']);
$eventeditor = $mysqli->real_escape_string($_POST['eventeditor']);
$eventdate = $mysqli->real_escape_string($_POST['eventdate']);
$eventcomment = $mysqli->real_escape_string($_POST['eventcomment']);



$request= "INSERT INTO `sport_gymtri_cz`.`event` (`id`, `event_name`, `event_creator`, `event_editor`, `event_date`, `event_comment`) VALUES (NULL, '$eventname', '$eventorganisator', '$eventeditor', '$eventdate', '$eventcomment');"  ; 
 $result = $mysqli->query($request);

    
header('Location: ../index.php?register=1', TRUE, 302);
exit;
    ?>