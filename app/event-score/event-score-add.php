<?PHP include $_SERVER['DOCUMENT_ROOT']."/functions/check.php"; 
        include $_SERVER['DOCUMENT_ROOT']."/header.php";
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
      if(isset($_GET['trida'])){$trida= $_GET['trida'];}else{}
      if(isset($_GET['class'])){$class= $_GET['class'];}else{}
      if(isset($_GET['classid'])){$classid= $_GET['classid'];}else{}
      if(isset($_GET['beginyear'])){$beginyear= $_GET['beginyear'];}else{}
       include $_SERVER['DOCUMENT_ROOT']."/functions/dbconnect.php";
     $request2="SELECT * FROM `event` WHERE `id` = $id ORDER BY `event_date` DESC";
      $result2 = $mysqli->query($request2);
      while($row2 = $result2->fetch_array(MYSQLI_NUM)){
      $eventdate=$row2[4]; 
      }
   
     
      if(isset($_GET['id'])){
      
      $request1= "SELECT * FROM `discipline`"  ; 
      $result1 = $mysqli->query($request1);
      $disciplines = array(); $disciplinesid=array();
      $i = 0;
      while($row1 = $result1->fetch_array(MYSQLI_NUM)){
      array_push($disciplines,  $row1[1]);
      array_push($disciplinesid,  $row1[0]);
      
      }  
      $request= "SELECT * FROM `classes` WHERE `id` = '$classid'"  ; 
      $result = $mysqli->query($request);
      while($row = $result->fetch_array(MYSQLI_NUM)){$now = date("Y");$year = $now-$row[1];}
      $request= "SELECT * FROM `event_score` WHERE `event_id` = $id AND `class_id` = '$classid' ORDER BY `event_score`.`score_points` DESC"  ; 
      $result = $mysqli->query($request);
      
     while($row = $result->fetch_array(MYSQLI_NUM)){
     $i++;
    
     echo"<form action='event-score-add-script.php?id=".$id."&athleteid=".$row[0]."&vek=".$vek."&sex=".$row[3]."&classid=".$classid."&trida=".$trida."' method='POST' target='_blank' onsubmit='setTimeout(function () { window.location.reload(); }, 30)'><ul class='list-inline scoreboard'>
          <li class='labele'>".$i." </li>
           <li class='name'>".$row[10]."</li>
           <li class='lastname'>".$row[11]."</li>
           <li class='sex'>";if($row[7]=="M"){echo"<span class='label label-primary'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";}elseif($row[7]=="F"){echo"<span class='label label-danger'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";}else{echo"ERROR! Oznam radim@lipovcan.cz!";}
          
          
     echo"</li>
          <li class='class'>".$year.".".$class."</li><li class='birth'>".$birth." | Věk: ".$vek."
          
         </li><li class='discipline'> <select name='discipline'>";foreach ($disciplines as &$discipline) {
   echo"<option value='".$discipline."'>".$discipline."</option>";
}

echo"</select></li> <li class='score'><input type='text' name='vykon' size='10'></input></li><li class='save'><input type='submit' class='btn btn-sm btn-default' value='Uložit'></input></li></ul></form>
        ";echo"<form action='event-score-add-script.php?id=".$id."&athleteidtodelete=".$row[0]."&delete=1' method='POST' target='_blank' onsubmit='setTimeout(function () { window.location.reload(); }, 30)'><ul class='list-inline scoreboard'><input type='submit' class='btn btn-sm btn-danger' value='Smazat'></input></li></ul></form>";
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
        </div><!-- /.col-sm-4 --></div>
        <div class="alert alert-info" role="alert">
        <strong>Vložené výsledky</strong> V případě chyby klepněte na smazat a vložte znovu :)
      </div>

   
      
      
      
     

     
      
      <div class="alert alert-info" role="alert">
        <strong>Upozornění!</strong> Při pozdějším zadávání výsledků se počítá věk atleta dle data zaregistrování soutěže a ne podle aktuálního data.
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
