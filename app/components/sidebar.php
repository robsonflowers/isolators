

<aside role="complementary" class="col-sm-3 col-md-2 col-xs-8 sidebar" id="">
<!--    <div class='profile'>
        <img src="<?php echo BASE_URL; ?>files/images/colaboradores/FP_N5805778.jpg" style="width: 50px" alt="" class="img-thumbnail">
    </div>-->
<div class=""><p class="text-muted"><?php echo $nomeUsuarioLogado.' está logado';?></p></div>
    <ul class="nav nav-sidebar text-left">
        <li <?php if($page == 'index'){ echo 'class="active"';}?>><a href="<?php echo BASE_URL; ?>"><span class="glyphicon glyphicon-home">&nbsp;&nbsp;</span>Início<span class="sr-only">(current)</span></a></li>
        <li <?php if($page == 'contratos'){ echo 'class="active"';}?>><a href="<?php echo BASE_URL; ?>contratos/"><span class="glyphicon glyphicon-list-alt">&nbsp;&nbsp;</span>Contratos</a></li>
        
        <li <?php if($page == 'relatorios'){ echo 'class="active"';}?>><a href="<?php echo BASE_URL; ?>relatorios/"><span class="glyphicon glyphicon-signal">&nbsp;&nbsp;</span>Relatórios</a></li>
        
        <li <?php if($page == 'conta'){ echo 'class="active"';}?>><a href="<?php echo BASE_URL; ?>conta/"><span class="glyphicon glyphicon-user">&nbsp;&nbsp;</span>Conta</a></li>

        <?php if($nivelAcesso == 1):?>
            <li <?php if($page == 'sistema'){ echo 'class="active"';}?>><a href="<?php echo BASE_URL; ?>sistema/"><span class="glyphicon glyphicon-cog">&nbsp;&nbsp;</span>Sistema</a></li>
        <?php endif;?>
        <li <?php if($page == 'logout'){ echo 'class="active"';}?>><a href="<?php echo BASE_URL; ?>logout/"><span class="glyphicon glyphicon-off">&nbsp;&nbsp;</span>Sair</a></li>
    </ul>
</aside>
