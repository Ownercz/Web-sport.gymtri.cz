
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <meta charset="UTF-8"/>
    <head>
        <title></title>
        <link href='print.css' rel='stylesheet'>
        <link href='nice.css' rel='stylesheet'>
    </head>
    <body>
    <?PHP include"../../functions/check.php";
include"../../functions/functions.php";
include "../../functions/dbconnect.php";
?>
<?PHP
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$request1 = "SELECT * FROM `discipline` ORDER by id ASC";
$result1 = $mysqli->query($request1);
$disciplines = array();
$disciplinesid = array();
$i = 0;
while ($row1 = $result1->fetch_array(MYSQLI_NUM)) {
    array_push($disciplines, $row1[1]);
    array_push($disciplinesid, $row1[0]);

}
    echo "<page size='A4'><div class='book'>
    <div class='page'>
        <div class='subpage'><h1>Gymtri výsledková listina - <strong> statistika </strong></h1>";
    $foreachSingle=0;
foreach($disciplinesid as $single){
$request = "SELECT * FROM `event_score` WHERE `event_id` LIKE $id AND `discipline_id` LIKE $single ORDER by score_points DESC LIMIT 0,3;";
    //echo$request."<br>";
    $result = $mysqli->query($request);
    $i = 1;
    $foreachSingle++;
    if(mysqli_num_rows($result)== 0){}else{
    echo "<table class='thetable'><tr><th>#</th><th>Jméno</th><th>Příjmení</th><th>Třída</th><th>Výkon</th><th>Body</th></tr>";
        echo"<h2>".$disciplines[$single-1]."</h2>";
    while ($row = $result->fetch_array(MYSQL_ASSOC)) {
        echo "
          <tr><td>" . $i . ". </td><td>
           " . $row["first_name"] . "</td><td>
           " . $row["last_name"] . "</td><td>
           " . $row["class_name"] . "</td><td>
           " . printNice($disciplines[$single-1],$row["score_value"]) . "</td><td>
           " . $row["score_points"] . "</td>
           </tr>";

        //echo "<td><strong>" . printNice($disciplines[$num],$row[5]) . "</strong></td><td><strong>" . printDot($row[6]) . "</td></tr>";
        $i++;
    }
    if($foreachSingle>4){pageDivider(null, null, null, $single, NULL, "statistics-discipline"); $foreachSingle=0;}
    echo "</table>";

    }
}valueFormat();
    copyright();
    printInfo();