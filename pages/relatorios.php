

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