<?PHP include"../../functions/check.php";
include"../../functions/functions.php";
?>
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
if (isset($_GET['discipline'])) {
    $discipline = $_GET['discipline'];
} else {
}
include"../../functions/dbconnect.php";
$request2 = "SELECT * From event_score where event_id = $id AND discipline_id = $discipline;";
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

    $requestTime="SELECT * FROM `event` WHERE `id` = $id";
    $resultTime= $mysqli->query($requestTime);
    while ($rowTime = $resultTime->fetch_array(MYSQLI_ASSOC)) {

        $time=$rowTime[$discipline+1]; //offset at table event

    }
    $dateEvent=str_replace("-",".",$row2[14]);
    echo "<page size='A4'><div class='book'>
    <div class='page'>
        <div class='subpage'><h1>Gymtri startovací listina - <strong>" . $row2[13] . "</strong></h1>
        Soutěž konána: " . $dateEvent . " v ".$time." <br><br>Zapisující: _________________ <br> <h2>Disciplína: " . $disciplines[$discipline-1] . "</h2>";
    $request = "SELECT * From event_score where event_id = $id AND discipline_id = $discipline ORDER BY  `event_score`.`class_name` ASC ;";
    $result = $mysqli->query($request);
    $i = 1; $count=0;
    echo "<table class='thetable'><tr><th>#</th><th>Jméno</th><th>Příjmení</th><th>Datum narození</th><th>Třída</th><th>1. pokus</th><th>2. pokus</th><th>3. pokus</th></tr>";
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        $count++;
        if($count>26){$count=0;pageDivider($row2[13],$dateEvent,$time,$disciplines[$discipline-1],null,"start-list");}
        $athlete=athleteInfo($row[3],$mysqli);
       // echo$row[4];
        //$year=eventAge($id,$row[4],$mysqli);
        $class=eventAgeClass($id,$row[3],$mysqli);
        $birthdate = $athlete['birthdate'];
        $birthdate=str_replace("-",".",$birthdate);
        echo "
          <tr><td>" . $i . ". </td><td>
           " . $row[10] . "</td><td>
           " . $row[11] . "</td><td>
           " .$birthdate /*eventAge($id,$row[3],$mysqli)*/ . "</td><td>
           " . className($id,$row[3],$mysqli) . "</td><td class='vykon'>
            </td><td class='vykon'>
             </td><td class='vykon'></td>
           
           ";


        $i++;
    }
}
$i = 0;
while($i<5){
echo "
          <tr><td></td><td></td><td></td><td></td><td></td><td class='vykon'>
            </td><td class='vykon'>
             </td><td class='vykon'></td>

           ";
$i++;}

echo "</table></div>";
if(2+2==3){valueFormat();}
printInfo();
copyright();
echo"</div></div></div></page>";




?>


</body>
</html>

     