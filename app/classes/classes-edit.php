<?PHP include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/check.php"; 
        include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/header.php";
?>
    <div class='container theme-showcase' role='main'>

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class='page-header'>
        <h1>Vyberte třídu k editaci</h1>
      </div>
     
            <?PHP 
            if(isset($_GET['id'])){$id= $_GET['id'];}
            elseif(isset($_GET['id'])&&(isset($_GET['delete']))){$id= $_GET['id'];$delete= $_GET['delete'];}else{}
    
      include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/dbconnect.php";
      if(isset($_GET['id']) && (!isset($_GET['delete']))){
      echo"<div class='alert alert-info' role='alert'>
        <strong>Rekapitulace registrace závodu</strong> Pokud je zde chyba, smažte danou soutěž klepnutím na tlačítko smazat. 
      </div>";
      $request= "SELECT * FROM `classes` WHERE `event_id` = $id ORDER BY `yearbegin` DESC"  ; 
 $result = $mysqli->query($request);
      echo"<h2><span class='label label-warning'>2. Kontrola tříd zapsaných do soutěže</span></h2><form><div class='list-group'>";
      while($row = $result->fetch_array(MYSQLI_NUM)){
      $beginyear = $row[1];
      $beginyear = preg_replace("/ - Name:.*/", "", $beginyear);
      $now = date("Y");
      $year = $now-$beginyear;
      
      echo"<a href='?id=".$id."' class='list-group-item'>Třída: <strong>".$year.".".$row[0]."</strong> Rok začátku:".$row[1]." </a>";}
      echo"</div></form>";
     
      echo"<div class='col-sm-4' style='float:right;'>
          <div class='list-group'>
            <a href='classes-add-script.php' class='list-group-item active'>
              <h4 class='list-group-item-heading'>Dokončit registraci tříd</h4>
              <p class='list-group-item-text'>Po zvolení tříd již není možné dělat další změny do seznamu.</p>
            </a>
            <a href='?id=".$id."&delete=1' class='list-group-item'>
              <h4 class='list-group-item-heading'>Smazat</h4>
              <p class='list-group-item-text'>V případě chyby ve výběru klepněte sem a budete moci třídy vybrat znova.</p>
            </a>
            <a href='#' class='list-group-item'>
              <h4 class='list-group-item-heading'>Vyskytl se problém?</h4>
              <p class='list-group-item-text'>Kontakt: radim@lipovcan.cz Mobil: 728450179</p>
            </a>
          </div>
        </div>";
      
      }
      elseif(isset($_GET['delete'])){
      
      $request = "DELETE FROM `classes` WHERE `event_id` = $id;";
      $result = $mysqli->query($request);
      echo"<div class='alert alert-danger' role='alert'>
        <strong>Vymazáno!</strong> Nepodařená registrace tříd byla smazána, zahajte tuto registraci znova klepnuím <strong><a href='classes-add.php'>sem</a></strong>.
      </div>";
      }
      
      else{
      $request= "SELECT * FROM `classes` GROUP BY `event_id` DESC LIMIT 0,10";
      $result = $mysqli->query($request);
      echo"<h2><span class='label label-warning'>1. Vyberte soutěž</span></h2><form><div class='list-group'>";
      while($row = $result->fetch_array(MYSQLI_NUM)){echo"<a href='?id=".$row[3]."' class='list-group-item'>Název: ".$row[1]." Datum: ".$row[3]."</a>";}
      echo"</div></form>";
      }
?>
        

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
