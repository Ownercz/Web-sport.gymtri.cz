<?PHP include $_SERVER['DOCUMENT_ROOT'] . "/functions/check.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/functions.php";
include $_SERVER['DOCUMENT_ROOT'] . "/header.php";
?>

<div class='container theme-showcase' role='main'>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class='page-header'>
        <h1><span class="label label-default">Vložení výsledků</span></h1>
    </div>

    <?PHP

    if (isset($_GET['id'])) {
        $event_id = $_GET['id'];
    }
    if (isset($_GET['discipline'])) {
        $discipline_id = $_GET['discipline'];
    }
    //if(isset($_GET['trida'])){$trida= $_GET['trida'];}else{}
    //NOT USED if(isset($_GET['class'])){$class= $_GET['class'];}else{}
    //if(isset($_GET['classid'])){$classid= $_GET['classid'];}else{}
    // if(isset($_GET['beginyear'])){$beginyear= $_GET['beginyear'];}else{}
    include $_SERVER['DOCUMENT_ROOT'] . "/functions/dbconnect.php";
    $request2 = "SELECT * FROM `event` WHERE `id` = $event_id ORDER BY `event_date` DESC";
    $result2 = $mysqli->query($request2);
    while ($row2 = $result2->fetch_array(MYSQLI_NUM)) {
        $eventdate = $row2[4];
    }


    if (isset($_GET['id'])) {

        $i = 0;
        $i++;//
        $request1 = "SELECT * FROM `discipline`";
        $result1 = $mysqli->query($request1);
        $disciplines = array();
        $disciplinesid = array();
        $i = 0;
        while ($row1 = $result1->fetch_array(MYSQLI_NUM)) {
            array_push($disciplines, $row1[1]);
            array_push($disciplinesid, $row1[0]);

        }

        $request = "SELECT * FROM  `event_score`  WHERE  `score_value` IS NULL  AND  `score_points` IS NULL  AND  `koeficient` IS NULL AND `event_id` = '$event_id' AND `discipline_id` = '$discipline_id'"; //AND `yearbegin` = '$beginyear'"  ; NO USED QUERY
        $result = $mysqli->query($request);
        //echo $classid;
        if ($result->num_rows === 0) {
            echo "<a href='?'><button type='button' class='btn btn-warning'>Nebyl nalezen žádný závodník > zpět!</button></a>";
        } else {
            echo "<table class='table table-hover' style='margin-bottom:0px;'>
        <thead>
        <tr>
            <th>#</th>
            <th>Jméno</th>
            <th>Příjmení</th>
            <th>Pohlaví</th>
            <th>Třída</th>
            <th>Datum narození</th>
            <th>Disciplína</th>
            <th>Výkon</th>
            <th>Vložit</th>
        </tr>
        </thead>
        <tbody>";
            $i = 0;
            $i++;//
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $athlete = athleteinfo($row["athlete_id"], $mysqli);

                $sex = $row["gender"];
                $age = $row["age"];
                echo "<form action='start-list-edit-script.php?id=" . $row["id"] . "' method='POST' target='_blank' onsubmit='setTimeout(function () { window.location.reload(); }, 30)'>
                <tr><td>" . $i . "</td><td class='name'>" . $row["first_name"] . "</td><td class='lastname'>" . $row["last_name"] . "</td>           <td class='sex'>";
                if ($sex == "M") {
                    echo "<span class='label label-primary'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
                } elseif ($sex == "F") {
                    echo "<span class='label label-danger'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
                } else {
                }
                echo "</td>
          <td class='class'>" . eventAgeClass($event_id, $athlete["id"], $mysqli) . "." . $athlete["class"] . "</td><td class='birth'>" . $athlete["birthdate"] . " | Věk: " . $row["age"] . "</td>";
                echo "<td class='class'><span class='label label-info' style='font-size:100%;'>" . $disciplines[$row["discipline_id"] - 1] . "</span></td><input type='hidden' name='discipline' value='" . $disciplines[$row["discipline_id"] - 1] . "'>";
                echo "<td class='class'><input type='text' name='vykon' placeholder='" . rand(0, 59) . "," . rand(0, 59) . "'></td><td><input type='submit' class='btn btn-sm btn-default' value='Vložit'></td>";
            }
            echo "</tbody></table>";
            /* echo "</td><td class='discipline'><input type='submit' class='btn btn-xs btn-info'    value='Změnit'></input></td><td><a href='start-list-edit-script.php?&delete=1&id=" . $row["id"] . "' target='_blank' onclick='setTimeout(function () { window.location.reload(); }, 30)'><button type='button' class='btn btn-xs btn-danger'>
      <span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Odstranit
    </button></a></td></form></tr>
            ";
             $i++;



         /*$i++;
         $birth = $row[4];
         $beginyear = $row[6];*/
            // $beginyear = preg_replace("/ - Name:.*/", "", $beginyear);
            /*
             $now = date("Y");
             $year = $now-$beginyear;
             $eventdatecurrent = new DateTime($eventdate);
             $birthdate = new DateTime($birth);
             $vek = $eventdatecurrent->diff($birthdate);
             $vek = $vek->y;

            echo"<form action='event-score-add-script.php?id=".$id."&athleteid=".$row[0]."&vek=".$vek."&sex=".$row[3]."&classid=".$classid."&trida=".$trida."' method='POST' target='_blank' onsubmit='setTimeout(function () { window.location.reload(); }, 30)'><ul class='list-inline scoreboard'>
                 <li class='labele'>".$i." </li>
                  <li class='name'>".$row[1]."</li>
                  <li class='lastname'>".$row[2]."</li>
                  <li class='sex'>";if($row[3]=="M"){echo"<span class='label label-primary'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";}elseif($row[3]=="F"){echo"<span class='label label-danger'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";}else{}


            echo"</li>
                 <li class='class'>".$year.".".$class."</li><li class='birth'>".$birth." | Věk: ".$vek."

                </li><li class='discipline'> <select name='discipline'>";foreach ($disciplines as &$discipline) {
          echo"<option value='".$discipline."'>".$discipline."</option>";
       }

       echo"</select></li> <li class='score'><input type='text' name='vykon' size='10'></input></li><li class='save'><input type='submit' class='btn btn-sm btn-default' value='Uložit'></input></li></ul></form>
               ";
           */
        }
        //not null
        echo "<div class='alert alert-info' role='alert'>
        <strong>Vložené výsledky</strong> V případě chyby klepněte na smazat a vložte znovu :)
      </div>";
    } else {
        exit;
    }?>

    <div class="row">
        <div class="col-sm-4">
            <ul class="list-group">
                <li class="list-group-item alert-success"><strong>Jak zadat výsledky</strong></li>
                <li class="list-group-item">60m - čas 13,11 sekund zapiš: <strong>13,11</strong></li>
                <li class="list-group-item">100m - čas 13,11 sekund zapiš: <strong>13,11</strong></li>
                <li class="list-group-item">1500m - čas 1 minuta 13,11 sekund zapiš: <strong>01:13,11</strong></li>
                <li class="list-group-item">3000m - čas 1 minuta 13,11 sekund zapiš: <strong>01:13,11</strong></li>
            </ul>
        </div>
        <!-- /.col-sm-4 -->

        <div class="col-sm-4">
            <ul class="list-group">
                <li class="list-group-item alert-success"><strong>Jak zadat výsledky</strong></li>
                <li class="list-group-item">dálka - 433cm zapiš: <strong>433</strong></li>
                <li class="list-group-item">výška - 155cm zapiš: <strong>155</strong></li>
                <li class="list-group-item">míč - 35m zapiš: <strong>35</strong></li>
                <li class="list-group-item">granát - 70m zapiš: <strong>70</strong></li>
            </ul>
        </div>
        <!-- /.col-sm-4 -->


        <div class="col-sm-4">
            <ul class="list-group">
                <li class="list-group-item alert-success"><strong>Jak zadat výsledky</strong></li>
                <li class="list-group-item">šplh - čas 3,11 sekund zapiš: <strong>3,11</strong></li>
                <li class="list-group-item">25m plavání - čas 13,11 sekund zapiš: <strong>13,11</strong></li>
                <li class="list-group-item">50m plavání - čas 1 minuta 13,11s zapiš: <strong>01:13,11</strong></li>
                <li class="list-group-item">100m plavání - čas 1 minuta 13,11s zapiš: <strong>01:13,11</strong></li>
            </ul>
        </div>
        <!-- /.col-sm-4 --></div>
    <?php /*
      $request= "SELECT * FROM `event_score` WHERE `event_id` = $id AND `class_id` = '$classid' ORDER BY `event_score`.`score_points` DESC"  ; 
      $result = $mysqli->query($request);
     $i = 1;
      while($row = $result->fetch_array(MYSQLI_NUM)){
echo"<form action='event-score-add-script.php?id=".$id."&athleteidtodelete=".$row[0]."&delete=1' method='POST' target='_blank' onsubmit='setTimeout(function () { window.location.reload(); }, 30)'><ul class='list-inline scoreboard'>
          <li class='labele'>".$row[0]." </li>
           <li class='name'>".$row[10]."</li>
           <li class='lastname'>".$row[11]."</li>
           <li class='sex'>";if($row[7]=="M"){echo"<span class='label label-primary'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";}elseif($row[7]=="F"){echo"<span class='label label-danger'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";}else{}
          
          
     echo"</li>
          <li class='age'>Věk: ".$row[8]."</li></li class='disciplineresult'>";
          foreach ($disciplinesid as &$discipline) {if ($discipline == $row[4]){ $num = -1+$row[4];echo$disciplines[$num]; }}echo"
         </li>";
         

echo"</select></li><li class='result'>Výkon:".$row[5]." </li><li class='result'>Body: <strong>".$row[6]."</strong> </li><li class='koeficient'>Koeficient: <strong>".$row[9]."</strong></li><li class='save'><input type='submit' class='btn btn-sm btn-danger' value='Smazat'></input></li></ul></form>";
$i++;}
   
      
      
      
     
        
        
       */
    ?>


    <!-- <div class="alert alert-info" role="alert">
       <strong>Upozornění!</strong> Při pozdějším zadávání výsledků se počítá věk atleta dle data zaregistrování soutěže a ne podle aktuálního data.
     </div> -->


</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
<script src='../js/docs.min.js'></script>


</body>
</html>
