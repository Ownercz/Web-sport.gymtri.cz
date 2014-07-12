<?PHP include $_SERVER['DOCUMENT_ROOT']."/Web-Sport.gymtri.cz/functions/check.php"; 
        include $_SERVER['DOCUMENT_ROOT']."/Web-Sport.gymtri.cz/header.php";
?>

    <div class='container theme-showcase' role='main'>

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class='page-header'>
        <h1>Tables</h1>
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
            
            <form name="formatus" action="athletes-add-script.php" method="POST">
            <div id="dynamicInput">
            <input type='text' class='form-control' name='trida1' placeholder='Třída' value=''><input type='text' class='form-control' name='jmeno1' placeholder='Jméno'><input type='text' class='form-control' name='prijmeni1' placeholder='Příjmení'><input type='text' class='form-control' name='sex1' placeholder='M nebo F'><input type='text' class='form-control'name='narozeni1' placeholder='dd-mm-yyyy' ><input type='number' class='form-control' min='1900' max='2100' name='zacatek1' >
     
     </div>
     <input type="button" value="Přidat dalšího" onClick="addInput('dynamicInput');">
<button type="submit" class="btn btn-primary" style="float:right">
  <i class="icon-user icon-white"></i> Přidat třídu
</button>
    </form>
        </div>

      </div>

<button type="button" class="btn btn-lg btn-warning">Je nutné dodržet formát data! Např. "<?php echo date('d-m-Y'); ?>"<br/>Dodržte také formát třídy "B" bez číslovky a tečky !</button>  









   
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
          newdiv.innerHTML = "<input type='text' class='form-control' name='trida" + (counter + 1) + "' placeholder='Třída' value=''><input type='text' class='form-control' name='jmeno" + (counter + 1) + "' placeholder='Jméno'><input type='text' class='form-control' name='prijmeni" + (counter + 1) + "' placeholder='Příjmení'><input type='text' class='form-control' name='sex" + (counter + 1) + "' placeholder='M nebo F'><input type='text' class='form-control' name='narozeni" + (counter + 1) + "' placeholder='dd-mm-yyyy' ><input type='number' class='form-control' min='1900' max='2100'name='zacatek" + (counter + 1) + "' >";
          document.getElementById(divName).appendChild(newdiv);
           document.getElementsByName("trida"+(counter + 1)).item(0).value=document.getElementsByName("trida"+(counter)).item(0).value;
           document.getElementsByName("zacatek"+(counter + 1)).item(0).value=document.getElementsByName("zacatek"+(counter)).item(0).value;
          counter++;
     }
     document.formatus.action = "athletes-add-script.php?&count=" + (counter);
    }
    </script>
  </body>
</html>
