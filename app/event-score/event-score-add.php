<?PHP include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/check.php"; 
        include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/header.php";
?>

    <div class='container theme-showcase' role='main'>

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class='page-header'>
        <h1><span class="label label-default">Vložení výsledků</span></h1>
      </div>
      <div class="alert alert-warning" role="alert">
        <strong>Upozornění!</strong> Výsledky ukládejte po jednotlivcích.
      </div>
           <table class='table table-hover' style='margin-bottom:0px;'>
      <thead>
        <tr>
          <th>#</th>
          <th>Jméno</th>
          <th>Příjmení</th>
          <th>Pohlaví</th>
          <th>Třída</th>
          <th>Datum narození</th>
          <th>Disciplína</th>
          <th>Výkon</th>
          <th></th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
      <?PHP
      if(isset($_GET['id'])){$id= $_GET['id'];}else{}
      if(isset($_GET['class'])){$class= $_GET['class'];}else{}
      if(isset($_GET['beginyear'])){$beginyear= $_GET['beginyear'];}else{}
      
    
   
      include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/dbconnect.php";
      if(isset($_GET['id'])){

      $request= "SELECT * FROM `athletes` WHERE `class` = '$class' AND `yearbegin` = '$beginyear'"  ; 
      $result = $mysqli->query($request);
      
      $request1= "SELECT * FROM `discipline`"  ; 
      $result1 = $mysqli->query($request1);
      $disciplines = array();
      $i = 0;
      while($row1 = $result1->fetch_array(MYSQLI_NUM)){
      array_push($disciplines,  $row1[1]);
      }
     while($row = $result->fetch_array(MYSQLI_NUM)){
     $i++;
     $beginyear = $row[6];
      $beginyear = preg_replace("/ - Name:.*/", "", $beginyear);
      $now = date("Y");
      $year = $now-$beginyear;
      
      $birthyear = $row[4];
      $birthyear = substr($birthyear, 0, 4); 
      $birthyear = $now-$birthyear;
     echo"<form action='event-score-add-script.php?id=".$id."&athleteid=".$row[0]."&vek=".$birthyear."&sex=".$row[3]."' method='POST'><ul class='list-inline scoreboard'>
          <li class='labele'>".$i." </li>
           <li class='name'>".$row[1]."</li>
           <li class='lastname'>".$row[2]."</li>
           <li class='sex'>";if($row[3]=="M"){echo"<span class='label label-primary'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";}elseif($row[3]=="F"){echo"<span class='label label-danger'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";}else{}
          
          
     echo"</li>
          <li class='class'>".$year.".".$class."</li><li class='birth'>".$row[4]." | Věk: ".$birthyear."
          
         </li><li class='discipline'> <select name='discipline'>";foreach ($disciplines as &$discipline) {
   echo"<option value='".$discipline."'>".$discipline."</option>";
}

echo"</select></li> <li class='score'><input type='text' name='vykon' size='10'></input></li><li class='save'><input type='submit' class='btn btn-sm btn-default' value='Uložit'></input></li></ul></form>
        ";
     }
     
      }else{exit;}?>
      
    <div class="row">
        <div class="col-sm-4">
          <ul class="list-group">
            <li class="list-group-item alert-success"><strong>Jak zadat výsledky</strong></li>
            <li class="list-group-item">60m - čas 13,11 sekund zapiš: <strong>13,11</strong> </li>
            <li class="list-group-item">100m - čas 13,11 sekund zapiš: <strong>13,11</strong> </li>
            <li class="list-group-item">1500m - čas 1 minuta 13,11 sekund zapiš: <strong>01:13,11</strong> </li>
            <li class="list-group-item">3000m - čas 1 minuta 13,11 sekund zapiš: <strong>01:13,11</strong> </li>
          </ul>
        </div><!-- /.col-sm-4 -->
        
        <div class="col-sm-4">
          <ul class="list-group">
            <li class="list-group-item alert-success"><strong>Jak zadat výsledky</strong></li>
            <li class="list-group-item">dálka - 433cm zapiš: <strong>433</strong> </li>
            <li class="list-group-item">výška - 155cm zapiš: <strong>155</strong> </li>
            <li class="list-group-item">míč - 35m zapiš: <strong>35</strong> </li>
            <li class="list-group-item">granát - 70m zapiš: <strong>70</strong> </li>
          </ul>
        </div><!-- /.col-sm-4 -->
        
      
        <div class="col-sm-4">
          <ul class="list-group">
            <li class="list-group-item alert-success"><strong>Jak zadat výsledky</strong></li>
            <li class="list-group-item">šplh - čas 3,11 sekund zapiš: <strong>3,11</strong> </li>
            <li class="list-group-item">25m plavání - čas 13,11 sekund zapiš: <strong>13,11</strong> </li>
            <li class="list-group-item">50m plavání - čas 1 minuta 13,11s zapiš: <strong>01:13,11</strong> </li>
            <li class="list-group-item">100m plavání - čas 1 minuta 13,11s zapiš: <strong>01:13,11</strong> </li>
          </ul>
        </div><!-- /.col-sm-4 -->
        
     
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
