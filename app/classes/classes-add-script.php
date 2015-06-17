<?PHP
include"../../functions/dbconnect.php";
if (isset($_GET['delete'])) {
    $id = $mysqli->real_escape_string($_GET['id']);
    $request = "DELETE FROM `sport_gymtri_cz`.`classes` WHERE `classes`.`id` = $id";
    $result = $mysqli->query($request);
    echo "<script>window.close();</script>";
} elseif (isset($_GET['id'])) {
    $id = $mysqli->real_escape_string($_GET['id']);
    $yearbegin = $mysqli->real_escape_string($_GET['yearbegin']);
    $class = $mysqli->real_escape_string($_GET['class']);
    $request = "INSERT INTO `sport_gymtri_cz`.`classes` (`id`, `yearbegin`, `type`, `event_id`) VALUES (NULL, '$yearbegin', '$class', '$id')";
    $result = $mysqli->query($request);
    echo "<script>window.close();</script>";
} else {
    header('Location: ../index.php');
}
?>