﻿<?PHP include "check.php"; 
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
      <div class='jumbotron'>
        <h1>Gymtri - Sport app</h1>
        <p>Na této stránce uvidíte předešlé ročníky a hlavní ovládací prvky.</p>
        <p><button type="button" class="btn btn-lg btn-info">Disciplíny</button>&nbsp;<button type="button" class="btn btn-lg btn-info">Atleti</button>&nbsp;<button type="button" class="btn btn-lg btn-info">Ročníky</button>&nbsp;<button type="button" class="btn btn-lg btn-warning">Vložení výsledků</button></p>
      </div>





      <div class='page-header'>

      <div class='page-header'>
        <h1>Správa atletů</h1>
      </div>
      <div class='row'>
     
        <div class='col-sm-4'>
          <div class='list-group'>
            <a href='#' class='list-group-item active'>
              <h4 class='list-group-item-heading'>Přidat atlety</h4>
              <p class='list-group-item-text'>Vložení celé třídy</p>
            </a>
            <a href='#' class='list-group-item'>
              <h4 class='list-group-item-heading'>Upravit třídu</h4>
              <p class='list-group-item-text'>Upraví třídu</p>
            </a>
           
          </div>
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