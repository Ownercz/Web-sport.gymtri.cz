<?PHP include $_SERVER['DOCUMENT_ROOT']."/functions/check.php"; 
        include $_SERVER['DOCUMENT_ROOT']."/header.php";
?>

    <div class='container theme-showcase' role='main'>

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class='page-header'>
        <h1><span class="label label-default">Vložení výsledků do závodu</span></h1>
      </div>
      
      <?PHP
      if(isset($_GET['id'])){$id= $_GET['id'];}else{}if(isset($_GET['dateevent'])){$dateevent= $_GET['dateevent'];}else{$dateevent="";}
      if(isset($_GET['classes'])){$classes= $_GET['classes'];}else{}
      if(isset($_GET['yearbegin'])){$yearbegin= $_GET['yearbegin'];}else{}
      
      if(isset($classes)){$classes = explode(",",$classes);}else{$classes = array();}
      if(isset($_GET['classadd'])){array_push($classes,  $_GET['classadd']);$classes=implode(",",$classes);}else{$classes=null;}
      
      if(isset($yearbegin)){$yearbegin = explode(",",$yearbegin);}else{$yearbegin = array();}
      if(isset($_GET['yearadd'])){array_push($yearbegin,  $_GET['yearadd']);$yearbegin=implode(",",$yearbegin);}else{$yearbegin=null;}
      include $_SERVER['DOCUMENT_ROOT']."/functions/dbconnect.php";
      if(isset($_GET['id'])){
      echo"<div class='alert alert-info' role='alert'>
        <strong>Vybráno!</strong> Závod byl úspěšně vybrán a nyní je potřeba zvolit třídu, kterou budete zapisovat. (pokud byl vybrán špatný závod, klepněte <a href='?'>zde</a>)
      </div>";
      $request= "SELECT * FROM `classes` WHERE `event_id` = $id ORDER BY `yearbegin` DESC"  ; 
 $result = $mysqli->query($request);
      echo"<h2><span class='label label-warning'>2. Vyberte disciplínu pro zápis výsledků</span></h2><form><div class='list-group'>";
      $request1= "SELECT * FROM `discipline` ORDER by id ASC"  ; 
      $result1 = $mysqli->query($request1);
      $disciplines = array(); $disciplinesid=array();
      $i = 1;
      while($row1 = $result1->fetch_array(MYSQLI_NUM)){
      array_push($disciplines,  $row1[1]);
      array_push($disciplinesid,  $row1[0]);
      
      }  
     

     foreach ($disciplines as &$discipline) {
      
      echo"<a href='event-score-add.php?id=".$id."&class=".$row[2]."&beginyear=".$row[1]."&date=".$dateevent."&trida=".$year.".".$row[2]."&classid=".$row[0]."&discipline=".$i++."' class='list-group-item'>".$discipline."</a>";
      }
      
     
      
      }
      else{
      $request= "SELECT * FROM `event` ORDER BY `event_date` DESC LIMIT 0,3";
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
