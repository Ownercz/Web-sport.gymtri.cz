<?PHP
/*
 * Import bodů do MySQL databáze
 * Určeno pouze pro přidávání, změnu údajů jednotlivých bodových ohodnocení disciplín.
 * V případě přidání disciplíny je potřeba také zanést do tabulky disciplines novou položku.
 */
include "config.php";
//$mysqli->query("TRUNCATE points");
$file = @fopen('LIP_RAD_SEZNAM.CSV', "r") ;
$i=0;
while (!feof($file))
{
    if($i=0){break;}$i++;
    $line = fgets($file) ;
    $line = str_replace(";;",";",$line);
    echo $line."<br>";
    $line = explode(';',$line) ;
    $i=0;
    while($i<21){
        $line[$i] = str_replace(",",".",$line[$i]);
        if((substr_count($line[$i], ':')==1)){$timing=explode(':',$line[$i]) ; $timing[0]=$timing[0]*60;$time=$timing[0]+$timing[1]; $line[$i] = $time;}
        $i++;
    }
    $jmeno= $line[0];
    $prijmeni=$line[1];
    $pohlavi= $line[6];
	if($pohlavi=="Z"){$pohlavi="F";}else{$pohlavi="M";}
    $datumnarozeni=$line[3];
    $trida= $line[2];
	$trida=substr($trida,-1);
    $zacatekskoly=$line[5];
	$zacatekskoly=substr($zacatekskoly,-4);
    $request= "INSERT INTO `sport_gymtri_cz`.`athletes` (`id`, `first_name`, `second_name`, `gender`, `birthdate`, `class`, `yearbegin`) VALUES (NULL, '$jmeno', '$prijmeni', '$pohlavi', '$datumnarozeni', '$trida', '$zacatekskoly');"; 
	echo $request;
	//$result = $mysqli->query($request);
}   

fclose($file) ;//$mysqli->query("TRUNCATE points");
?>