<?PHP include $_SERVER['DOCUMENT_ROOT'] . "/functions/check.php";
include $_SERVER['DOCUMENT_ROOT'] . "/header.php";
?>

<div class='container theme-showcase' role='main'>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class='page-header'>
        <h1><span class="label label-default">Registrace tříd do závodu</span></h1>
    </div>

    <?PHP
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = null;
    }

    if (isset($_GET['classes'])) {
        $classes = $_GET['classes'];
        $tridy = $classes;
    } else {
        $classes= null;
        $tridy=null;
    }


    if (isset($_GET['yearbegin'])) {
        $yearbegin = $_GET['yearbegin'];
        $zacatek = $yearbegin;
        $yearbegin = explode(",", $yearbegin);
    } else {
        $zacatek=null;
    }
    //$yearbegin = null;

    if (isset($classes)) {
        $classes = explode(",", $classes);
    } else {
        $classes = array();
    }

    /*if (isset($_GET['classadd'])) {
        array_push($classes, $_GET['classadd']);
        $classes = implode(",", $classes);
    } else {
        $classes = null;
    }*/
/*
    if (isset($yearbegin)) {
        $yearbegin = explode(",", $yearbegin);
        exit;
    } else {
        $yearbegin = null;
    }

   /* if (isset($_GET['yearadd']) && isset($yearbegin)) {
        array_push($yearbegin, $_GET['yearadd']);
        $yearbegin = implode(",", $yearbegin);
    } else {
        $yearbegin = null;
    }*/



    include $_SERVER['DOCUMENT_ROOT'] . "/functions/dbconnect.php";
    if (isset($_GET['id'])) { //Když se závod podaří vybrat
        echo "<div class='alert alert-info' role='alert'><strong>Vybráno!</strong> Závod byl úspěšně vybrán a nyní je potřeba do něj zaregistrovat třídy. (pokud byl vybrán špatný závod, klepněte <a href='?'>zde</a>)</div>";

        $request = "SELECT DISTINCT class,yearbegin FROM athletes ORDER by athletes.yearbegin DESC LIMIT 0,30";
        $result = $mysqli->query($request);
        $row_cnt = $result->num_rows;
    if($row_cnt==0){
        echo"<div class='alert alert-danger' role='alert'>";
        echo"Nebyly nalezeny žádné třídy! <strong><a href='javascript:history.go(-1)'>Před přidáním tříd do závodu je nutné vytvořit třídy.</a></strong>";
        echo"</div>";
    }else{
        echo "<h2><span class='label label-warning'>2. Vyberte třídy</span></h2><form><div class='list-group'>";
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            $classname=$row[0];
            $beginyear = $row[1];
            //$beginyear = preg_replace("/ - Name:.*/", "", $beginyear);
            $now = date("Y");
            $year = $now - $beginyear;

            echo "<a href='?id=" . $id ;
            //if(isset($classes)){echo"&classes=" . $classes;}
           // if(isset($classes)){echo"&classes=" . $classes;}
            //echo"&classadd=" . $classname . "&yearbegin=" . $yearbegin . "&yearadd=" . $beginyear . "' class='list-group-item'>Třída: <strong>" . $year . "." . $row[0] . "</strong> Rok začátku:" . $row[1] . " </a>";
            echo"&classes=";
            if($tridy!=null){echo$tridy.",";}

            echo$classname."&yearbegin=";
            if($zacatek!=null){echo $zacatek.",";}
            echo$beginyear."' class='list-group-item'>Třída: <strong>" . $year . "." . $classname . "</strong> Rok začátku:" . $row[1] . " </a>";
        }
        echo "</div></form>";
        $i = 0;
        //$tridy = array();
        //$zacatek = array();
        //$tridy = explode(",", $classes);
        //$tridy = implode(",", $classes);
        //$zacatek = explode(",", $yearbegin);
        //$zacatek = $yearbegin;
        $count = count($classes);
        //$count--;
        echo$count;        //$count--; Nope?
        echo "<div class='alert alert-success' role='alert'><strong>Přidáno:</strong>   ";
        if($classes==null){echo"***";}else{
        while ($i < $count) {
            $now = date("Y");
            //$year = 2015 - $yearbegin[$i];
            $year=$now-$yearbegin[$i];
            //print $yearbegin;
            print$yearbegin[0] . "." . $classes[$i] . ",";
            $i++;
        }}
        echo "<br> <strong>Každou třídu přidávejte pouze jednou! V případě chyby klepněte <a href='?id=" . $id . "'>sem</a>.</strong>
      </div>";
        echo "<div class='col-sm-4' style='float:right;'>
          <div class='list-group'>
            <a href='classes-add-script.php?id=" . $id . "&classes=" . $tridy . "&yearbegin=" . $zacatek . "' class='list-group-item active'>
              <h4 class='list-group-item-heading'>Dokončit registraci tříd</h4>
              <p class='list-group-item-text'>Po zvolení tříd již není možné dělat další změny do seznamu.</p>
            </a>
            <a href='?' class='list-group-item'>
              <h4 class='list-group-item-heading'>Začít odznova</h4>
              <p class='list-group-item-text'>Nějaká chyba? Stačí klepnout sem a vybrat znova.</p>
            </a>
            <a href='#' class='list-group-item'>
              <h4 class='list-group-item-heading'>Vyskytl se problém?</h4>
              <p class='list-group-item-text'>Kontakt: radim@lipovcan.cz Mobil: 728450179</p>
            </a>
          </div>
        </div>";

    }} else {
        $request = "SELECT * FROM `event` ORDER BY `event_date`";
        $result = $mysqli->query($request);
        $row_cnt = $result->num_rows;
        echo "<h2><span class='label label-warning'>1. Vyberte soutěž</span></h2><form><div class='list-group'>";
    if($row_cnt==0){
        echo"<div class='alert alert-danger' role='alert'>";
        echo"Nebyly nalezeny žádné soutěže! <strong><a href='javascript:history.go(-1)'>Zpět.</a></strong>";
        echo"</div>";
    }else{
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            echo "<a href='?id=" . $row[0] . "' class='list-group-item'>Název: " . $row[1] . " Datum: " . $row[4] . "</a>";
        }
        echo "</div></form>";
    }}

    ?>


</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
<script src='../js/docs.min.js'></script>


</body>
</html>
