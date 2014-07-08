﻿<?PHP include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/check.php"; 
?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content=''>
    <link rel='icon' href='../favicon.ico'>

    <title>Theme Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href='../css/bootstrap.min.css' rel='stylesheet'>
    <!-- Bootstrap theme -->
    <link href='../css/bootstrap-theme.min.css' rel='stylesheet'>

    <!-- Custom styles for this template -->
    <link href='theme.css' rel='stylesheet'>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src='../assets/js/ie8-responsive-file-warning.js'></script><![endif]-->
    <script src='../assets/js/ie-emulation-modes-warning.js'></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src='../assets/js/ie10-viewport-bug-workaround.js'></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
      <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
    <![endif]-->
  </head>

  <body role='document'>

    <!-- Fixed navbar -->
    <div class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
      <div class='container'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='#'>Bootstrap theme</a>
        </div>
        <div class='navbar-collapse collapse'>
          <ul class='nav navbar-nav'>
            <li class='active'><a href='#'>Home</a></li>
            <li><a href='#about'>About</a></li>
            <li><a href='#contact'>Contact</a></li>
            <li class='dropdown'>
              <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Dropdown <span class='caret'></span></a>
              <ul class='dropdown-menu' role='menu'>
                <li><a href='#'>Action</a></li>
                <li><a href='#'>Another action</a></li>
                <li><a href='#'>Something else here</a></li>
                <li class='divider'></li>
                <li class='dropdown-header'>Nav header</li>
                <li><a href='#'>Separated link</a></li>
                <li><a href='#'>One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

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
