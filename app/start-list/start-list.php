<?PHP include "../../functions/check.php"; 
        include "../../header.php";
?>

    <div class='container theme-showcase' role='main'>

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class='page-header'>
        <h1><span class="label label-default">Tisk startovek</span></h1>
      </div>
      
      <?PHP
      if(isset($_GET['id'])){$id= $_GET['id'];}else{}if(isset($_GET['dateevent'])){$dateevent= $_GET['dateevent'];}else{$dateevent="";}
      include "../../functions/dbconnect.php";
      if(isset($_GET['id'])){
      echo"<div class='alert alert-info' role='alert'>
        <strong>Vybráno!</strong> Závod byl úspěšně vybrán a nyní je potřeba v každé třídě zvolit sportovce, na které disciplíně budou. (pokud byl vybrán špatný závod, klepněte <a href='?'>zde</a>)
      </div>";
      $request= "SELECT * FROM `classes` WHERE `event_id` = $id ORDER BY `yearbegin` DESC"  ; 
 $result = $mysqli->query($request);
      echo"<h2><span class='label label-warning'>2. Vyberte třídy pro nastavení disciplíny</span></h2><form><div class='list-group'>";
      while($row = $result->fetch_array(MYSQLI_NUM)){
      $beginyear = $row[1];
      $now = date("Y");
      $year = $now-$beginyear;
      
      echo"<a href='start-list-set.php?id=".$id."&class=".$row[2]."&beginyear=".$row[1]."&date=".$dateevent."&trida=".$year.".".$row[2]."&classid=".$row[0]."' class='list-group-item'>Třída: <strong>".$year.".".$row[2]."</strong> Rok začátku:".$row[1]." </a>";}
      echo"</div></form>";
      
     
      
      }
      else{
      $request= "SELECT * FROM `event` ORDER BY `id` DESC LIMIT 0,10";
      $result = $mysqli->query($request);
      echo"<h2><span class='label label-warning'>1. Vyberte soutěž</span></h2><form><div class='list-group'>";
      while($row = $result->fetch_array(MYSQLI_NUM)){echo"<a href='?id=".$row[0]."&date=".$row[4]."' class='list-group-item'>Název: ".$row[1]." Datum: ".$row[4]."</a>";}
      echo"</div></form>";
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
