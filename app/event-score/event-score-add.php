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

          <th>Věk</th>
          <th>Disciplína</th>
          <th>Výkon</th>
          <th>Koeficient</th>
          <th>Body</th>
          <th>Akce</th>
        </tr>
      </thead>
      <tbody>
      <?PHP

      if(isset($_GET['id'])){$id= $_GET['id'];}else{}
      if(isset($_GET['discipline'])){$discipline= $_GET['discipline'];}else{}
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

      $request= "SELECT * FROM `event_score` WHERE `event_id` = $id AND `discipline_id` = '$discipline' ORDER BY `event_score`.`score_points` DESC"  ; 
      $result = $mysqli->query($request);
      
     while($row = $result->fetch_array(MYSQLI_NUM)){
     $i++;
    
     echo"<form action='event-score-add-script.php?id=".$id."&athleteid=".$row[3]."&vek=".$$row[8]."&sex=".$row[7]."&classid=".$classid."&trida=".$trida."' method='POST' target='_blank' onsubmit='setTimeout(function () { window.location.reload(); }, 30)'><tr>
          <td class='labele'>".$i." </td>
           <td class='name'>".$row[10]."</td>
           <td class='lastname'>".$row[11]."</td>
           <td class='sex'>";if($row[7]=="M"){echo"<span class='label label-primary'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";}elseif($row[7]=="F"){echo"<span class='label label-danger'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";}else{echo"ERROR! Oznam radim@lipovcan.cz!";}
          
          
     echo"</td>
       <td class='birth'>Věk: ".$row[8]."
          
         </td><td class='discipline'> <input type='hidden' name='discipline' value='".$disciplines[$row[4]-1]."'></input>";echo$disciplines[$row[4]-1];

echo"</td> <td class='score'><input type='text' name='vykon' size='10' placeholder='".$row[5]."'></input></td><td class='score'>".$row[9]."</td><td class='score'>".$row[6]."</td><td class='save'><input type='submit' class='btn btn-sm btn-default' value='Uložit'></input></td></form>
        ";
     }
     
      }else{exit;}?>
      </tbody>
    </table>
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
