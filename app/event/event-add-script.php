<?PHP
include "../../functions/dbconnect.php";
include "../../functions/check.php"; 

$eventname = $mysqli->real_escape_string($_POST['eventname']);
$eventorganisator = $mysqli->real_escape_string($_POST['eventorganisator']);
$eventeditor = $mysqli->real_escape_string($_POST['eventeditor']);
$eventdate = $mysqli->real_escape_string($_POST['eventdate']);
$eventcomment = $mysqli->real_escape_string($_POST['eventcomment']);

//Po pridani dalsi discipliny do seznamu upravit POST a i DB tabulku event
$a= $_POST['1'];
$b= $_POST['2'];
$c= $_POST['3'];
$d= $_POST['4'];
$e= $_POST['5'];
$f= $_POST['6'];
$g= $_POST['7'];
$h= $_POST['8'];
$i= $_POST['9'];
$j= $_POST['10'];
$k= $_POST['11'];
$l= $_POST['12'];


$request= "INSERT INTO `sport_gymtri_cz`.`event` (`id`, `event_name`, `event_creator`, `event_editor`, `event_date`, `event_comment`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`) VALUES (NULL, '$eventname', '$eventorganisator', '$eventeditor', '$eventdate', '$eventcomment', '$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i', '$j', '$k', '$l'); "  ;
 $result = $mysqli->query($request);

    
header('Location: ../index.php?register=1', TRUE, 302);
exit;
    ?>