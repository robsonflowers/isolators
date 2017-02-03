<?php 
include_once('default.php');
include_once(BASE_PATH.'app/classes/Usuario.dao.php');
include_once(BASE_PATH.'app/classes/Bcrypt.class.php');
//Início da validação de login
if(isset($_POST['loginnet']) && isset($_POST['senhausuario'])){
    $login_net_colaborador = $_POST['loginnet'];
    $usuario = UsuarioDAO::retornaUsuarioPorLoginNET($login_net_colaborador);
        if($usuario){
            if(Bcrypt::check($_POST['senhausuario'], $usuario->getSenha_usuario())){
                session_start();
//                date_default_timezone_set("Brazil/East");
//                $tempolimite = 30;
                //fim das configurações de fuso horario e limite de inatividade//

                // aqui ta o seu script de autenticação no momento em que ele for validado você seta as configurações abaixo.//
                // seta as configurações de tempo permitido para inatividade//
                $_SESSION['registro'] = time(); // armazena o momento em que autenticado //
                $_SESSION['limite'] = $tempolimite; // armazena o tempo limite sem atividade //
                //
                // fim das configurações de tempo inativo//
                $_SESSION["codUsuarioLogado"] = $usuario->getCod_usuario();
                $_SESSION["codColaboradorLogado"] = $usuario->getColaborador();
                $_SESSION["nomeUsuarioLogado"] = $usuario->getNome_usuario();
                $_SESSION["nivelAcesso"] = $usuario->getNivel_acesso_usuario();
                


                $header = 'location:../';

            }
            else{
                $header = "location:../login/";
            }
        }
        else{
            
            $header = "location:../login/";
        }
}
else{
    $header = "location:../login/";
}
header($header);



