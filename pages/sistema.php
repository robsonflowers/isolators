<?php if($nivelAcesso == 1):?>
<?php
include_once(BASE_PATH.'app/classes/Colaborador.dao.php');
include_once(BASE_PATH.'app/classes/Usuario.dao.php');
include_once(BASE_PATH.'app/classes/Funcao.dao.php');
include_once(BASE_PATH.'app/classes/NivelAcesso.dao.php');
?>

<?php if(isset($_GET['subpage'])):?>
    <?php $subpagina = $_GET['subpage']?>

<!-- SUBPAGINA "COLABORADORES" - INICIO -->
    <?php if($subpagina == 'colaboradores'):?>
<?php
if(isset($_POST['novoregistro'])){
    $login_net_colaborador = $_POST['logincolaborador'];
    $nome_colaborador = $_POST['nomecolaborador'];
    $funcao_colaborador = $_POST['funcaocolaborador'];
    $acesso = (isset($_POST['acesso']))?1:0;
    
    ColaboradorDAO::insere($login_net_colaborador, $nome_colaborador, $funcao_colaborador);
    if($acesso==1){
        $colaborador = ColaboradorDAO::retornaPorLoginNET($login_net_colaborador);
        $nome = explode(' ', $nome_colaborador);
        $nome_usuario = $nome[0];
        $nivel_acesso = $_POST['nivelacesso'];
        UsuarioDAO::insere($nome_usuario, '', $nivel_acesso, $colaborador->getCod_colaborador());
    }
}
$listacolaborador = ColaboradorDAO::retornaTodos();
$listafuncao = FuncaoDAO::retornaTodos();
$listanivelacesso = NivelAcessoDAO::retornaTodos()
?>

    <!-- ADICIONAR COLABORADORES - INICIO -->
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="row">
        <div class="panel panel-default" id="col">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-user">&nbsp;&nbsp;</span>Adicionar Técnico</h3>
            </div>
            <div class="panel-body">
                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="novoregistro" value="">
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="logincolaborador">Login do técnico</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name="logincolaborador" required="" value="<?php // echo $registro->getMini_inst_emta();?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="nomecolaborador">Nome do técnico</label>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" name="nomecolaborador" required="" value="<?php // echo $registro->getMini_inst_emta();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="funcaocolaborador">Função</label>
                        <div class="col-xs-9">
                            <select name="funcaocolaborador" class="form-control">
                                <option value="" selected="">Selecione uma opção</option>
                                <?php foreach($listafuncao as $listafuncao):?>
                                <option value="<?php echo $listafuncao->getCod_funcao()?>"><?php echo $listafuncao->getNome_funcao()?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <?php 
                                $status = 'checked';//($usuario->getStatus_usuario()==1)?'checked':'';
                                $cadeado = 'icon_lock-open_alt text-lightgreen';//($usuario->getStatus_usuario()==1)?'icon_lock-open_alt text-lightgreen':'icon_lock_alt text-lightcoral';
                            ?>
                        <label class="simple-switch simple-switch-green">
                            <input type="checkbox" class="simple-switch-input" data-id-usuario='' name="acesso" <?php echo $status;?>>
                            <span class="simple-switch-label" data-on="" data-off=""></span>
                            <span class="simple-switch-handle"></span>
                        </label>
                        <span class="cadeado <?php echo $cadeado;?>"></span>
                        <span class="texto-acao">Gerar</span> acesso ao sistema
                    </div>
                    <div class="form-group" id="nivel-acesso">
                        <label class="control-label col-xs-3" for="nivelacesso">Nível de acesso</label>
                        <div class="col-xs-9">
                            <select name="nivelacesso" class="form-control" required="">
                                <option value="" selected="">Selecione uma opção</option>
                                <?php foreach($listanivelacesso as $listanivelacesso):?>
                                <option value="<?php echo $listanivelacesso->getCod_nivel_acesso()?>"><?php echo $listanivelacesso->getDescricao_nivel_acesso()?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                                      
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Salvar alterações</button>
                </form>
            </div>    
        </div>
        
        
        
    </div>
</div>
    <!-- ADICIONAR COLABORADORES - FIM -->
    <!-- LISTAR COLABORADORES - INICIO -->
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-condensed text-center" >
                        <thead>
                            <tr>
                                <th class="">Login</th>
                                <th class="">Nome</th>
                                <th class="">Função</th>
                                <th class="">Status do usuário</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listacolaborador as $listacolaborador):?>
                            <tr>
                                <td><?php echo $listacolaborador->getLogin_net_colaborador()?></td>
                                <td><?php echo $listacolaborador->getNome_colaborador()?></td>
                                <td><?php echo $listacolaborador->getFuncao_colaborador()?></td>
                                <td>Liberado</td>
                            </tr>
                            
                        
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>
    </div>

</div> 
    <!-- LISTAR COLABORADORES - FIM -->
<!-- SUBPAGINA "COLABORADORES" - FIM -->
<!-- SUBPAGINA "CONFIGURACOES" - INICIO -->
    <?php elseif($subpagina == 'configuracoes'):?>

<!-- SUBPAGINA "CONFIGURACOES" - FIM -->
    <?php else:?>
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <?php include_once(BASE_PATH.'pages/404.php');?>
</div>
    <?php endif;?>
<?php endif;?>
<?php if(!isset($_GET['subpage'])):?>
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="page-header">
                <h2>Bem vindo a página de administração</h2>
                <small class="text-primary">Escolha uma das opções abaixo</small>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="page-header">
                <a href="colaboradores/" class="btn btn-primary btn-lg btn-block" role="button"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Gerenciar colaboradores</a>
                <a href="configuracoes/" class="btn btn-primary btn-lg btn-block" role="button"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>Gerenciar opções do sistema</a>
            </div>
        </div>
    </div>
    
</div>

<?php endif;?>
<?php endif;?>
<?php if($nivelAcesso != 1):?>
Você não possui acesso ao sistema
<?php endif; ?>


