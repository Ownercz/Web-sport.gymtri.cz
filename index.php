<?PHP
if(1){
       //$row = $result->fetch_row();
        $passworddb = $row[2];
            if (1 == 1) {
            
                    if (isset($_GET['remember-me'])) {
            
                    setcookie('gymtri_username', $login, time()+60*60*24*365);
                    setcookie('gymtri_password', $hash, time()+60*60*24*365);
        
                    } else {
            
                    setcookie('gymtri_username', $login);
                    setcookie('gymtri_password', $hash);
                    }
                    header('Location: app/');
            }
            else{
            header('Location: ' . $_SERVER['HTTP_REFERER'].'?w=1');
            exit;
            }
        }
else{exit;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="./assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./assets/js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="container">

        <form class="form-signin" role="form" method="get" action="login-script.php">
            <h2 class="form-signin-heading">Přihlášení do systému</h2>
            <input type="login" class="form-control" placeholder="Login" required autofocus>
            <input type="password" class="form-control" placeholder="Heslo" required>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Zapamatovat
                </label>
                <?PHP  if(isset($_GET["w"])){
                echo "<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Špatný login</b> </label>";
                }?>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Přihlásit se</button><div><strong>Přihlášení</strong> více uživatelů není v této verzi podporováno. Pro spuštění aplikace se přihlašte pomocí přihlašovacích údajů test/test.</div>

        </form>
     </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
