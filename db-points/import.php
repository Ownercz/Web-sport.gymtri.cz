<?PHP
/*
 * Import bodů do MySQL databáze
 * Určeno pouze pro přidávání, změnu údajů jednotlivých bodových ohodnocení disciplín.
 * V případě přidání disciplíny je potřeba také zanést do tabulky disciplines novou položku.
 */
include "config.php";
$mysqli->query("TRUNCATE points");
$file = @fopen('holky_export.csv', "r") ;
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
    $sedesatmCas= $line[0];
    $sedesatmBody=$line[12];
    $stomCas= $line[1];
    $stomBody=$line[13];
    $tisicpetsetmCas= $line[2];
    $tisicpetsetmBody=$line[14];
    $tritisicemCas= $line[3];
    $tritisicemBody=$line[15];
    $dalkaCas= $line[4];
    $dalkaBody=$line[16];
    $vyskaCas= $line[5];
    $vyskaBody=$line[17];
    $kriketCas= $line[6];
    $kriketBody=$line[18];
    $granatCas= $line[7];
    $granatBody=$line[19];
    $splhCas= $line[8];
    $splhBody=$line[20];
    $dvacetpetmPlCas= $line[9];
    $dvacetpetmPlBody=$line[21];
    $padesatmPlCas= $line[10];
    $padesatmPlBody=$line[22];
    $stomPlCas= $line[11];
    $stomPlBody=$line[23];
    $request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '1', '$sedesatmCas', 'F', '$sedesatmBody');"; $result = $mysqli->query($request);
    $request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '2', '$stomCas', 'F', '$stomBody');"; $result = $mysqli->query($request);
    $request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '3', '$tisicpetsetmCas', 'F', '$tisicpetsetmBody');"; $result = $mysqli->query($request);
    $request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '4', '$tritisicemCas', 'F', '$tritisicemBody');"; $result = $mysqli->query($request);
    $request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '5', '$dalkaCas', 'F', '$dalkaBody');"; $result = $mysqli->query($request);
    $request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '6', '$vyskaCas', 'F', '$vyskaBody');"; $result = $mysqli->query($request);
    $request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '7', '$kriketCas', 'F', '$kriketBody');"; $result = $mysqli->query($request);
    $request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '8', '$granatCas', 'F', '$granatBody');"; $result = $mysqli->query($request);
    $request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '9', '$splhCas', 'F', '$splhBody');"; $result = $mysqli->query($request);
    $request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '10', '$dvacetpetmPlCas', 'F', '$dvacetpetmPlBody');"; $result = $mysqli->query($request);
    $request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '11', '$padesatmPlCas', 'F', '$padesatmPlBody');"; $result = $mysqli->query($request);
    $request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '12', '$stomPlCas', 'F', '$stomPlBody');"; $result = $mysqli->query($request);


}   

fclose($file) ;//$mysqli->query("TRUNCATE points");
$file = @fopen('chlapci_export.csv', "r") ;
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
$sedesatmCas= $line[0];
$sedesatmBody=$line[12];
$stomCas= $line[1];
$stomBody=$line[13];
$tisicpetsetmCas= $line[2];
$tisicpetsetmBody=$line[14];
$tritisicemCas= $line[3];
$tritisicemBody=$line[15];
$dalkaCas= $line[4];
$dalkaBody=$line[16];
$vyskaCas= $line[5];
$vyskaBody=$line[17];
$kriketCas= $line[6];
$kriketBody=$line[18];
$granatCas= $line[7];
$granatBody=$line[19];
$splhCas= $line[8];
$splhBody=$line[20];
$dvacetpetmPlCas= $line[9];
$dvacetpetmPlBody=$line[21];
$padesatmPlCas= $line[10];
$padesatmPlBody=$line[22];
$stomPlCas= $line[11];
$stomPlBody=$line[23];
$request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '1', '$sedesatmCas', 'M', '$sedesatmBody');"; $result = $mysqli->query($request);
$request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '2', '$stomCas', 'M', '$stomBody');"; $result = $mysqli->query($request);
$request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '3', '$tisicpetsetmCas', 'M', '$tisicpetsetmBody');"; $result = $mysqli->query($request);
$request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '4', '$tritisicemCas', 'M', '$tritisicemBody');"; $result = $mysqli->query($request);
$request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '5', '$dalkaCas', 'M', '$dalkaBody');"; $result = $mysqli->query($request);
$request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '6', '$vyskaCas', 'M', '$vyskaBody');"; $result = $mysqli->query($request);
$request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '7', '$kriketCas', 'M', '$kriketBody');"; $result = $mysqli->query($request);
$request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '8', '$granatCas', 'M', '$granatBody');"; $result = $mysqli->query($request);
$request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '9', '$splhCas', 'M', '$splhBody');"; $result = $mysqli->query($request);
$request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '10', '$dvacetpetmPlCas', 'M', '$dvacetpetmPlBody');"; $result = $mysqli->query($request);
$request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '11', '$padesatmPlCas', 'M', '$padesatmPlBody');"; $result = $mysqli->query($request);
$request= "INSERT INTO `sport_gymtri_cz`.`points` (`id`, `discipline_id`, `score_value`, `score_value_gender`, `score_points`) VALUES (NULL, '12', '$stomPlCas', 'M', '$stomPlBody');"; $result = $mysqli->query($request);

}   

fclose($file) ;
?>