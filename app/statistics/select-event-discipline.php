<?PHP include"../../functions/check.php";
include"../../functions/functions.php";
include"../../header.php";
?>

<div class='container theme-showcase' role='main'>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class='page-header'>
        <h1><span class="label label-info">Statistika závodu dle jednotlivých disciplín</span></h1>
    </div>

    <?PHP
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
    }

    if (isset($_GET['discipline'])) {
        $discipline = $_GET['discipline'];

    } else {
        $discipline = "no";
    }

    include"../../functions/dbconnect.php";


        $request = "SELECT * FROM `event` ORDER BY `event_date` DESC";
        $result = $mysqli->query($request);
        echo "<h2><span class='label label-warning'>1. Vyberte soutěž</span></h2><form><div class='list-group'>";
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            echo "<a href='statistics-discipline.php?id=" . $id . "' class='list-group-item'><strong> Disciplíny: </strong>Název: " . $row[1] . " Datum: " . $row[4] . "</a>";
            echo "<a href='statistics-class.php?id=" . $id . "' class='list-group-item'><strong> Třídy:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Název: " . $row[1] . " Datum: " . $row[4] . "</a>";
        }
        echo "</div></form>";


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
