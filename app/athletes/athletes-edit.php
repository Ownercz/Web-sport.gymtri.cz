﻿<?PHP
include"../../functions/check.php";
include"../../functions/dbconnect.php";
include"../../functions/functions.php";
include"../../header.php";
?>
<div class='container theme-showcase' role='main'>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class='page-header'>
        <h1>Vyberte třídu k editaci</h1>
    </div>
    <div class='row'>
        <div class='col-md-12'>
            <table class='table'>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Třída</th>
                    <th>Začátek studia</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?PHP
                $i = 0;
                $request = "SELECT DISTINCT class,yearbegin FROM athletes ORDER by athletes.yearbegin DESC";
                $result = $mysqli->query($request);

                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    echo "<tr><td>" . $i . "</td><td>" . (date('Y') - $row['yearbegin']) . "." . $row['class'] . "</td><td>" . $row['yearbegin'] . "</td><td><form method='POST' style='margin:0'action='athletes-edit-class.php?&class=" . $row['class'] . "&yearbegin=" . $row['yearbegin'] . "'><input type='submit' value='upravit' class='btn btn-primary'></input></form></td></tr>";
                    $i++;
                }

                ?>
                </tbody>
            </table>
        </div>

    </div>


</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
<script src='../js/docs.min.js'></script>


</body>
</html>
