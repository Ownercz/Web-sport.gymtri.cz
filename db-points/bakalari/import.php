<?PHP
/*
 * Import bodů do MySQL databáze
 * Určeno pouze pro přidávání, změnu údajů jednotlivých bodových ohodnocení disciplín.
 * V případě přidání disciplíny je potřeba také zanést do tabulky disciplines novou položku.
 */
include "../config.php";
//$mysqli->query("TRUNCATE points");
$file = @fopen('bakalari.txt', "r") ;
$i=0;
while (!feof($file))
{
    $line = fgets($file) ;
    $line = str_replace(";;",";",$line);
    echo $line."<br>";
    $line = explode(';',$line) ;
    $i=0;
    while($i<3){
        $line[$i] = str_replace(",",".",$line[$i]);
        if(($i==2)){$name=explode(' ',$line[$i]); $lastname=$name[0]; $firstname=$name[1];}


        $i++;
    }
    echo "****************<br>Importuji zaznam:<br>";
    echo "Rok zacatku studia: ".$line[0]."<br>";
    echo "Nazev tridy: ".$line[1]."<br>";
    echo "Cele jmeno: ".$line[2]."<br>";
    echo "Jmeno: ".$firstname."<br>";
    echo "Prijmeni: ".$lastname."<br>----------------<br>";
    $request = "INSERT INTO `sport_gymtri_cz`.`athletes` (`id`, `first_name`, `last_name`, `gender`, `birthdate`, `class`, `yearbegin`) VALUES (NULL, '$firstname', '$lastname', 'M', NULL, '$line[1]', '$line[0]');";
    echo"<br>".$request."<br>";
    $result = $mysqli->query($request);
}

fclose($file) ;//$mysqli->query("TRUNCATE points");
?>