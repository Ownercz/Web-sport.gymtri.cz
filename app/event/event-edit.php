<?PHP include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/check.php"; 
        include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/header.php";
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
                <th>Název soutěže</th>
                <th>Vytvořil</th>
                <th>Výsledky zpracovali</th>
                <th>Datum</th>
                <th>Komentář</th>
                <th></th>
              </tr>
            </thead>
           <tbody>
            <?PHP 
include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/dbconnect.php";
$request= "SELECT * FROM `event` ORDER BY `event`.`event_date` DESC"  ; 
 $result = $mysqli->query($request);

while($row = $result->fetch_array(MYSQLI_NUM)){echo "<tr><td>/*Seznam soutěží*/</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td><form method='POST' style='margin:0'action='athletes-edit-class.php?&class=".$row[0]."&yearbegin=".$row[1]."'><input type='submit' value='upravit' class='btn btn-primary'></input></form></td></tr>";}

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
