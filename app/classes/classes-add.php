<?PHP include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/check.php"; 
        include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/header.php";
?>

    <div class='container theme-showcase' role='main'>

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class='page-header'>
        <h1><span class="label label-default">Registrace tříd do závodu</span></h1>
      </div>
      
      <?PHP
      include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/dbconnect.php";
      if(isset($_GET['id'])){
      echo"<div class='alert alert-info' role='alert'>
        <strong>Vybráno!</strong> Závod byl úspěšně vybrán a nyní je potřeba do něj zaregistrovat třídy. (pokud byl vybrán špatný závod, klepněte <a href='?'>zde</a>)
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
            
     
          
      
      
      <div class='row'>
        <div class='col-md-12'>
          <table class='table'>
            <thead>
              <tr>
                <th>#</th>
                <th>Třída</th>
                <th>Jméno</th>
                <th>Příjmení</th>
                <th>Pohlaví</th>
                <th>Datum narození</th>
                <th>Začátek studia</th>
              </tr>
            </thead>
            </table>
            
            <form name="formatus" action="http://192.168.1.11/Web-sport.gymtri.cz/app/athletes-add-script.php" method="POST">
            <div id="dynamicInput">
            <input type='text' class='form-control' name='trida1' placeholder='Třída' value=''><input type='text' class='form-control' name='jmeno1' placeholder='Jméno'><input type='text' class='form-control' name='prijmeni1' placeholder='Příjmení'><div class='btn-group'><input type='radio' class='btn btn-default' name='sex1' value='M'><input type='radio' class='btn btn-default' name='sex1' value='F'></div><input type='date' name='narozeni1' data-date-format='mm/dd/yy' ><input type='number' min='1900' max='2100' name='zacatek1' >
     
     </div>
     <input type="button" value="Přidat dalšího" onClick="addInput('dynamicInput');">
<button type="submit" class="btn btn-primary" style="float:right">
  <i class="icon-user icon-white"></i> Přidat třídu
</button>
    </form>
        </div>

      </div>











   
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
    <script src='../js/bootstrap.min.js'></script>
    <script src='../js/docs.min.js'></script>
   
    <script>
    
    var counter = 1;
    var limit = 16;
    function addInput(divName){
     if (counter == limit)  {
          alert("Stanoveny limit sportovcu je: " + counter + " vice jich pridat nelze!");
     }
     else {
           
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "<input type='text' class='form-control' name='trida" + (counter + 1) + "' placeholder='Třída' value=''><input type='text' class='form-control' name='jmeno" + (counter + 1) + "' placeholder='Jméno'><input type='text' class='form-control' name='prijmeni" + (counter + 1) + "' placeholder='Příjmení'><div class='btn-group'><input type='radio' class='btn btn-default' name='sex" + (counter + 1) + "' value='M'><input type='radio' class='btn btn-default' name='sex" + (counter + 1) + "' value='F'></div><input type='date'  name='narozeni" + (counter + 1) + "' data-date-format='mm/dd/yy' ><input type='number' min='1900' max='2100'name='zacatek" + (counter + 1) + "' >";
          document.getElementById(divName).appendChild(newdiv);
           document.getElementsByName("trida"+(counter + 1)).item(0).value=document.getElementsByName("trida"+(counter)).item(0).value;
          counter++;
     }
     document.formatus.action = "http://192.168.1.11/Web-sport.gymtri.cz/app/athletes-add-script.php?&count=" + (counter);
    }
    </script>
  </body>
</html>
