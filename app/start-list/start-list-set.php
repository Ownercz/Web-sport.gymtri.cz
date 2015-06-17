<?PHP include "../../functions/check.php"; 
        include "../../header.php";

//Pridat tlacitko pro sestiboj?>
    <div class='container theme-showcase' role='main'>

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class='page-header'>
        <h1><span class="label label-default">Vložení startovek</span></h1>
      </div>
      <div class="alert alert-warning" role="alert">
        <strong>Upozornění!</strong> Horní část seznamu slouží k výběru disciplíny. Ty, jenž jste již ráčili vybrat, naleznete níže!!!
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
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?PHP

      if(isset($_GET['id'])){$id= $_GET['id'];}else{}
      if(isset($_GET['trida'])){$trida= $_GET['trida'];}else{}
      if(isset($_GET['class'])){$class= $_GET['class'];}else{}
      if(isset($_GET['classid'])){$classid= $_GET['classid'];}else{}
      if(isset($_GET['beginyear'])){$beginyear= $_GET['beginyear'];}else{}
       include "../../functions/dbconnect.php";
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
      
      $request= "SELECT * FROM `athletes` WHERE `class` = '$class' AND `yearbegin` = '$beginyear'"  ; 
      $result = $mysqli->query($request);
      
     while($row = $result->fetch_array(MYSQLI_NUM)){
     $i++;
     $birth = $row[4];
     $beginyear = $row[6];
      $beginyear = preg_replace("/ - Name:.*/", "", $beginyear);
      $now = date("Y");
      $year = $now-$beginyear;
      $eventdatecurrent = new DateTime($eventdate);
      $birthdate = new DateTime($birth);
      $vek = $eventdatecurrent->diff($birthdate);
      $vek = $vek->y;
      $sex = $row[3];
     echo"<form action='start-list-set-script.php?id=".$id."&athleteid=".$row[0]."&vek=".$vek."&sex=".$row[3]."&classid=".$classid."&trida=".$trida."' method='POST' target='_blank' onsubmit='setTimeout(function () { window.location.reload(); }, 30)'><tr>
          <td class='labele'>".$i." </td>
           <td class='name'>".$row[1]."</td>
           <td class='lastname'>".$row[2]."</td>
           <td class='sex'>";if($row[3]=="M"){echo"<span class='label label-primary'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";}elseif($row[3]=="F"){echo"<span class='label label-danger'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";}else{}
          
          
     echo"</td>
          <td class='class'>".$year.".".$class."</td><td class='birth'>".$birth." | Věk: ".$vek."
          
         </td><td class='discipline'> <select name='discipline'>";
        foreach ($disciplines as &$discipline) {
             if(($vek<=14)&&($sex=="M")&&($discipline=="100m"||$discipline=="3000m"||$discipline=="50m plavání"||$discipline=="100m plavání"||$discipline=="míč")){}
             elseif(($vek<=14)&&($sex=="F")&&($discipline=="100m"||$discipline=="3000m"||$discipline=="50m plavání"||$discipline=="100m plavání"||$discipline=="granát")){}
             elseif(($vek==15||$vek==16)&&($sex=="M")&&($discipline=="60m"||$discipline=="1500m"||$discipline=="25m plavání"||$discipline=="100m plavání"||$discipline=="míč")){}
             elseif(($vek==15||$vek==16)&&($sex=="F")&&($discipline=="60m"||$discipline=="3000m"||$discipline=="25m plavání"||$discipline=="100m plavání"||$discipline=="míč")){}
             elseif(($vek>16)&&($sex=="M")&&($discipline=="60m"||$discipline=="1500m"||$discipline=="25m plavání"||$discipline=="100m plavání"||$discipline=="míč")){}
             elseif(($vek>16)&&($sex=="F")&&($discipline=="60m"||$discipline=="3000m"||$discipline=="25m plavání"||$discipline=="100m plavání"||$discipline=="míč")){}
             else{echo"<option value='".$discipline."'>".$discipline."</option>";}
            }

echo"</select></td> <td class='save'><select name='sebrlecup'>";echo"<option value='no'>Ne</option><option value='yes'>Ano</option></select><input type='submit' class='btn btn-sm btn-default' value='Uložit'></input></td></form></tr>
        ";
     }
     
      }else{exit;}?>
      

        </tbody>
    </table><div class="alert alert-info" role="alert">
        <strong>Nastavené disciplíny</strong> V případě chyby klepněte na smazat a vložte znovu :)
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
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php 
      //$request= "SELECT * FROM `event_score` WHERE `event_id` = $id AND `class_id` = '$classid' ORDER BY `event_score`.`discipline_id` DESC"  ;
      $request= "SELECT * FROM `event_score` WHERE `event_id` = $id AND `class_id` = '$classid' ORDER BY `event_score`.`discipline_id` DESC"  ;
      $result = $mysqli->query($request);
     $i = 1;
      while($row = $result->fetch_array(MYSQLI_NUM)){
echo"<tr><form action='start-list-set-script.php?id=".$id."&athleteidtodelete=".$row[0]."&delete=1' method='POST' target='_blank' onsubmit='setTimeout(function () { window.location.reload(); }, 30)'>
          <td class='labele'>".$row[0]." </td>
           <td class='name'>".$row[10]."</td>
           <td class='lastname'>".$row[11]."</td>
           <td class='sex'>";if($row[7]=="M"){echo"<span class='label label-primary'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";}elseif($row[7]=="F"){echo"<span class='label label-danger'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";}else{}
          
          
     echo"</td>
          <td class='age'>Věk: ".$row[8]."</td><td class='disciplineresult'>";
          foreach ($disciplinesid as &$discipline) {if ($discipline == $row[4]){ $num = -1+$row[4];echo$disciplines[$num]; }}echo"
         </td>";
         

echo"</select></td><td class='save'><input type='submit' class='btn btn-sm btn-danger' value='Smazat'></input></td></form></tr>";
$i++;}
   
      
      
      
     
        
        
        ?>
     </tbody></table>
      
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
