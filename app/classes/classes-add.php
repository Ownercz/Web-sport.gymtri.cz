<?PHP include $_SERVER['DOCUMENT_ROOT'] . "/functions/check.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/functions.php";
include $_SERVER['DOCUMENT_ROOT'] . "/header.php";
?>

<div class='container theme-showcase' role='main'>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class='page-header'>
        <h1><span class="label label-default">Registrace tříd do závodu</span></h1>
    </div>

    <?PHP
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = null;
    }

    if (isset($_GET['classes'])) {
        $classes = $_GET['classes'];
        $tridy = $classes;
    } else {
        $classes = null;
        $tridy = null;
    }


    if (isset($_GET['yearbegin'])) {
        $yearbegin = $_GET['yearbegin'];
        $zacatek = $yearbegin;
        $yearbegin = explode(",", $yearbegin);
    } else {
        $zacatek = null;
    }
    //$yearbegin = null;

    if (isset($classes)) {
        $classes = explode(",", $classes);
    } else {
        $classes = array();
    }

    /*if (isset($_GET['classadd'])) {
        array_push($classes, $_GET['classadd']);
        $classes = implode(",", $classes);
    } else {
        $classes = null;
    }*/
    /*
        if (isset($yearbegin)) {
            $yearbegin = explode(",", $yearbegin);
            exit;
        } else {
            $yearbegin = null;
        }

       /* if (isset($_GET['yearadd']) && isset($yearbegin)) {
            array_push($yearbegin, $_GET['yearadd']);
            $yearbegin = implode(",", $yearbegin);
        } else {
            $yearbegin = null;
        }*/


    include $_SERVER['DOCUMENT_ROOT'] . "/functions/dbconnect.php";
    if (isset($_GET['id'])) { //Když se závod podaří vybrat
        echo "<div class='alert alert-info' role='alert'><strong>Vybráno!</strong> Závod byl úspěšně vybrán a nyní je potřeba do něj zaregistrovat třídy. (pokud byl vybrán špatný závod, klepněte <a href='?'>zde</a>)</div>";

        $request = "SELECT DISTINCT class,yearbegin FROM athletes ORDER by athletes.yearbegin DESC LIMIT 0,30";
        $result = $mysqli->query($request);
        $row_cnt = $result->num_rows;
        if ($row_cnt == 0) {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Nebyly nalezeny žádné třídy! <strong><a href='javascript:history.go(-1)'>Před přidáním tříd do závodu je nutné vytvořit třídy.</a></strong>";
            echo "</div>";
        } else {
            echo "<h2><span class='label label-warning'>2. Vyberte třídy</span></h2><form><div class='list-group'>";
            echo "<table class='table table-hover' style='margin-bottom:0px;'>

        <thead>
        <tr>
            <th>#</th>
            <th>Třída</th>
            <th>Přidat</th>
        </tr>
        </thead>
        <tbody>";
            $i = 0;
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $singleClass = $row["class"];
                $yearbegin = $row["yearbegin"];
                $newrequest = "SELECT * FROM `athletes` WHERE `class` LIKE '$singleClass' AND `yearbegin` = '$yearbegin' LIMIT 0,1";
                $newresult = $mysqli->query($newrequest);
                while ($newrow = $newresult->fetch_array(MYSQLI_ASSOC)) {
                    $neededId = $newrow["id"];
                }
                echo "<form action='classes-add-script.php?class=" . $row["class"] . "&yearbegin=" . $row["yearbegin"] . "' method='POST' target='_blank' onsubmit='setTimeout(function () { window.location.reload(); }, 30)'>
                <tr><td>" . $i . "</td><td class='name'>" . className($id, $neededId, $mysqli) . "</td>";
                echo "<td class='discipline'><input type='submit' class='btn btn-xs btn-info'    value='Přidat'></input></td></form></tr>
        ";
                $i++;
            }
            echo "</tbody></table>";

            /*
             * Výpis tříd zaregistrovaných v soutěži
             */

            $requestx = "SELECT * FROM `classes` WHERE `event_id` = $id";
            $resultx = $mysqli->query($requestx);
            $row_cnt = $resultx->num_rows;
            if ($row_cnt == 0) {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "Ještě jste nic nepřidali!";
                echo "</div>";
            } else {


                echo "<h2><span class='label label-warning'>Zaregistrované třídy v soutěži</span></h2><form><div class='list-group'>";
                echo "<table class='table table-hover' style='margin-bottom:0px;'>

        <thead>
        <tr>
            <th>#</th>
            <th>Třída</th>
            <th>Odstranit</th>
        </tr>
        </thead>
        <tbody>";
                $i = 0;
                while ($rowx = $resultx->fetch_array(MYSQLI_ASSOC)) {
                    $singleClass = $rowx["type"];
                    $yearbegin = $rowx["yearbegin"];
                    $newrequest = "SELECT * FROM `athletes` WHERE `class` LIKE '$singleClass' AND `yearbegin` = '$yearbegin' LIMIT 0,1";
                    $newresult = $mysqli->query($newrequest);
                    while ($newrow = $newresult->fetch_array(MYSQLI_ASSOC)) {
                        $neededId = $newrow["id"];
                    }

                    echo "<tr><td>" . $i . "</td><td class='name'>" . className($id, $neededId, $mysqli) . "</td>";
                    echo "<td><a href='classes-add-script.php?&delete=1&id=" . $rowx["id"] . "' target='_blank' onclick='setTimeout(function () { window.location.reload(); }, 30)'><button type='button' class='btn btn-xs btn-danger'>
  <span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Odstranit
</button></a></td></tr>";
                    $i++;
                }
                echo "</tbody></table>";

            }


        }
    } else { //Výběr soutěží
        $request = "SELECT * FROM `event` ORDER BY `event_date`";
        $result = $mysqli->query($request);
        $row_cnt = $result->num_rows;
        echo "<h2><span class='label label-warning'>1. Vyberte soutěž</span></h2><form><div class='list-group'>";
        if ($row_cnt == 0) {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Nebyly nalezeny žádné soutěže! <strong><a href='javascript:history.go(-1)'>Zpět.</a></strong>";
            echo "</div>";
        } else {
            while ($row = $result->fetch_array(MYSQLI_NUM)) {
                echo "<a href='?id=" . $row[0] . "' class='list-group-item'>Název: " . $row[1] . " Datum: " . $row[4] . "</a>";
            }
            echo "</div></form>";
        }
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
