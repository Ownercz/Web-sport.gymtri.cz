<?PHP include $_SERVER['DOCUMENT_ROOT']."/Web-Sport.gymtri.cz/functions/check.php"; 
        include $_SERVER['DOCUMENT_ROOT']."/Web-Sport.gymtri.cz/header.php";
?>

    <div class='container theme-showcase' role='main'>

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class='page-header'>
        <h1>Vytvoření nové soutěže</h1>
      </div>

 
<form class="form-horizontal" role="form" action="event-add-script.php" method="POST"  >
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Název soutěže</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="eventname" "id="inputEmail3" placeholder="Název soutěže">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Organizátor</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="eventorganisator" id="inputEmail3" placeholder="Organizátor">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Zapisující</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="eventeditor" id="inputEmail3" placeholder="Zapisující">
    </div>
  </div>
  
    <div class="form-group has-error">
    <label for="inputEmail3" class="col-sm-2 control-label">Datum soutěže!</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="eventdate" id="inputEmail3" value="<?php echo date('d-m-Y'); ?>">
    </div>
   </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Poznámka</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="eventcomment" id="inputEmail3" placeholder="...">
    
  </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-lg btn-success" style="float:right;">Vytvořit novou soutěž</button>
 <button type="button" class="btn btn-lg btn-warning">Je nutné dodržet formát data! Např. "<?php echo date('d-m-Y'); ?>"</button>  
    </div>
  </div>
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
