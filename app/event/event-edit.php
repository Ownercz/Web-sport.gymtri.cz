<?PHP include "../../functions/check.php"; 
  /*
   * DODELAT POZNAMKY K CASU
   */


        include "../../header.php";
?>
    <div class='container theme-showcase' role='main'>

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class='page-header'>
        <h1>Vyberte soutěž k editaci</h1>
      </div>
      <div class='row'>
        <div class='col-md-12'>
          <table class='table'>
            <thead>
              <tr>
                
                <th>Název soutěže</th>
                <th>Vytvořil</th>
                <th>Výsledky zpracovali</th>
                <th>Datum</th>
                <th>Komentář</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
           <tbody>
            <?PHP 
include "../../functions/dbconnect.php";
$request= "SELECT * FROM `event` ORDER BY `event`.`event_date` DESC"  ; 
 $result = $mysqli->query($request);
            if ($result->num_rows === 0) {
                echo "<a href='..'><button type='button' class='btn btn-warning'>Nebyla vytvořena žádná soutěž!</button></a>";
            }
while($row = $result->fetch_array(MYSQLI_NUM)){echo "<tr><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td><form method='POST' style='margin:0'action='event-edit-single.php?&id=".$row[0]."'><input type='submit' value='upravit' class='btn btn-primary'></input></form></td><td><form method='POST' style='margin:0'action='event-edit-single-script.php?&id=".$row[0]."&delete=1' target='_blank'onsubmit='setTimeout(function () { window.location.reload(); }, 30)'><input type='submit' value='DELETE' class='btn btn-danger'></input></form></td></tr>";}

?>
         </tbody> </table>
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
