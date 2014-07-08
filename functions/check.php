<?PHP


if(isset($_COOKIE["gymtri_username"]) && isset($_COOKIE["gymtri_password"])){
print $_COOKIE["gymtri_username"];
}
else{header('Location: http://192.168.1.11/Web-sport.gymtri.cz/?w=1'); exit;}
?>