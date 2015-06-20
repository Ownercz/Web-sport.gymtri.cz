<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content='Radim Lipovčan'>
    <link rel='icon' href='../favicon.ico'>

    <title>Sport.gymtri.cz app</title>
      <?PHP
      $domain = $_SERVER['HTTP_HOST'];
      $docRoot = $_SERVER['DOCUMENT_ROOT'];
      $dirRoot = dirname(__FILE__);
      $protocol = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';
      //$urlDir = str_replace('/include', '/',str_replace($docRoot, '', $dirRoot));
      $urlDir = str_replace($docRoot, '', $dirRoot);
      $site_path = $protocol.$domain.$urlDir;
      $site_path=str_replace("c/xampp/htdocs/",$site_path,null);
      define ('BASE_URL', $site_path);?>
    <!-- Bootstrap core CSS -->
    <link href='<?PHP echo BASE_URL;?>/css/bootstrap.min.css' rel='stylesheet'>
    <!-- Bootstrap theme -->
    <link href='<?PHP echo BASE_URL;?>/css/bootstrap-theme.min.css' rel='stylesheet'>

    <!-- Custom styles for this template -->
    <link href='<?PHP echo BASE_URL;?>/css/theme.css' rel='stylesheet'>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src='../assets/js/ie8-responsive-file-warning.js'></script><![endif]-->
    <script src='<?PHP echo BASE_URL;?>/assets/js/ie-emulation-modes-warning.js'></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src='<?PHP echo BASE_URL;?>/assets/js/ie10-viewport-bug-workaround.js'></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
      <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
    <![endif]-->
  </head>

  <body role='document'>

    <!-- Fixed navbar -->
    <div class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
      <div class='container'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='<?PHP echo BASE_URL;?>/app'>Gymtri Sport</a>
        </div>
        <div class='navbar-collapse collapse'>
          <ul class='nav navbar-nav'>
            <li class='active'><a href='<?PHP echo BASE_URL;?>/app'>Domů</a></li>

              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
