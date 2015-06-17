<?PHP include"../../functions/check.php"; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="UTF-8"/>
<head>
    <title></title>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Tahoma";
        }

        h1 {
            font-size: 15pt;
            text-align: center;

        }

        h2 {
            font-size: 11pt;
            text-align: center;
            border-bottom: 1px solid black;

        }

        table {
            color: #333;
            font-family: Helvetica, Arial, sans-serif;
            width: 640px;
            border-collapse: collapse;
            border-spacing: 0;
        }

        td, th {
            border: 1px solid transparent; /* No more visible border */
            height: 30px;
            transition: all 0.3s; /* Simple transition for hover effect */
        }

        th {
            background: #DFDFDF; /* Darken header a bit */
            font-weight: bold;
        }

        td {
            background: #FAFAFA;
            text-align: center;
        }

        /* Cells in even rows (2,4,6...) are one color */
        tr:nth-child(even) td {
            background: #FEFEFE;
            border-bottom: 1px solid black;
        }

        /* Cells in odd rows (1,3,5...) are another (excludes header cells)  */
        tr:nth-child(odd) td {
            background: #FEFEFE;
            border-bottom: 1px solid black;
        }

        tr td:hover {
            background: #666;
            color: #FFF;
        }

        /* Hover cell effect! */

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 21cm;
            min-height: 29.7cm;
            padding: 2cm;
            margin: 1cm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
            padding: 0, 5cm;

            height: 267mm;

        }

        td {
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }


    </style>
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


echo "<div style='font-size:10px; position:absolute;bottom:0;'><div style='float:right;'><strong>Možná udělat informace jak zapisovat výsledky?<br><br><br>@is.gymtri.cz 2015</strong></div> <div style='float:left;'><strong>Informace:</strong><br>
   V případě <strong>diskvalifikace</strong> přeškrtnout celý řádek.<br>Závodníci jsou připuštění ke startu za třídu pouze, pokud jsou v této startovní listině! <br>V případě náhradníka je nutné nejdříve tuto věc nahlásit u zpracování výsledků.
     </div></div>
    </div></div>
</div>";


?>


</body>
</html>

     