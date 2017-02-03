<?php 
include_once('../default.php');
include_once('../classes/Tecnicos.dao.php');
    $login = $_GET['login'];
    
    $tecnico = TecnicoDAO::retornaTecnicoPorLogin($login);

?>

<div class="webui-popover-content">
    <div class="col-md-5">
        <img src="<?php echo BASE_URL; ?>/files/images/eu.jpg" class="img-thumbnail" style="width: 100%">
    </div>
    <div class="col-md-7">
        <div class="row">
            <h4 class="align-center"><a href="<?php echo BASE_URL.'tecnicos/'.$tecnico->getLogin().'/'?>" alt="Ver perfil"><?php echo $tecnico->getNome_tecnico(); ?></a></h4>
        </div>
        <div class="row">
            <h5 class="text-muted"><span class="glyphicon glyphicon-barcode"></span>&nbsp;Login: <strong><?php echo $tecnico->getLogin(); ?></strong></h5>
            <h5 class="text-muted"><span class="glyphicon glyphicon-phone"></span>&nbsp;PDA: <strong><?php echo $tecnico->getCelular(); ?></strong></h5>

            <h5><a class="btn btn-default btn-xs" href="mailto:robson.flores2@net.com.br" role="button" data-toggle="tooltip" data-placement="bottom" title="Clique para enviar e-mail"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Enviar e-mail</a></h5>
        </div>
    </div>
</div>
