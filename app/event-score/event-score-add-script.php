﻿<?PHP

      include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/dbconnect.php";
function koeficient($vek,$sex){
if($sex = "M"){
if( in_array( $vek , range( 0 , 14 ) ) ){$koeficient = 1.06; return $koeficient;}
if( in_array( $vek , range( 15 , 16 ) ) ){$koeficient = 1; return $koeficient;}
if( in_array( $vek , range( 17 , 300 ) ) ){$koeficient = 0.97; return $koeficient;}
}
elseif($sex = "F"){
if( in_array( $vek , range( 0 , 14 ) ) ){$koeficient = 1.07; return $koeficient;}
if( in_array( $vek , range( 15 , 16 ) ) ){$koeficient = 1.05; return $koeficient;}
if( in_array( $vek , range( 17 , 300 ) ) ){$koeficient = 1.02; return $koeficient;}
}
else{echo"Spatne zadane pohlavi."; exit;}
}

function getClosest($search, $arr) { //copied
   $closest = null;
   foreach($arr as $item) {
      if($closest == null || abs($search - $closest) > abs($item - $search)) {
         $closest = $item;
      }
   }
   return $closest;
}

function sedesatka($koeficient,$vykon){
include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/dbconnect.php";
$scorevalue= array();

$request = "SELECT * FROM `points` WHERE `discipline_id` = 1";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
      $raw = str_replace(",",".",$row[2]);
      array_push($scorevalue, $raw );
      }
      
$value = getClosest($vykon, $scorevalue);
$value = str_replace(".",",",$value);
$request = "SELECT * FROM `points` WHERE `discipline_id` = 1 AND `score_value` = '$value'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
print $row[4];
}

}
sedesatka(1,3.15);

?>

/*
20	M	0,97	F	1,02
19	M	0,97	F	1,02
18	M	0,97	F	1,02
17	M	0,97	F	1,02
16	M	1	F	1,05
15	M	1	F	1,05
14	M	1,06	F	1,07
13	M	1,06	F	1,07
*/