<?PHP include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/check.php"; 
        include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/header.php";
?>

    <div class='container theme-showcase' role='main'>

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class='page-header'>
        <h1>Editace atletů ze třídy</h1>
      </div>
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
                <th></th>
              </tr>
            </thead>
           <tbody>
            <?PHP 

include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/dbconnect.php";
$class = $mysqli->real_escape_string($_GET['class']);
$yearbegin = $mysqli->real_escape_string($_GET['yearbegin']);
$request= "SELECT * FROM `athletes` WHERE `class` = '$class' AND `yearbegin` = '$yearbegin' ORDER BY `id` ASC"  ; 
 $result = $mysqli->query($request);

while($row = $result->fetch_array(MYSQLI_NUM)){echo "<form method='POST' style='margin:0'action='athletes-edit-class-script.php?id=".$row[0]."' target='_blank' onsubmit='setTimeout(function () { window.location.reload(); }, 30)'><tr><td>".$row[0]."</td><td><input type='text' name='trida' size='1' value='".$row[5]."'></input></td><td><input type='text' name='jmeno' value='".$row[1]."'></input></td><td><input type='text' name='prijmeni' value='".$row[2]."'></input></td><td><input type='text' name='sex' size='1' value='".$row[3]."'></input></td><td><input type='text' name='narozeni' value='".$row[4]."'></input></td><td><input type='text' name='zacatek' value='".$row[6]."'></input></td><td><button type='submit' value='Aktualizovat' onClick='' class='btn btn-primary'>Aktualizovat</button></td><td><button type='button'  class='btn btn-danger'>DEL</button></td></tr></form>";}

?>
         </tbody> </table>
        
        </div>

      </div>

<div class='page-header'>
        <h1>Přidat atleta ke třídě</h1>
      </div>
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
            
            <form name="formatus" action="athletes-add-script.php" target='_blank' onsubmit='setTimeout(function () { window.location.reload(); }, 30)' method="POST">
            <div id="dynamicInput">
            <input type='text' class='form-control' name='trida1' placeholder='Třída' value=''><input type='text' class='form-control' name='jmeno1' placeholder='Jméno'><input type='text' class='form-control' name='prijmeni1' placeholder='Příjmení'><div class='btn-group'><input type='radio' class='btn btn-default' name='sex1' value='M'><input type='radio' class='btn btn-default' name='sex1' value='F'></div><input type='date' name='narozeni1' data-date-format='mm/dd/yy' ><input type='number' min='1900' max='2100' name='zacatek1' >
     
     </div>
     <input type="button" value="Přidat dalšího" onClick="addInput('dynamicInput');">
<button type="submit" class="btn btn-primary" style="float:right">
  <i class="icon-user icon-white"></i> Přidat atleta
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
function reloader()
{
location.reload(true);alert("Welcome relaoder ");
}
</script>
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
     document.formatus.action = "athletes-add-script.php?&count=" + (counter);
    }
    </script>
   
  </body>
</html>
