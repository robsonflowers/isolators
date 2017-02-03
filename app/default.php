<?php 

# Está online?
define('ONLINE', false);

# Timezone
define('DEFAULT_TIMEZONE', 'America/Sao_Paulo');
setlocale(LC_ALL, "pt_BR", "ptb");
# Set Timezone
date_default_timezone_set(DEFAULT_TIMEZONE);

# Dados de conexão
//if(ONLINE)
//{
//    # Dados para conexão online
//    $server = "mysql.hostinger.com.br";
//    $user = "u462788887_admin";
//    $pass = "ma4rxo";
//    $bd = "u462788887_sist";
//
//    # Base URL
//    define('BASE_URL', '');
//    define('PATH_IMG', '');
//}
//else
//{    
    # Dados para conexão local
//    $server = "localhost";
//    $user = "root";
//    $pass = "";
//    $bd = "";

    # Base URL
    define('BASE_URL', 'http://localhost/isolators/');
//    define('BASE_URL', 'http://isolator.pe.hu/');
//}

# Definir o caminho base para a pasta root
define('BASE_PATH', dirname(__FILE__).'/../');

//try
//{
//    $pdo = new PDO("mysql:host=$server;dbname=$bd", $user, $pass);
//    
//}
//catch(PDOException $e)
//{
//    echo '<pre>Falha na conexão com o banco de dados. <br/>Dados do erro: '.$e->getMessage().'</pre>';
//}


# Inclusão e instanciamento das classes
include_once BASE_PATH.'/app/classes/Utils.php';
$Utils = new Utils();



// Define uma lista com os arquivos que poderão ser chamados na URL
$permitidos = array('conta', 'relatorios', 'contratos', 'login', 'sobre', 'sistema', 'logout');
// Verifica se a variável $_GET['pagina'] existe E se ela faz parte da lista de arquivos permitidos
if(isset($_GET['page'])) {
    $page = (array_search($_GET['page'], $permitidos) !== false) ? $_GET['page'] : '404';
}else{
     //se não tiver nada, ela recebe o valor: index (referente ao arquivo pages/index.php
    $page = 'index';
    
}   

//aqui setamos um diretório onde ficarão as páginas internas do site
$pasta = 'pages';
//
$pagina = (file_exists("{$pasta}/" . $page . '.php')) ? $page : '404';

#Page title
switch ($pagina){
    case 'conta';
        $title = 'MINI - Configurações de Conta';
        break;
    case 'relatorios';
        $title = 'MINI - Relatórios';
        break;
    case 'contratos';
        $title = 'MINI - Contratos';
        break;
    case 'login';
        $title = 'MINI - Login';
        break;
    case 'sobre';
        $title = 'MINI - Sobre';
        break;
    case 'sistema';
        $title = 'MINI - Sistema';
        break;
    case '404';
        $title = 'MINI - Página não encontrada';
        break;
    default:
        $title = 'MINI - Início';
}

