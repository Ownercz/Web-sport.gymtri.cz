<?PHP include"../../functions/check.php"; ?>
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
include"../../functions/dbconnect.php";
$request2 = "SELECT * From event where id = $id;";
$result2 = $mysqli->query($request2);
$row2 = $result2->fetch_array(MYSQLI_NUM);


if (isset($_GET['id'])) {

$request1 = "SELECT * FROM `discipline`";
$result1 = $mysqli->query($request1);
$disciplines = array();
$disciplinesid = array();
$i = 0;
$count = 0;
while ($row1 = $result1->fetch_array(MYSQLI_NUM)) {
    array_push($disciplines, $row1[1]);
    array_push($disciplinesid, $row1[0]);
    $count++;
}


echo "<div class='book'>
    <div class='page'>
        <div class='subpage'><h1>Gymtri plán soutěže - <strong>" . $row2[1] . "</strong></h1>
        Soutěž konána dne: " . $row2[4] . " <br> <h2>Harmonogram: </h2>";// . $disciplines[$discipline] . "</h2>";
echo "<table class='thetable'><tr><th>#</th><th>Název disciplíny</th><th>Čas startu závodu</th></tr>";
    $casy = array();
    $ids=array();
while($i<$count){
    array_push($casy,$row2[$i+6]);
    array_push($ids,$i);
    $i++;

}
    $i=0;$x=0;
    while($i<$count){


        while(($x+1)<$count){
            {$one = substr($casy[$x],0,2);
            $two = substr($casy[$x+1],0,2);
            $onem = substr($casy[$x],3,2);
            $twom = substr($casy[$x+1],3,2);

            //new Datetime

            $diff =$one-$two;
            $diff2=$onem-$twom;}
            //date_diff($one,$two,1);
        if($diff>0){
           // echo$one."+".$two."<br>";

                $tmp = $casy[$x];
                $tmpid = $ids[$x];
                $casy[$x] = $casy[$x+ 1];
                $ids[$x] = $ids[$x+ 1];
                $casy[$x+ 1] = $tmp;
                $ids[$x+ 1] = $tmpid;



        }elseif($diff==0){
            if($diff2>0) {
                $tmp = $casy[$x];
                $tmpid = $ids[$x];
                $casy[$x] = $casy[$x+ 1];
                $ids[$x] = $ids[$x+ 1];
                $casy[$x+ 1] = $tmp;
                $ids[$x+ 1] = $tmpid;
            }
        }
            $x++;
        }
        $x=0;
        $i++;
}
$i=0;
while ($i < $count) {
    echo "<tr><td>".($i+1)."</td><td>". $disciplines[$ids[$i]]."</td><td>" . $casy[$i]."</td></tr>"; $i++;
}




    /*$request = "SELECT * From event_score where event_id = $id AND discipline_id = $discipline;";
    $result = $mysqli->query($request);
    $i = 1;



    /*echo " < table class='thetable' ><tr ><th >#</th><th>Jméno</th><th>Příjmení</th><th>1. pokus</th><th>2. pokus</th><th>3. pokus</th></tr>";
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        echo "
          <tr><td>" . $i . ". </td><td>
           " . $row[10] . "</td><td>
           " . $row[11] . "</td><td class='vykon'>
            </td><td class='vykon'>
             </td><td class='vykon'>
           
           ";


        $i++;
    }*/
}
echo "</table>";


echo "<div style='font-size:10px; position:relative;bottom:0;'><div style='float:right;'>
Gymtri Sport verze " . $version . "<br>© Radim Lipovčan 2015</div>

     </div>
    </div></div>
</div>";


?>


</body>
</html>

     