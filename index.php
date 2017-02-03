<?php 
include_once('app/default.php');
// A sessão precisa ser iniciada em cada página diferente
if($page != 'login' ){
    if(!isset($_SESSION)){ 
        session_start();
    }
    if( @$_GET['token'] === md5(session_id()) ){
        session_destroy();
        header("location:/isolators/login/");
        exit();
    }else {
        $sair = "<a href='".BASE_URL."logout/".md5(session_id())."'>Confirmar logout</a>";
    }
    if((!isset ($_SESSION['codUsuarioLogado']) == true) and (!isset ($_SESSION['codColaboradorLogado']) == true)) { 
        unset($_SESSION['codUsuarioLogado']);
        unset($_SESSION['codColaboradorLogado']); 
        unset($_SESSION['nomeUsuarioLogado']);
        unset($_SESSION['nivelAcesso']);
        header("location:/isolators/login/");
    }else{
        $codUsuarioLogado = $_SESSION['codUsuarioLogado'];
        $codColaboradorLogado = $_SESSION['codColaboradorLogado'];
        $nomeUsuarioLogado = $_SESSION['nomeUsuarioLogado'];
        $nivelAcesso = $_SESSION['nivelAcesso'];
//        $registro = $_SESSION['registro'];
//        $limite = $_SESSION['limite'];
//        // verifica se a session  registro esta ativa
//        if($registro){
//            $segundos = time()- $registro;
//        }
        /* verifica o tempo de inatividade 
        se ele tiver ficado mais de 900 segundos sem atividade ele destroi a session
        se não ele renova o tempo e ai é contado mais 900 segundos*/
//        if($segundos>$limite){
//            session_destroy();
//            header("location:/isolators/login/");
//        }
//        else{
//            $_SESSION['registro'] = time();
//        }
        // fim da verificação de inatividade
    }
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="pt-BR" xmlns:og="http://opengraphprotocol.org/schema/">
    <head>
        <link rel="icon" href="<?php echo BASE_URL; ?>files/images/icons/favicon.png" size="16x16">
        <meta name="robots" content="index, follow"/>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="author" content="Robson Flores"/>
        
        <title><?php echo $title;?></title>
        
        <link href="<?php echo BASE_URL; ?>files/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo BASE_URL; ?>files/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        
        <link href="<?php echo BASE_URL; ?>files/css/iconfonts.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo BASE_URL; ?>files/css/elegant-font.css" rel="stylesheet" type="text/css"/>
        
        <link href="<?php echo BASE_URL; ?>files/bootstrap-datepicker-1.5.0-dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo BASE_URL; ?>files/bootstrap-datepicker-1.5.0-dist/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.webui-popover/1.2.1/jquery.webui-popover.min.css">
        <link href="<?php echo BASE_URL; ?>files/toggle-switches/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo BASE_URL; ?>files/simple-switch/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo BASE_URL; ?>files/css/style.css" rel="stylesheet" type="text/css"/>
        
        <script src="<?php echo BASE_URL; ?>files/js/jquery.js"></script>
        <script src="<?php echo BASE_URL; ?>files/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_URL; ?>files/bootstrap-datepicker-1.5.0-dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>files/bootstrap-select-1.9.4/js/bootstrap-select.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>files/js/jquery.maskedinput.js"></script>
        <script src="<?php echo BASE_URL; ?>files/bootstrap-checkbox-master/js/bootstrap-checkbox.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>files/Bootstrap-3-Typeahead-master/bootstrap3-typeahead.min.js"></script>
        <script src="<?php echo BASE_URL; ?>files/js/jquery.webui-popover.js"></script>
        
        <script src="<?php echo BASE_URL; ?>files/js/functions.js"></script>
        <script src="<?php echo BASE_URL; ?>files/js/ajax.js"></script>
    </head>
    <body class="<?php echo $class = ($page=='login')?'background-color-1':'background-color';?>">
        
        <?php include_once('app/components/navbar.php');?>
        <div class="container-fluid">
            <?php if($page!='login'){include_once('app/components/sidebar.php');}?>
            <div class="row">
                <div role="main" class="main">
                    <h2 class="sub-header text-left"><!--Section title--></h2>
                    <?php include_once(BASE_PATH . 'pages/' . $page . '.php');?>
                </div>
            </div>
           
        </div>
                
    </body>
</html>
