<?PHP include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/check.php"; 
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
        <h1>Editace atleta</h1>
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

while($row = $result->fetch_array(MYSQLI_NUM)){echo "<form method='POST' style='margin:0'action='athletes-edit-class-script.php?id=".$row[0]."' target='_blank' onsubmit='setTimeout(function () { window.location.reload(); }, 30)'><tr><td>".$row[0]."</td><td><input type='text' name='trida' size='1' value='".$row[5]."'></input></td><td><input type='text' name='jmeno' value='".$row[1]."'></input></td><td><input type='text' name='sex' value='".$row[2]."'></input></td><td><input type='text' name='sex' size='1' value='".$row[3]."'></input></td><td><input type='text' name='narozeni' value='".$row[4]."'></input></td><td><input type='text' name='zacatek' value='".$row[6]."'></input></td><td><button type='submit' value='Aktualizovat' onClick='' class='btn btn-primary'>Aktualizovat</button></td></tr></form>";}

?>
         </tbody> </table>
        
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
   
  </body>
</html>
