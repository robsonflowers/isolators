<?php 
include_once(BASE_PATH.'app/classes/Mini.dao.php');
include_once(BASE_PATH.'app/classes/Usuario.dao.php');
//include_once(BASE_PATH.'app/classes/Node.dao.php');
$cod_colaborador = $codColaboradorLogado;
$consultaContrato = MiniDAO::retornaRegistrosDoDia($cod_colaborador);
$todosContratosPorTecnico = MiniDAO::retornaRegistrosColaborador($cod_colaborador);

if(isset($_POST['editaregistro'])){
        $registro = $_GET['registrocontrato'];
        $contrato = $_POST['contrato'];
        $node_atendido = $_POST['nodeatendido'];
        $mini_inst_emta = (int) $_POST['miniinstemta'];
        $mini_sub_emta = (int) $_POST['minisubemta'];
        $mini_inst_decoder = (int) $_POST['miniinstdecoder'];
        $mini_sub_decoder = (int) $_POST['minisubdecoder'];
        
        MiniDAO::atualiza($registro, $contrato, $node_atendido, $mini_inst_emta, $mini_sub_emta, $mini_inst_decoder, $mini_sub_decoder);
        
    }
?>
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="row">
        <?php if(isset($_GET['registrocontrato'])):?>
        <?php 
        include_once(BASE_PATH.'app/classes/Mini.dao.php');
        include_once(BASE_PATH.'app/classes/Node.dao.php');
        $registro = $_GET['registrocontrato'];
        $colaborador = $codColaboradorLogado;
        $registro = MiniDAO::retornaRegistro($registro, $colaborador);
        ?>
        <?php if($registro):?>
        <div class="panel panel-default" id="lista-contratos">
            <div class="panel-body">
                <a class="btn btn-default" href="<?php echo BASE_URL;?>contratos/"><span aria-hidden="true">&larr;</span> Voltar</a>
                <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Deletar</button>
                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="editaregistro" value="">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="contrato">Contrato</label>
                            <div class="input-group">
                                <span class="input-group-addon">693/</span>
                                <input type="number" min="1" id="contrato" name="contrato" class="form-control" placeholder="Contrato" required="" value="<?php echo $registro->getContrato();?>">
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-5 col-md-offset-1">
                        <div class="form-group">
                            <label class="control-label" for="node">Node</label>
                            <select id="node" name="nodeatendido" class="form-control">
                                <option value="" selected="">Selecione uma opção</option>
                                <?php 
                                    $node = NodeDAO::retornaTodos();
                                    foreach($node as $node):
                                ?>
                                <?php $selected = ($registro->getNode_atendido()==$node->getCod_node()) ? "selected":"";?>
                                <option value="<?php echo $node->getCod_node();?>" <?php echo $selected;?>><?php echo $node->getNode();?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <h4 class="text-info">EMTA</h4>
                    <div class="form-group">
                        <label class="control-label col-xs-5" for="miniinstemta">Instalados</label>
                        <div class="col-xs-7">
                            <input type="number" min="0" max="10" class="form-control" name="miniinstemta" value="<?php echo $registro->getMini_inst_emta();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-5" for="minisubemta">Substituídos</label>
                        <div class="col-xs-7">
                            <input type="number" min="0" max="10" class="form-control" name="minisubemta" value="<?php echo $registro->getMini_sub_emta();?>">
                        </div>
                    </div>

                    <h4 class="text-info">DECODER</h4>
                    <div class="form-group">
                        <label class="control-label col-xs-5" for="miniinstdecoder">Instalados</label>
                        <div class="col-xs-7">
                            <input type="number" min="0" max="10" class="form-control" name="miniinstdecoder" value="<?php echo $registro->getMini_inst_decoder();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-5" for="node">Substituídos</label>
                        <div class="col-xs-7">
                            <input type="number" min="0" max="10" class="form-control" name="minisubdecoder" value="<?php echo $registro->getMini_sub_decoder();?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Salvar alterações</button>
                </form>
            </div>    
        </div>
        <?php else:?>
        <div class="jumbotron">
            <h1>Nops!</h1>
            <p>O registro informado ou não consta no sistema</p>
            <p>ou não foi registrado por você</p>
            <a class="btn btn-default" href="<?php echo BASE_URL;?>contratos/"><span aria-hidden="true">&larr;</span> Voltar</a>
        </div>
        <?php endif;?>
        
        <?php else:?>
        <div class="panel panel-default" id="lista-contratos">
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-pills" role="tablist">
                  <li role="presentation" class="active"><a href="#contratos-hoje" aria-controls="contratos-hoje" role="tab" data-toggle="tab">Contratos de hoje</a></li>
                  <li role="presentation"><a href="#todos-contratos" aria-controls="todos-contratos" role="tab" data-toggle="tab">Todos os contratos</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Aba com todos os técnicos -->
                    <div role="tabpanel" class="tab-pane active" id="contratos-hoje">
                        <div class="table-responsive">
                            <?php if($consultaContrato):?>
                            <table class="table table-condensed table-striped" id="tabela-contratos-hoje">
                                <thead>
                                    <tr>
                                        <th>Contrato</th>
                                        <th>Node</th>
                                        <th>Inst</th>
                                        <th>Subst</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($consultaContrato as $contrato):?>
                                    <tr class="seleciona-contrato">
                                        <td class=""><a href="<?php echo $contrato->getCod_mini();?>"><?php echo $contrato->getContrato()?></a></td>
                                        <td class="">Node <?php echo $contrato->getNode_atendido();?></td>
                                        <?php 
                                            $totalInst = $contrato->getMini_inst_decoder()+$contrato->getMini_inst_emta();
                                            $totalSub = $contrato->getMini_sub_decoder()+$contrato->getMini_sub_emta();
                                        ?>
                                        <td class="">
                                            <?php echo $totalInst;?>
                                        </td>
                                        <td class="">
                                            <?php echo $totalSub;?>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                            <?php else:?>
                            <div class="jumbotron">
                                <h1>:(</h1>
                                <p>Parece que você não registrou nenhum contrato hoje</p>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="todos-contratos">
                        <div class="table-responsive">
                            <?php if($todosContratosPorTecnico):?>
                            <table class="table table-condensed table-striped" id="tabela-todos-contratos">
                                <thead>
                                    <tr>
                                        <th>Contrato</th>
                                        <th>Node</th>
                                        <th>Inst</th>
                                        <th>Subst</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($todosContratosPorTecnico as $contrato):?>
                                    <tr class="seleciona-contrato">
                                        <td class=""><?php echo $contrato->getContrato()?></a></td>
                                        <td class=""><?php echo $contrato->getNode_atendido();?></td>
                                        <?php 
                                            $totalInst = $contrato->getMini_inst_decoder()+$contrato->getMini_inst_emta();
                                            $totalSub = $contrato->getMini_sub_decoder()+$contrato->getMini_sub_emta();
                                        ?>
                                        <td class="">
                                            <?php echo $totalInst;?>
                                        </td>
                                        <td class="">
                                            <?php echo $totalSub;?>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                            <?php else:?>
                            <div class="jumbotron">
                                <h1>:(</h1>
                                <p>Parece que você não registrou nenhum contrato ainda</p>
                                <p>Bora lá</p>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>
