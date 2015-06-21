<?PHP include "../../functions/check.php"; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="UTF-8"/>
<head>
    <title></title>
    <link href='print.css' rel='stylesheet'>
    <link href='nice.css' rel='stylesheet'>
</head>
<body>

<?PHP





if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
}
if (isset($_GET['trida'])) {
    $trida = $_GET['trida'];
} else {
}
if (isset($_GET['class'])) {
    $class = $_GET['class'];
} else {
}
if (isset($_GET['classid'])) {
    $classid = $_GET['classid'];
} else {
}
if (isset($_GET['beginyear'])) {
    $beginyear = $_GET['beginyear'];
} else {
}
include "../../functions/dbconnect.php";
include "../../functions/functions.php";
$request2 = "SELECT * FROM `event` WHERE `id` = $id ORDER BY `event_date` DESC";
$result2 = $mysqli->query($request2);
$row2 = $result2->fetch_array(MYSQLI_NUM);


if (isset($_GET['id'])) {

    $request1 = "SELECT * FROM `discipline`";
    $result1 = $mysqli->query($request1);
    $disciplines = array();
    $disciplinesid = array();
    $i = 0;
    while ($row1 = $result1->fetch_array(MYSQLI_NUM)) {
        array_push($disciplines, $row1[1]);
        array_push($disciplinesid, $row1[0]);

    }


    $body = 0;

    echo "<page size='A4'><div class='book'>
    <div class='page'>
        <div class='subpage'><h1>Gymtri výsledková listina - <strong>" . $row2[1] . "</strong></h1>
        Soutěž konána dne: " . $row2[4] . " <br>Vytvořil: " . $row2[2] . " <br>Zapisovali: " . $row2[3] . " <br> <h2>Třída: " . $trida . "</h2>";
    $request = "SELECT * FROM `event_score` WHERE `event_id` = $id AND `class_id` = '$classid' ORDER BY `event_score`.`score_points` ASC";
    $result = $mysqli->query($request);
    $i = 1;
    echo "<table class='thetable'><tr><th>#</th><th>Jméno</th><th>Příjmení</th><th>Disciplína</th><th>Výkon</th><th>Body</th></tr>";
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        $body = $body + $row[6];
        echo "
          <tr><td>" . $i . ". </td><td>
           " . $row[10] . "</td><td>
           " . $row[11] . "</td><td>
           ";


        echo "
          ";
        foreach ($disciplinesid as &$discipline) {
            if ($discipline == $row[4]) {
                $num = -1 + $row[4];
                echo $disciplines[$num];
            }
        }
        echo "
         ";


        echo "</td><td><strong>" . printNice($disciplines[$num],$row[5]) . "</strong></td><td><strong>" . printDot($row[6]) . "</td></tr>";
        $i++;
    }
}
echo "<tr><td></td><td></td><td></td><td></td><td>Celkově</td><td>" . printDot($body) . "</td></tr></table>";

valueFormat();

printInfo();
copyright();
echo"</div></div></div></page>";


?>


</body>
</html>

     