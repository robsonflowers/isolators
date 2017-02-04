<?php
include_once(BASE_PATH.'app/classes/Mini.dao.php');

?>
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php 
                    $inst_emta = MiniDAO::somaRegistros('mini_inst_emta', '', '');
                    $sub_emta = MiniDAO::somaRegistros('mini_sub_emta', '', '');
                ?> 
                <div class="panel panel-default">
                    <div class="panel-heading">EMTA - Visão total</div>
                    <div class="panel-body">
                        <?php 
                            $inst_emta = MiniDAO::somaRegistros('mini_inst_emta', '', '');
                            $sub_emta = MiniDAO::somaRegistros('mini_sub_emta', '', '');
                        ?> 
                        <button class="btn btn-primary" type="button">
                            <strong>INSTALADOS</strong> <span class="badge"><?php echo $inst_emta;?></span>
                        </button>
                        <button class="btn btn-primary" type="button">
                            <strong>SUBSTITUÍDOS</strong> <span class="badge"><?php echo $sub_emta;?></span>
                        </button>
                    </div>    
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Decoder - Visão total</div>
                    <div class="panel-body">
                        <?php 
                            $inst_decoder = MiniDAO::somaRegistros('mini_inst_decoder', '', '');
                            $sub_decoder = MiniDAO::somaRegistros('mini_sub_decoder', '', '');
                        ?> 
                        <button class="btn btn-primary" type="button">
                            <strong>INSTALADOS</strong> <span class="badge"><?php echo $inst_decoder;?></span>
                        </button>
                        <button class="btn btn-primary" type="button">
                            <strong>SUBSTITUÍDOS</strong> <span class="badge"><?php echo $sub_decoder;?></span>
                        </button>
                    </div>    
                </div>
                <?php $soma =  $inst_emta+$sub_emta+$inst_decoder+$sub_decoder?>
                <h3>Total <span class="badge"><?php echo $soma;?></span></h3>
            </div>    
        </div>
    </div>
</div>  

<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-condensed text-center" >
                        <thead>
                            <tr>
                                <th class="">#</th>
                                <th class="">Data</th>
                                <th class="">Solicitante</th>
                                <th class="">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php // foreach($solicitacoes as $solicitacoes):?>
                            <?php // $tecnico = TecnicoDAO::retornaTecnicoPorLogin($solicitacoes->getTecnico());?>
                        <tr>
                            <td><a href="<?php echo BASE_URL; ?>solicitacoes/gerenciar-solicitacoes/<?php // echo $solicitacoes->getIdsolicitacao();?>/" class="visualizar"><span class="visualizar-conteudo" hidden=""><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></span><span class="visualizar-valor"><?php // echo $solicitacoes->getIdsolicitacao()?></span></a></td>
                            <td><?php // echo strftime('%d %b %y', strtotime($solicitacoes->getData_solicitacao()));?></td>
                            <td>
                                <a href="<?php echo BASE_URL; ?>solicitacoes/gerenciar-solicitacoes/<?php // echo $tecnico->getLogin()?>/" data-tecnico="<?php // echo $tecnico->getLogin()?>" class="showPop">
                                    <?php // echo $tecnico->getNome_tecnico();?>
                                </a>
                                
                            </td>

                            
                            <td>
                                <span class="label label-<?php // echo $label_color;?>">
                                    <?php // echo $status;?>
                                </span>
                            </td>
                        </tr>
                        <?php // endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>
    </div>

</div>    