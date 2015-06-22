<?PHP include "../functions/check.php";
//include "../header.php";
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content='Radim Lipovčan'>
    <link rel='icon' href='../favicon.ico'>

    <title>Sport.gymtri.cz app</title>
    <!-- Bootstrap core CSS -->
    <link href='../css/bootstrap.min.css' rel='stylesheet'>
    <!-- Bootstrap theme -->
    <link href='../css/bootstrap-theme.min.css' rel='stylesheet'>

    <!-- Custom styles for this template -->
    <link href='../css/theme.css' rel='stylesheet'>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src='../assets/js/ie8-responsive-file-warning.js'></script><![endif]-->
    <script src='../assets/js/ie-emulation-modes-warning.js'></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src='../../assets/js/ie10-viewport-bug-workaround.js'></script>

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
            <a class='navbar-brand' href='..'>Gymtri Sport</a>
        </div>
        <div class='navbar-collapse collapse'>
            <ul class='nav navbar-nav'>
                <li class='active'><a href='..'>Domů</a></li>

            </ul>
            </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
    <div class='container theme-showcase' role='main'>

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class='jumbotron'>
        <h1>Gymtri - Sport app <?PHP echo$version; ?></h1>

      </div>






<div class='page-header'>
        <h1>Správa</h1>
      </div>

      <div class='row'>

            <div class='col-sm-4'>
                <div class='list-group'>
                    <a href="athletes/athletes-add.php" class='list-group-item active'>
                        <h4 class='list-group-item-heading'>Přidat závodníky</h4>
                        <p class='list-group-item-text'>Vložení celé třídy</p>
                    </a>
                    <a href="athletes/athletes-edit.php" class='list-group-item'>
                        <h4 class='list-group-item-heading'>Upravit třídu</h4>
                        <p class='list-group-item-text'>Upraví třídu</p>
                    </a>

                </div>
            </div><!-- /.col-sm-4 -->
            <div class='col-sm-4'>
                <div class='list-group'>
                    <a href='event/event-add.php' class='list-group-item active'>
                        <h4 class='list-group-item-heading'>Založit soutěž</h4>
                        <p class='list-group-item-text'>Vytvoření nového ročníku OL6B</p>
                    </a>
                    <a href='event/event-edit.php' class='list-group-item'>
                        <h4 class='list-group-item-heading'>Smazat / upravit soutěž / tisk programu</h4>
                        <p class='list-group-item-text'>Smaže / upraví ročník</p>
                    </a>

                </div>
            </div><!-- /.col-sm-4 -->
            <div class='col-sm-4'>
                <div class='list-group'>
                    <a href='classes/classes-add.php' class='list-group-item active'>
                        <h4 class='list-group-item-heading'>Přidat/upravit třídy do soutěže</h4>
                        <p class='list-group-item-text'>Před zápisem výsledků je nutné vložit příslušnou třídu jako startující</p>
                    </a>
                </div>
            </div><!-- /.col-sm-4 -->
        </div>
        <div class='row'>

            <div class='col-sm-4'>
                <div class='list-group'>
                    <a href="start-list/start-list.php" class='list-group-item active'>
                        <h4 class='list-group-item-heading'>Vytvoření startovek</h4>
                        <p class='list-group-item-text'>Přiřazení atletů do disciplín</p>
                    </a>
                    <a href="start-list/start-list-edit.php" class='list-group-item'>
                        <h4 class='list-group-item-heading'>Upravit startovky</h4>
                        <p class='list-group-item-text'>Upraví startovní listiny</p>
                    </a>
                    <a href="start-list-print/start-list.php" class='list-group-item'>
                        <h4 class='list-group-item-heading'>Vytisknout startovky</h4>
                        <p class='list-group-item-text'>Vytiskne startovní listiny </p>
                    </a>
                </div>
            </div><!-- /.col-sm-4 -->
            <div class='col-sm-4'>
                <div class='list-group'>
                    <a href='event-score/event-score.php' class='list-group-item active'>
                        <h4 class='list-group-item-heading'>Vkládání výsledků</h4>
                        <p class='list-group-item-text'>Vložení výsledků závodů a jejich úpravy</p>
                    </a>
                    <a href='event-print/event-print.php' class='list-group-item'>
                        <h4 class='list-group-item-heading'>Tisk tříd</h4>
                        <p class='list-group-item-text'>Vytiskne výsledky soutěže dle tříd</p>
                    </a>
                    <a href='event-print/event-print-disciplines.php' class='list-group-item'>
                        <h4 class='list-group-item-heading'>Tisk disciplín</h4>
                        <p class='list-group-item-text'>Vytiskne výsledky soutěže dle disciplín</p>
                    </a>
                </div>
            </div><!-- /.col-sm-4 -->
            <div class='col-sm-4'>
                <div class='list-group'>
                    <a href='statistics/select-event-discipline.php' class='list-group-item alert-danger'>
                        <h4 class='list-group-item-heading'>Statistika závodu</h4>
                        <p class='list-group-item-text'>Vyhodnocení šestiboje</p>
                        <p class='list-group-item-text'>Sestava tříd podle počtu bodů</p>
                        <p class='list-group-item-text'>Sestava 3 nejlpších z každé disciplíny</p>
                        <p class='list-group-item-text'><strong>Tato část systému je ve vývoji</strong></p>
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
