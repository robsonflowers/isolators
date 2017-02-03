<?php
include_once(BASE_PATH.'app/classes/Usuario.dao.php');
include_once(BASE_PATH.'app/classes/Colaborador.dao.php');
include_once(BASE_PATH.'app/classes/Bcrypt.class.php');


$usuario = '';
$ok = 0;
$mensagem = '';
if(isset($_POST['verificalogin'])){
    $login_net_colaborador = $_POST['verificalogin'];
    $usuario = UsuarioDAO::retornaUsuarioPorLoginNET($login_net_colaborador);
    if($usuario){
        if($usuario->getSenha_usuario()!=''){
            $alerta = "Olá!";
            $mensagem = "Parece que você já possui acesso liberado ao sistema. É só logar.";
            $tipomensagem = "alert-info";
        }
        else{
            $ok = 1;
        }
    }
    else{
        $alerta = "Atenção!";
        $mensagem = "Seu usuário ainda não foi autorizado pelo administrador.";
        $tipomensagem = "alert-danger";
    }
}
if(isset($_POST['novonomeusuario'])&&isset($_POST['novasenha'])){
    if($_POST['novasenha']!=''){
        $hash = Bcrypt::hash($_POST['novasenha']);
        UsuarioDAO::atualiza($_POST['codusuario'], $_POST['novonomeusuario'], $hash);
        $ok = 0;
        $alerta = "Sucesso!";
        $mensagem = "Cadastro concluído.";
        $tipomensagem = "alert-success";
    }
}
?>

<div class="col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
    <div class="top-colored-border"></div>
    <div class="panel panel-default bordas-topo-retas">
        <div class="panel-body">
            <img src="<?php echo BASE_URL; ?>/files/images/icons/favicon.png" class="img-responsive img-circle center-block"/>
            <form action="<?php echo BASE_URL; ?>app/validalogin.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <h1 class="login-title">Login</h1>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <input type="text" name="loginnet" class="form-control" placeholder="Login NET">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <input type="password" name="senhausuario" class="form-control" id="senha" placeholder="Senha">
                    </div>
                </div>
                <button type="submit" class="btn btn-info btn-block">Entrar</button>
            </form>
        </div>
    </div>
</div> 

<?php if($ok===0):?>
<?php if($mensagem!=''):?>
<div class="col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
    <div class="alert <?php echo $tipomensagem;?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong><?php echo $alerta;?></strong> <?php echo $mensagem;?>
    </div>
</div>
<?php endif;?>
<div class="col-lg-4 col-lg-offset-4">
    <div class="panel panel-default">
        <div class="panel-heading">Informe o seu login NET para verificar se você já possui liberação</div>
        <div class="panel-body">
            <form action="<?php echo BASE_URL; ?>login/" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="verificalogin">Login NET</label>
                  <input type="text" name="verificalogin" class="form-control">
                </div>
                <button type="submit" class="btn btn-default">Verificar</button>
            </form>
        </div>
    </div>
</div> 
<?php endif;?>

<?php if($ok===1):?>
<?php $colaborador = ColaboradorDAO::retornaPorLoginNET($login_net_colaborador);?>
<div class="col-lg-4 col-lg-offset-4">
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>Beleza, seu usuário já está liberado. Só faltam umas coisinhas.</h4>
            <h4>Vamos lá. Você deve criar uma senha de acesso.</h4>
            <form action="<?php echo BASE_URL; ?>login/" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="codusuario" value="<?php echo $usuario->getCod_usuario();?>"/>
                <div class="form-group">
                    <label for="nome">Colaborador</label>
                    <input type="text" name="nome" value="<?php echo $colaborador->getNome_colaborador();?>" disabled="disabled" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="nome">Nome usuário</label>
                    <input type="text" name="novonomeusuario" class="form-control" required=""/>
                </div>
                <div class="form-group">
                    <label for="nome">Senha</label>
                    <input type="password" name="novasenha" class="form-control" required=""/>
                </div>
                <button type="submit" class="btn btn-default">Registrar</button>
            </form>
        </div>
    </div>
</div>
<?php endif;?>
