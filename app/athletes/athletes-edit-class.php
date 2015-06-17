<?PHP
include"../../functions/check.php";
include"../../functions/dbconnect.php";
include"../../header.php";
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

                $class = $mysqli->real_escape_string($_GET['class']);
                $yearbegin = $mysqli->real_escape_string($_GET['yearbegin']);
                $request = "SELECT * FROM `athletes` WHERE `class` = '$class' AND `yearbegin` = '$yearbegin' ORDER BY `id` ASC";
                $result = $mysqli->query($request);

                if ($result->num_rows === 0) {
                    echo "<a href='..'><button type='button' class='btn btn-warning'>Tato třída neobsahuje žádné závodníky!</button></a>";
                }

                while ($row = $result->fetch_array(MYSQLI_NUM)) {
                    $class = $row[5];
                    $yearbegin = $row[6];
                    echo "<form method='POST' style='margin:0'action='athletes-edit-class-script.php?id=" . $row[0] . "' target='_blank' onsubmit='setTimeout(function () { window.location.reload(); }, 30)'><tr><td>" . $row[0] . "</td><td><input type='text' name='trida' size='1' value='" . $row[5] . "'></input></td><td><input type='text' name='jmeno' value='" . $row[1] . "'></input></td><td><input type='text' name='prijmeni' value='" . $row[2] . "'></input></td><td><input type='text' name='sex' size='1' value='" . $row[3] . "'></input></td><td><input type='text' name='narozeni' value='" . $row[4] . "'></input></td><td><input type='text' name='zacatek' value='" . $row[6] . "'></input></td><td><button type='submit' value='Aktualizovat' onClick='' class='btn btn-primary'>Aktualizovat</button></form></td><td><form method='POST' style='margin:0'action='athletes-edit-class-script.php?id=" . $row[0] . "&delete=1' target='_blank' onsubmit='setTimeout(function () { window.location.reload(); }, 30)'><input type='submit'  value='DELETE'class='btn btn-danger'></form></td></tr>";
                }

                ?>
                </tbody>
            </table>
   <form id="delete-all" method='POST' style='margin:0'action='athletes-edit-class-script.php?id=" . $row[0] . "&delete=all' target='_blank' onsubmit='return confSubmit();'>
       <input type="hidden" name="trida" value="<?PHP echo $class; ?>">
       <input type="hidden" name="zacatek" value="<?PHP echo $yearbegin; ?>">
       <input type='submit'  value=' Smazat celou třídu'class='btn btn-danger' "></form>
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

            <form name="formatus" action="athletes-add-script.php" target='_blank'
                  onsubmit='setTimeout(function () { window.location.reload(); }, 30)' method="POST">
                <div id="dynamicInput">
                    <input type='text' class='form-control' name='trida1' placeholder='Třída "A"' value=''
                           required><input type='text' class='form-control' name='jmeno1' placeholder='Jméno "Pepa"'
                                           required><input type='text' class='form-control' name='prijmeni1'
                                                           placeholder='Příjmení "Novák"' required><input type='text'
                                                                                                          class='form-control'
                                                                                                          name='sex1'
                                                                                                          placeholder='Muž "M" Žena "F"'
                                                                                                          required><input
                        type='text' class='form-control' name='narozeni1' placeholder='Tvar "dd-mm-yyyy"'
                        required><input type='number' class='form-control' min='1900' max='2100' name='zacatek1'
                                        placeholder='"2008"' required>

                </div>
                <input type="button" value="Přidat dalšího" onClick="addInput('dynamicInput');">
                <br>
                <button type="submit" class="btn btn-primary" style="float:right;width:100%;">
                    <i class="icon-user icon-white"></i> Přidat
                </button>
            </form>

        </div>

    </div>


</div> <!-- /container -->

<script>

    var counter = 1;
    var limit = 16;
    function addInput(divName) {
        if (counter == limit) {
            alert("Stanoveny limit sportovcu je: " + counter + " vice jich pridat nelze!");
        }
        else {

            var newdiv = document.createElement('div');
            newdiv.innerHTML = "<input type='text' class='form-control' name='trida" + (counter + 1) + "' placeholder='Třída &quot;A&quot;' value=''required><input type='text' class='form-control' name='jmeno" + (counter + 1) + "' placeholder='Jméno &quot;Pepa&quot;'required><input type='text' class='form-control' name='prijmeni" + (counter + 1) + "' placeholder='Příjmení &quot;Novák&quot;'required><input type='text' class='form-control' name='sex" + (counter + 1) + "' placeholder='Muž &quot;M&quot; Žena &quot;F&quot;'required><input type='text' class='form-control' name='narozeni" + (counter + 1) + "' placeholder='Tvar &quot;dd-mm-yyyy&quot;' required><input type='number' class='form-control' min='1900' placeholder='&quot;2008&quot;'max='2100'name='zacatek" + (counter + 1) + "' required>";
            document.getElementById(divName).appendChild(newdiv);
            document.getElementsByName("trida" + (counter + 1)).item(0).value = document.getElementsByName("trida" + (counter)).item(0).value;
            document.getElementsByName("zacatek" + (counter + 1)).item(0).value = document.getElementsByName("zacatek" + (counter)).item(0).value;
            counter++;
        }
        document.formatus.action = "athletes-add-script.php?&count=" + (counter);
    }
</script>
<script type="text/javascript">
    function confSubmit() {
        var r=confirm('Are you sure you want to delete??');
        if(r==true){
            setTimeout(function () { window.location.reload(); }, 30);
        }
        return r;
    }
</script>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
<script src='../js/docs.min.js'></script>


</body>
</html>
