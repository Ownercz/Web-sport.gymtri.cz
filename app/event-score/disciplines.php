<?PHP
function koeficient($vek,$sex){
if($sex == "M"){
if( in_array( $vek , range( 0 , 14 ) ) ){$koeficient = 1.06; return $koeficient;}
if( in_array( $vek , range( 15 , 16 ) ) ){$koeficient = 1; return $koeficient;}
if( in_array( $vek , range( 17 , 300 ) ) ){$koeficient = 0.97; return $koeficient;}
}
if($sex == "F"){
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

function sedesatka($koeficient,$vykon,$sex,$mysqli){

$scorevalue= array();

$request = "SELECT * FROM `points` WHERE `discipline_id` = 1 AND `score_value_gender` = '$sex'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
      $raw = str_replace(",",".",$row[2]);
      array_push($scorevalue, $raw );
      }
      
$value = getClosest($vykon, $scorevalue);
$value = str_replace(".",",",$value);
$request = "SELECT * FROM `points` WHERE `discipline_id` = 1  AND `score_value_gender` = '$sex' AND `score_value` = '$value'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
return $row[4]*$koeficient;
}

}
function stovka($koeficient,$vykon,$sex,$mysqli){

$scorevalue= array();

$request = "SELECT * FROM `points` WHERE `discipline_id` = 2 AND `score_value_gender` = '$sex'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
      $raw = str_replace(",",".",$row[2]);
      array_push($scorevalue, $raw );
      }
      
$value = getClosest($vykon, $scorevalue);
$value = str_replace(".",",",$value);
$request = "SELECT * FROM `points` WHERE `discipline_id` = 2  AND `score_value_gender` = '$sex' AND `score_value` = '$value'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
return $row[4]*$koeficient;
}
}
function patnactistovka($koeficient,$vykon,$sex,$mysqli){

$scorevalue= array();

$request = "SELECT * FROM `points` WHERE `discipline_id` = 3 AND `score_value_gender` = '$sex'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
      $raw = str_replace(",",".",$row[2]);
      array_push($scorevalue, $raw );
      }
      
$value = getClosest($vykon, $scorevalue);
$value = str_replace(".",",",$value);
$request = "SELECT * FROM `points` WHERE `discipline_id` = 3  AND `score_value_gender` = '$sex' AND `score_value` = '$value'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
return $row[4]*$koeficient;
}
}
function tritisicovka($koeficient,$vykon,$sex,$mysqli){

$scorevalue= array();

$request = "SELECT * FROM `points` WHERE `discipline_id` = 4 AND `score_value_gender` = '$sex'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
      $raw = str_replace(",",".",$row[2]);
      array_push($scorevalue, $raw );
      }
      
$value = getClosest($vykon, $scorevalue);
$value = str_replace(".",",",$value);
$request = "SELECT * FROM `points` WHERE `discipline_id` = 4  AND `score_value_gender` = '$sex' AND `score_value` = '$value'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
return $row[4]*$koeficient;
}
}

function dalka($koeficient,$vykon,$sex,$mysqli){

$scorevalue= array();

$request = "SELECT * FROM `points` WHERE `discipline_id` = 5 AND `score_value_gender` = '$sex'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
      $raw = str_replace(",",".",$row[2]);
      array_push($scorevalue, $raw );
      }
      
$value = getClosest($vykon, $scorevalue);
$value = str_replace(".",",",$value);
$request = "SELECT * FROM `points` WHERE `discipline_id` = 5  AND `score_value_gender` = '$sex' AND `score_value` = '$value'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
return $row[4]*$koeficient;
}
}

function vyska($koeficient,$vykon,$sex,$mysqli){

$scorevalue= array();

$request = "SELECT * FROM `points` WHERE `discipline_id` = 6 AND `score_value_gender` = '$sex'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
      $raw = str_replace(",",".",$row[2]);
      array_push($scorevalue, $raw );
      }
      
