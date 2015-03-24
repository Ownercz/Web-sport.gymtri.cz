<?PHP include $_SERVER['DOCUMENT_ROOT'] . "/functions/check.php"; include $_SERVER['DOCUMENT_ROOT'] . "/functions/functions.php";
include $_SERVER['DOCUMENT_ROOT'] . "/header.php";
?>

<div class='container theme-showcase' role='main'>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class='page-header'>
        <h1><span class="label label-default">Úprava závodníků v jednotlivých disciplínách</span></h1>
    </div>

    <?PHP
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
    }

    if(isset($_GET['discipline'])){
        $discipline=$_GET['discipline'];

    }else{$discipline="no";}

    include $_SERVER['DOCUMENT_ROOT'] . "/functions/dbconnect.php";
    if (isset($_GET['id'])&&($discipline=="no")) {
        echo "<div class='alert alert-info' role='alert'>
        <strong>Vybráno!</strong> Závod byl úspěšně vybrán a nyní je potřeba vybrat disciplínu k edtitaci startovky! (pokud byl vybrán špatný závod, klepněte <a href='?'>zde</a>)
      </div>";
        $request1 = "SELECT * FROM `discipline` ORDER by id ASC";
        $result1 = $mysqli->query($request1);
        $disciplines = array();
        $disciplinesid = array();
        $i = 0;
        while ($row1 = $result1->fetch_array(MYSQLI_NUM)) {
            array_push($disciplines, $row1[1]);
            array_push($disciplinesid, $row1[0]);

        }

        echo "<h2><span class='label label-warning'>2. Vyberte třídy pro nastavení disciplíny</span></h2><form><div class='list-group'>";
        foreach ($disciplines as &$discipline) {
            echo "<a href='start-list-edit.php?id=" . $id . "&discipline=" . $i++ . "' class='list-group-item'>" . $discipline . "</a>";
        }


    } elseif (isset($_GET['id']) && isset($_GET['discipline'])) {
        $discipline = $_GET['discipline'];
        $id = $_GET['id'];
        $request1 = "SELECT * FROM `discipline`";
        $result1 = $mysqli->query($request1);
        $disciplines = array();
        $disciplinesid = array();
        $i = 0;
        while ($row1 = $result1->fetch_array(MYSQLI_NUM)) {
            array_push($disciplines, $row1[1]);
            array_push($disciplinesid, $row1[0]);

        }
        //get event date
        $request = "SELECT * FROM `event` WHERE `id` = $id";
        $result = $mysqli->query($request);
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {$eventdate=$row["event_date"];
           // print $eventdate;
        //$eventdate=preg_replace("-","/")
        }
      /*  function athleteinfo($athleteid,$mysqli){
            $request = "SELECT * FROM `athletes` WHERE `id` = $athleteid";
            $result = $mysqli->query($request);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            return $row;


        }*/

        //$athlete = athleteinfo(3,$mysqli);
        //print_r($athlete);
        $request = "SELECT * FROM `event_score` WHERE `event_id` = $id AND `discipline_id` = $discipline";
        $result = $mysqli->query($request);
        if($result->num_rows === 0)
        {
            echo "<a href='?'>Nenalezeno > zpět!</a>";
        }
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $athlete=athleteinfo($row["athlete_id"],$mysqli);

            $sex = $row["gender"];
            $age = $row["age"];
            echo "<form action='start-list-edit-script.php?id=" . $id . "&athleteid=" . $row["athlete_id"] . "' method='POST' target='_blank' onsubmit='setTimeout(function () { window.location.reload(); }, 30)'><tr>

           <td class='name'>" . $row["first_name"] . "</td>
           <td class='lastname'>" . $row["last_name"] . "</td>
           <td class='sex'>";
            if ($sex == "M") {
                echo "<span class='label label-primary'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
            } elseif ($sex == "F") {
                echo "<span class='label label-danger'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
            } else {
            }
            echo$disciplines[$discipline];

            echo "<td class='discipline'> <select name='discipline'>";
            foreach ($disciplines as &$disciplineName) { //@Overrides simple input!
                /*if (($age <= 14) && ($sex == "M") && ($disciplineName == "100m" || $disciplineName == "3000m" || $disciplineName == "50m plavání" || $disciplineName == "100m plavání" || $disciplineName == "granát")) {
                } elseif (($age <= 14) && ($sex == "F") && ($disciplineName == "100m" || $disciplineName == "3000m" || $disciplineName == "50m plavání" || $disciplineName == "100m plavání" || $disciplineName == "granát")) {
                } elseif (($age == 15 || $age == 16) && ($sex == "M") && ($disciplineName == "60m" || $disciplineName == "1500m" || $disciplineName == "25m plavání" || $disciplineName == "100m plavání" || $disciplineName == "míč")) {
                } elseif (($age == 15 || $age == 16) && ($sex == "F") && ($disciplineName == "60m" || $disciplineName == "3000m" || $disciplineName == "25m plavání" || $disciplineName == "100m plavání" || $disciplineName == "míč")) {
                } elseif (($age > 16) && ($sex == "M") && ($disciplineName == "60m" || $disciplineName == "1500m" || $disciplineName == "25m plavání" || $disciplineName == "100m plavání" || $disciplineName == "míč")) {
                } elseif (($age > 16) && ($sex == "F") && ($disciplineName == "60m" || $disciplineName == "3000m" || $disciplineName == "25m plavání" || $disciplineName == "100m plavání" || $disciplineName == "míč")) {
                } else {*/
                    echo "<option value='" . $disciplineName."'";
                    //if($disciplinesid[$i]==$discipline){echo"selected";}
                    echo">" . $disciplineName . "</option>";
                //}
            }

            echo "><input type='submit' class='btn btn-sm btn-default' value='Změnit'></input></td></form></tr>
        ";
        }

    } else {
        $request = "SELECT * FROM `event` ORDER BY `event_date` DESC";
        $result = $mysqli->query($request);
        echo "<h2><span class='label label-warning'>1. Vyberte soutěž</span></h2><form><div class='list-group'>";
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            echo "<a href='?id=" . $row[0] . "&dateevent=" . $row[4] . "' class='list-group-item'>Název: " . $row[1] . " Datum: " . $row[4] . "</a>";
        }
        echo "</div></form>";
    }

    ?>


</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
<script src='../js/docs.min.js'></script>


</body>
</html>
