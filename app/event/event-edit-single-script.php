<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>

</head>
<body>


<?PHP  include $_SERVER['DOCUMENT_ROOT'] . "/functions/check.php";


include $_SERVER['DOCUMENT_ROOT'] . "/functions/dbconnect.php";
$id = $mysqli->real_escape_string($_GET['id']);
$event_name = $mysqli->real_escape_string($_POST['event_name']);
$event_creator = $mysqli->real_escape_string($_POST['event_creator']);
$event_editor = $mysqli->real_escape_string($_POST['event_editor']);
$event_date = $mysqli->real_escape_string($_POST['event_date']);
$event_comment = $mysqli->real_escape_string($_POST['event_comment']);
$a = $_POST['1'];
$b = $_POST['2'];
$c = $_POST['3'];
$d = $_POST['4'];
$e = $_POST['5'];
$f = $_POST['6'];
$g = $_POST['7'];
$h = $_POST['8'];
$i = $_POST['9'];
$j = $_POST['10'];
$k = $_POST['11'];
$l = $_POST['12'];


if (isset($_GET['delete'])) {
    $request = "DELETE FROM `sport_gymtri_cz`.`event` WHERE `event`.`id` = $id";
    $result = $mysqli->query($request);
    $request = "DELETE FROM `sport_gymtri_cz`.`event_score` WHERE `event_score`.`event_id` = $id";
    $result = $mysqli->query($request);
    echo "<script>window.close();</script>";
    exit;
}
$request = "UPDATE `sport_gymtri_cz`.`event` SET `event_name` = '$event_name', `event_creator` = '$event_creator', `event_editor` = '$event_editor', `event_date` = '$event_date', `event_comment` = '$event_comment', `1` = '$a', `2` = '$b', `3` = '$c', `4` = '$d', `5` = '$e', `6` = '$f', `7` = '$g', `8` = '$h', `9` = '$i', `10` = '$j', `11` = '$k', `12` = '$l' WHERE `event`.`id` = $id; ";
$result = $mysqli->query($request);

//print $result;


echo "<script>window.close();</script>";

?>


</body>
</html>