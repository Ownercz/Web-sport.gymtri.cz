<?PHP
include $_SERVER['DOCUMENT_ROOT']."/functions/dbconnect.php";
$classes = array();
$yearbegin = array();
if((isset($_GET['classes'])) && isset($_GET['yearbegin']) && isset($_GET['id'])){
$classes = $_GET['classes'];$yearbegin = $_GET['yearbegin'];$id = $_GET['id'];
}else{echo"Neplatny vstup, jdete na uvodni stranu a vyplnte registraci trid do souteze znova";exit; }

if(isset($classes)){$classes = explode(",",$classes);}else{$classes = array();}
if(isset($yearbegin)){$yearbegin = explode(",",$yearbegin);}else{$yearbegin = array();}
$count1 = count($classes);
$count2 = count($yearbegin);
if ($count1 != $count2){echo"Neplatny vstup, jdete na uvodni stranu a vyplnte registraci trid do souteze znova";exit; }else{$count=$count1;}
$i=1;
while($i<$count){

$request = "INSERT INTO `sport_gymtri_cz`.`classes` (`id`, `yearbegin`, `type`, `event_id`) VALUES (NULL, '$yearbegin[$i]', '$classes[$i]', '$id')";
$result = $mysqli->query($request);

$i++;
}
header('Location: ../classes/classes-edit.php');
    ?>