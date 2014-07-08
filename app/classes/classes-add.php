<?PHP include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/check.php"; 
        include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/header.php";
?>

    <div class='container theme-showcase' role='main'>

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class='page-header'>
        <h1><span class="label label-default">Registrace tříd do závodu</span></h1>
      </div>
      
      <?PHP
      if(isset($_GET['id'])){$id= $_GET['id'];}else{}
      if(isset($_GET['classes'])){$classes= $_GET['classes'];}else{}
      if(isset($_GET['yearbegin'])){$yearbegin= $_GET['yearbegin'];}else{}
      
      if(isset($classes)){$classes = explode(",",$classes);}else{$classes = array();}
      if(isset($_GET['classadd'])){array_push($classes,  $_GET['classadd']);$classes=implode(",",$classes);$a=12;}else{$classes=null;}
      
      if(isset($yearbegin)){$yearbegin = explode(",",$yearbegin);}else{$yearbegin = array();}
      if(isset($_GET['yearadd'])){array_push($yearbegin,  $_GET['yearadd']);$yearbegin=implode(",",$yearbegin);$a=12;}else{$yearbegin=null;}
      include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/dbconnect.php";
      if(isset($_GET['id'])){
      echo"<div class='alert alert-info' role='alert'>
        <strong>Vybráno!</strong> Závod byl úspěšně vybrán a nyní je potřeba do něj zaregistrovat třídy. (pokud byl vybrán špatný závod, klepněte <a href='?'>zde</a>)
      </div>";
      $request= "SELECT DISTINCT class,yearbegin FROM athletes ORDER by athletes.yearbegin DESC"  ; 
 $result = $mysqli->query($request);
      echo"<h2><span class='label label-warning'>2. Vyberte třídy</span></h2><form><div class='list-group'>";
      while($row = $result->fetch_array(MYSQLI_NUM)){
      $beginyear = $row[1];
      $beginyear = preg_replace("/ - Name:.*/", "", $beginyear);
      $now = date("Y");
      $year = $now-$beginyear;
      
      echo"<a href='?id=".$id."&classes=".$classes."&classadd=".$row[0]."&yearbegin=".$yearbegin."&yearadd=".$row[1]."' class='list-group-item'>Třída: <strong>".$year.".".$row[0]."</strong> Rok začátku:".$row[1]." </a>";}
      echo"</div></form>";
      $i=1;
      $tridy = array();
      $zacatek = array();
      $tridy =  explode(",",$classes);
      $zacatek = explode(",",$yearbegin);
      $count = count($tridy);
      echo"<div class='alert alert-success' role='alert'><strong>Přidáno:</strong>   ";
        
      while($i<$count){
      $now = date("Y");
      $year = $now-$zacatek[$i];
      print$year.".".$tridy[$i].",";
      $i++;
      }echo"<br> <strong>Každou třídu přidávejte pouze jednou! V případě chyby klepněte <a href='?id=".$id."'>sem</a>.</strong>
      </div>";
      
      
      }
      else{
      $request= "SELECT * FROM `event` ORDER BY `event_date` DESC LIMIT 0,3";
      $result = $mysqli->query($request);
      echo"<h2><span class='label label-warning'>1. Vyberte soutěž</span></h2><form><div class='list-group'>";
      while($row = $result->fetch_array(MYSQLI_NUM)){echo"<a href='?id=".$row[0]."' class='list-group-item'>Název: ".$row[1]." Datum: ".$row[4]."</a>";}
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
