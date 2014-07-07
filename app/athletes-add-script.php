<?PHP
include"../functions/dbconnect.php";

if(isset($_GET["count"])){$count = $_GET["count"];}else{$count=1;}
$trida = array();
$prijmeni = array();
$jmeno = array();
$sex = array();
$narozeni = array();
$zacatek = array();
$i=0; $a=1;
while($i < $count){
array_push($trida,  $_POST['trida'.$a]);
array_push($prijmeni,  $_POST['prijmeni'.$a]);
array_push($jmeno,  $_POST['jmeno'.$a]);
array_push($sex,  $_POST['sex'.$a]);
array_push($narozeni,  $_POST['narozeni'.$a]);
array_push($zacatek,  $_POST['zacatek'.$a]);

print$_POST['zacatek'.$a]."<br>";$i++; $a++;
}$i=0;$a=0;
print_r($zacatek); print$count;
while($i < $count){
$jmenoi = $jmeno[$a];
$prijmenii = $prijmeni[$a];
$sexi = $sex[$a];
$narozenii = $narozeni[$a];
$tridai = $trida[$a];
$zacateki = $zacatek[$a];

     $request= "INSERT INTO `sport_gymtri_cz`.`athletes` (`id`, `first_name`, `last_name`, `gender`, `birthdate`, `class`, `yearbegin`) VALUES (NULL, '$jmenoi', '$prijmenii', '$sexi', '$narozenii','$tridai', '$zacateki')";
    $result = $mysqli->query($request);
  $i++; 
 $a++;
    }

    ?>