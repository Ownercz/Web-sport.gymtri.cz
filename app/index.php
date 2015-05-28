<?PHP include $_SERVER['DOCUMENT_ROOT']."/functions/check.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";
?>

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
                        <h4 class='list-group-item-heading'>Tisk výsledků</h4>
                        <p class='list-group-item-text'>Vytiskne výsledky soutěže</p>
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
