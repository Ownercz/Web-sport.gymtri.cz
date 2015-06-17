<?PHP
include"../../functions/dbconnect.php";
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $request = "DELETE FROM `sport_gymtri_cz`.`classes` WHERE `classes`.`id` = $id";
    $result = $mysqli->query($request);
    echo "<script>window.close();</script>";
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $yearbegin = $_GET['yearbegin'];
    $class = $_GET['class'];
    $request = "INSERT INTO `sport_gymtri_cz`.`classes` (`id`, `yearbegin`, `type`, `event_id`) VALUES (NULL, '$yearbegin', '$class', '$id')";
    $result = $mysqli->query($request);
    echo "<script>window.close();</script>";
} else {
    header('Location: ../index.php');
}

/*
 * @deprecated - část k vymazání ze starého systému přidávání classes
 */

/*$classes = array();
$yearbegin = array();
if((isset($_GET['classes'])) && isset($_GET['yearbegin']) && isset($_GET['id'])){
$classes = $_GET['classes'];$yearbegin = $_GET['yearbegin'];$id = $_GET['id'];
}else{echo"Neplatny vstup, jdete na uvodni stranu a vyplnte registraci trid do souteze znova";exit; }

if(isset($classes)){$classes = explode(",",$classes);}else{$classes = array();}
if(isset($yearbegin)){$yearbegin = explode(",",$yearbegin);}else{$yearbegin = array();}
$count1 = count($classes);
$count2 = count($yearbegin);
if ($count1 != $count2){echo"Neplatny vstup, jdete na uvodni stranu a vyplnte registraci trid do souteze znova";exit; }else{$count=$count1;}
$i=0;
while($i<$count){

$request = "INSERT INTO `sport_gymtri_cz`.`classes` (`id`, `yearbegin`, `type`, `event_id`) VALUES (NULL, '$yearbegin[$i]', '$classes[$i]', '$id')";
$result = $mysqli->query($request);

$i++;
}*/
//header('Location: ../index.php');
?>