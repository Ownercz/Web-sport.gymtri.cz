<?PHP include "../../functions/check.php";
        include "../../header.php";
?>

    <div class='container theme-showcase' role='main'>

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class='page-header'>
        <h1><span class="label label-default">Vytisknutí startovek!!!</span></h1>
      </div>

      <?PHP
      if(isset($_GET['id'])){$id= $_GET['id'];}else{}if(isset($_GET['dateevent'])){$dateevent= $_GET['dateevent'];}else{$dateevent="";}
      if(isset($_GET['classes'])){$classes= $_GET['classes'];}else{}
      if(isset($_GET['yearbegin'])){$yearbegin= $_GET['yearbegin'];}else{}

      if(isset($classes)){$classes = explode(",",$classes);}else{$classes = array();}
      if(isset($_GET['classadd'])){array_push($classes,  $_GET['classadd']);$classes=implode(",",$classes);}else{$classes=null;}

      if(isset($yearbegin)){$yearbegin = explode(",",$yearbegin);}else{$yearbegin = array();}
      if(isset($_GET['yearadd'])){array_push($yearbegin,  $_GET['yearadd']);$yearbegin=implode(",",$yearbegin);}else{$yearbegin=null;}
      include "../../functions/dbconnect.php";
      if(isset($_GET['id'])){
     echo"<div class='alert alert-info' role='alert'>
        <strong>Vybráno!</strong> Závod byl úspěšně vybrán a nyní je potřeba vybrat disciplínu k sestavení startovky! (pokud byl vybrán špatný závod, klepněte <a href='?'>zde</a>)
      </div>";
      $request1= "SELECT * FROM `discipline` ORDER by id ASC"  ;
      $result1 = $mysqli->query($request1);
      $disciplines = array(); $disciplinesid=array();
      $i = 0;
      while($row1 = $result1->fetch_array(MYSQLI_NUM)){
      array_push($disciplines,  $row1[1]);
      array_push($disciplinesid,  $row1[0]);

      }
          $i++;
      echo"<h2><span class='label label-warning'>2. Vyberte třídy pro nastavení disciplíny</span></h2><form><div class='list-group'>";
     foreach ($disciplines as &$discipline) {

   echo"<a href='start-list-print.php?id=".$id."&discipline=".$i."' class='list-group-item'>".$discipline."</a>";
         $i++;
}



      }
      else{
      $request= "SELECT * FROM `event` ORDER BY `id` DESC";
      $result = $mysqli->query($request);
      echo"<h2><span class='label label-warning'>1. Vyberte soutěž</span></h2><form><div class='list-group'>";
      while($row = $result->fetch_array(MYSQLI_NUM)){echo"<a href='?id=".$row[0]."&dateevent=".$row[4]."' class='list-group-item'>Název: ".$row[1]." Datum: ".$row[4]."</a>";}
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
