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
                        <button class="btn btn-primary btn-lg btn-block" type="button">
                            <strong>INSTALADOS</strong> <span class="badge"><?php echo $inst_emta;?></span>
                        </button>
                        <button class="btn btn-primary btn-lg btn-block" type="button">
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
                        <button class="btn btn-primary btn-lg btn-block" type="button">
                            <strong>INSTALADOS</strong> <span class="badge"><?php echo $inst_decoder;?></span>
                        </button>
                        <button class="btn btn-primary btn-lg btn-block" type="button">
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

<?php $somaTotal = MiniDAO::totalDescPorTecnico();?>
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Total de mini isolators - por técnico</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-condensed text-center" >
                        <thead>
                            <tr>
                                <th class="text-center">Colaborador</th>
                                <th class="text-center">Total (inst+subst)</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($somaTotal as $somaTotal):?>
                        <tr>
                            <td class="text-left">
                            <?php echo $somaTotal['colaborador_instalou'];?>
                            </td>
                            <td>
                            <?php echo $somaTotal['total'];?>    
                            </td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>
    </div>
</div>

<?php $somaTotalNode = MiniDAO::totalDescPorNode();?>
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Total de mini isolators - por Node</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-condensed text-center" >
                        <thead>
                            <tr>
                                <th class="text-center">Node</th>
                                <th class="text-center">Total (inst+subst)</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($somaTotalNode as $somaTotalNode):?>
                        <tr>
                            <td>
                            <?php echo $somaTotalNode['node'];?>
                            </td>
                            <td>
                            <?php echo $somaTotalNode['total'];?>    
                            </td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>
    </div>
</div>    