$value = getClosest($vykon, $scorevalue);
$value = str_replace(".",",",$value);
$request = "SELECT * FROM `points` WHERE `discipline_id` = 6  AND `score_value_gender` = '$sex' AND `score_value` = '$value'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
return $row[4]*$koeficient;
}
}

function mic($koeficient,$vykon,$sex,$mysqli){

$scorevalue= array();

$request = "SELECT * FROM `points` WHERE `discipline_id` = 7 AND `score_value_gender` = '$sex'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
      $raw = str_replace(",",".",$row[2]);
      array_push($scorevalue, $raw );
      }
      
$value = getClosest($vykon, $scorevalue);
$value = str_replace(".",",",$value);
$request = "SELECT * FROM `points` WHERE `discipline_id` = 7  AND `score_value_gender` = '$sex' AND `score_value` = '$value'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
return $row[4]*$koeficient;
}
}

function granat($koeficient,$vykon,$sex,$mysqli){

$scorevalue= array();

$request = "SELECT * FROM `points` WHERE `discipline_id` = 8 AND `score_value_gender` = '$sex'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
      $raw = str_replace(",",".",$row[2]);
      array_push($scorevalue, $raw );
      }
      
$value = getClosest($vykon, $scorevalue);
$value = str_replace(".",",",$value);
$request = "SELECT * FROM `points` WHERE `discipline_id` = 8  AND `score_value_gender` = '$sex' AND `score_value` = '$value'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
return $row[4]*$koeficient;
}
}

function splh($koeficient,$vykon,$sex,$mysqli){

$scorevalue= array();

$request = "SELECT * FROM `points` WHERE `discipline_id` = 9 AND `score_value_gender` = '$sex'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
      $raw = str_replace(",",".",$row[2]);
      array_push($scorevalue, $raw );
      }
      
$value = getClosest($vykon, $scorevalue);
$value = str_replace(".",",",$value);
$request = "SELECT * FROM `points` WHERE `discipline_id` = 9  AND `score_value_gender` = '$sex' AND `score_value` = '$value'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
return $row[4]*$koeficient;
}
}

function dvacetpetkavz($koeficient,$vykon,$sex,$mysqli){

$scorevalue= array();

$request = "SELECT * FROM `points` WHERE `discipline_id` = 10 AND `score_value_gender` = '$sex'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
      $raw = str_replace(",",".",$row[2]);
      array_push($scorevalue, $raw );
      }
      
$value = getClosest($vykon, $scorevalue);
$value = str_replace(".",",",$value);
$request = "SELECT * FROM `points` WHERE `discipline_id` = 10  AND `score_value_gender` = '$sex' AND `score_value` = '$value'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
return $row[4]*$koeficient;
}
}

function padesatkavz($koeficient,$vykon,$sex,$mysqli){

$scorevalue= array();

$request = "SELECT * FROM `points` WHERE `discipline_id` = 11 AND `score_value_gender` = '$sex'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
      $raw = str_replace(",",".",$row[2]);
      array_push($scorevalue, $raw );
      }
      
$value = getClosest($vykon, $scorevalue);
$value = str_replace(".",",",$value);
$request = "SELECT * FROM `points` WHERE `discipline_id` = 11  AND `score_value_gender` = '$sex' AND `score_value` = '$value'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
return $row[4]*$koeficient;
}
}

function stovkavz($koeficient,$vykon,$sex,$mysqli){

$scorevalue= array();

$request = "SELECT * FROM `points` WHERE `discipline_id` = 12 AND `score_value_gender` = '$sex'";
$result = $mysqli->query($request);
while($row = $result->fetch_array(MYSQLI_NUM)){
      $raw = str_replace(",",".",$row[2]);
      array_push($scorevalue, $raw );
      }
      
$value = getClosest($vykon, $scorevalue);
$value = str_replace(".",",",$value);
$request = "SELECT * FROM `points` WHERE `discipline_id` = 12  AND `score_value_gender` = '$sex' AND `score_value` = '$value'";
$result = $mysqli->query($request);

while($row = $result->fetch_array(MYSQLI_NUM)){
return $row[4]*$koeficient;
}


}