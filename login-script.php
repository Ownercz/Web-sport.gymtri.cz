<?PHP
include "./functions/dbconnect.php";
$login = $_GET["login"];
$password = $_GET["password"];
$login = "ownercz";
$password = "test";
echo"o";
$hash = hash('sha256',$password.$salt);

$request = "SELECT * FROM `authentication` WHERE `username` = 'Ownercz' LIMIT 0,1";
$result = $mysqli->query($request);

if(1){
        $row = $result->fetch_row();
        $passworddb = $row[2];
            if (1 == 1) {
            
                    if (isset($_GET['remember-me'])) {
            
                    setcookie('gymtri_username', $login, time()+60*60*24*365);
                    setcookie('gymtri_password', $hash, time()+60*60*24*365);
        
                    } else {
            
                    setcookie('gymtri_username', $login);
                    setcookie('gymtri_password', $hash);
                    }
                    header('Location: ../app/');
            }
            else{
            header('Location: ' . $_SERVER['HTTP_REFERER'].'?w=1');
            exit;
            }
        }
else{exit;}




?>
