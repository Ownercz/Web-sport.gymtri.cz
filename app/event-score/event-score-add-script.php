<?PHP

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


?>