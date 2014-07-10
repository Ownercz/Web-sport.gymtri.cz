<?PHP

include "disciplines.php";
if(isset($_POST['vykon'])){$vykon = $_POST['vykon'];$vykon = str_replace(",",".",$vykon); }
if(isset($_POST['discipline'])){$discipline = $_POST['discipline']; }
if(isset($_GET['vek'])){$vek = $_GET['vek'];$vek = str_replace(",",".",$vek); }
if(isset($_GET['sex'])){$sex = $_GET['sex'];$sex = str_replace(",",".",$sex); }
if(isset($_GET['id'])){$id = $_GET['id'];$id = str_replace(",",".",$id); }
if(isset($_GET['athleteid'])){$athleteid = $_GET['athleteid'];$athleteid = str_replace(",",".",$athleteid); }

$koeficient = koeficient($vek,$sex);
if($discipline =="60m"){
 print sedesatka($koeficient,$vykon,$sex);
}
elseif($discipline =="100m"){
 print stovka($koeficient,$vykon,$sex);
}
elseif($discipline =="1500m"){
print patnactistovka($koeficient,$vykon,$sex);
}
elseif($discipline =="3000m"){
print tritisicovka($koeficient,$vykon,$sex);
}
elseif($discipline =="dálka"){
print dalka($koeficient,$vykon,$sex);
}
elseif($discipline =="výška"){
print vyska($koeficient,$vykon,$sex);
}
elseif($discipline =="míč"){
print mic($koeficient,$vykon,$sex);
}
elseif($discipline =="granát"){
print granat($koeficient,$vykon,$sex);
}
elseif($discipline =="šplh"){
print splh($koeficient,$vykon,$sex);
}
elseif($discipline =="25m plavání"){
print dvacetpetkavz($koeficient,$vykon,$sex);
}
elseif($discipline =="50m plavání"){
print padesatkavz($koeficient,$vykon,$sex);
}
elseif($discipline =="100m plavání"){
print stovkavz($koeficient,$vykon,$sex);
}
else{exit;}
