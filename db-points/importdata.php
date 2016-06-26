<?PHP
/*
 * Import bodů do MySQL databáze
 * Určeno pouze pro přidávání, změnu údajů jednotlivých bodových ohodnocení disciplín.
 * V případě přidání disciplíny je potřeba také zanést do tabulky disciplines novou položku.
 */
include "../functions/config.php";
include "../functions/dbconnect.php";
//$mysqli->query("TRUNCATE points");
$file = @fopen('LIP_RAD_SEZNAM.csv', "r") ;
$i=0;
echo "<br>";
while (!feof($file))
{

    $line = fgets($file) ;
    $line = explode(';',$line) ;
    $jmeno= $line[0];
    $prijmeni=$line[1];
    $pohlavi= $line[6];
    $pohlavi=substr($pohlavi,0,1);
    $datumnarozeni=$line[3];
    $datumnarozeni= str_replace(".", "-", $datumnarozeni);
    $trida= $line[2];
    $trida=substr($trida,-1);
    $zacatekskoly=$line[5];
    $zacatekskoly=substr($zacatekskoly,-4);


    if($pohlavi=="Z"){$pohlavi="F";}
    elseif($pohlavi=="M"){$pohlavi="M";}
    else{
        $jmeno= $line[0]." ".$line[1];

        $prijmeni=$line[2];
        $pohlavi= $line[7];
        $pohlavi=substr($pohlavi,0,1);
        $datumnarozeni=$line[4];
        $trida= $line[3];
        $trida=substr($trida,-1);
        $zacatekskoly=$line[6];
        $zacatekskoly=substr($zacatekskoly,-4);
    }

    $request = "SELECT * FROM `sport_gymtri_cz`.`athletes`  WHERE first_name LIKE '$jmeno' AND last_name LIKE '$prijmeni' AND yearbegin = $zacatekskoly;";
    //  echo $request;
    $result = $mysqli->query($request);
    $row_cnt = $result->num_rows;

    printf("Result set has %d rows.\n", $row_cnt);
    if ($row_cnt==0) { $request= "INSERT INTO `sport_gymtri_cz`.`athletes` (`id`, `first_name`, `last_name`, `gender`, `birthdate`, `class`, `yearbegin`) VALUES (NULL, '$jmeno', '$prijmeni', '$pohlavi', '$datumnarozeni', '$trida', '$zacatekskoly');";
        echo $request;
        $result = $mysqli->query($request);
    }else{
        $request="UPDATE `sport_gymtri_cz`.`athletes` SET `gender`='$pohlavi', `birthdate`='$datumnarozeni'  WHERE  `first_name`= '$jmeno' AND  `last_name`= '$prijmeni' ;";
        $result = $mysqli->query($request);
        echo $request;
    }

}



fclose($file) ;//$mysqli->query("TRUNCATE points");
?>