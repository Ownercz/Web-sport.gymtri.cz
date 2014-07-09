<?PHP include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/check.php"; 
        include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/header.php";
?>

    <div class='container theme-showcase' role='main'>

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class='page-header'>
        <h1><span class="label label-default">Vložení výsledků</span></h1>
      </div>
           <table class='table table-hover'>
      <thead>
        <tr>
          <th>#</th>
          <th>Jméno</th>
          <th>Příjmení</th>
          <th>Třída</th>
          <th>Datum narození</th>
          <th>Disciplína</th>
          <th>Výkon</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
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
      while($row1 = $result1->fetch_array(MYSQLI_NUM)){
      array_push($disciplines,  $row1[1]);
      }
     while($row = $result->fetch_array(MYSQLI_NUM)){
     $beginyear = $row[6];
      $beginyear = preg_replace("/ - Name:.*/", "", $beginyear);
      $now = date("Y");
      $year = $now-$beginyear;
     echo"<tr>
          <td>".$row[1]."</td>
          <td>".$row[2]."</td>
          <td>".$row[3]."</td>
          <td>".$row[4]."</td>
          <td>".$year.".".$class."</td>
          <td><select name='discipline'>";foreach ($disciplines as &$discipline) {
   echo"<option value='".$discipline."'>".$discipline."</option>";
}

echo"</select></td>
        </tr>";
     }
     
      }else{exit;}?>

        

      </tbody>
    </table>
      
            
     <form action="" method="GET">
          
      <select name="test" id = "myList">
               <option value = "1">one</option>
               <option value = "2">two</option>
               <option value = "3">three</option>
               <option value = "4">four</option>
             </select>
             <input type="submit"/></input>
      </form>
     











   
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
    <script src='../js/bootstrap.min.js'></script>
    <script src='../js/docs.min.js'></script>
   
   
  </body>
</html>
