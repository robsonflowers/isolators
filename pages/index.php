<?php 
    include_once(BASE_PATH.'app/classes/Mini.dao.php');
    include_once(BASE_PATH.'app/classes/Usuario.dao.php');
    include_once(BASE_PATH.'app/classes/Node.dao.php');
    
    if(isset($_POST['novoregistro'])){
        $contrato = $_POST['contrato'];
        $node_atendido = $_POST['nodeatendido'];
        $colaborador_instalou = $codColaboradorLogado;
        $mini_inst_emta = (int) $_POST['miniinstemta'];
        $mini_sub_emta = (int) $_POST['minisubemta'];
        $mini_inst_decoder = (int) $_POST['miniinstdecoder'];
        $mini_sub_decoder = (int) $_POST['minisubdecoder'];
        
        MiniDAO::insere($contrato, $node_atendido, $colaborador_instalou, $mini_inst_emta, $mini_sub_emta, $mini_inst_decoder, $mini_sub_decoder);
        
    }
?>
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Adicionar Registro</h3>
        </div>
        <div class="panel-body">
            <div id="atualizando"></div>
            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="novoregistro" value="testesssss">
                <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="contrato">Contrato</label>
                    <div class="input-group">
                        <span class="input-group-addon">693/</span>
                        <input type="number" min="1" id="contrato" name="contrato" class="form-control" placeholder="Contrato" required="">
                    </div>
                </div>
                </div> 
                <div class="col-md-5 col-md-offset-1">
                <div class="form-group">
                    <label class="control-label" for="node">Node</label>
                    <select id="node" name="nodeatendido" class="form-control">
                        <option value="" selected="">Selecione uma opção</option>
                        <?php $node = NodeDAO::retornaTodos();
                              foreach($node as $node):
                        ?>
                        <option value="<?php echo $node->getCod_node();?>"><?php echo $node->getNode();?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                    </div>
                <h4 class="text-info">EMTA</h4>
                <div class="form-group">
                    <label class="control-label col-xs-5" for="miniinstemta">Instalados</label>
                    <div class="col-xs-7">
                        <input type="number" min="0" max="10" class="form-control" id="" name="miniinstemta">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-5" for="minisubemta">Substituídos</label>
                    <div class="col-xs-7">
                        <input type="number" min="0" max="10" class="form-control" id="" name="minisubemta">
                    </div>
                </div>

                <h4 class="text-info">DECODER</h4>
                <div class="form-group">
                    <label class="control-label col-xs-5" for="miniinstdecoder">Instalados</label>
                    <div class="col-xs-7">
                        <input type="number" min="0" max="10" class="form-control" id="" name="miniinstdecoder">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-5" for="node">Substituídos</label>
                    <div class="col-xs-7">
                        <input type="number" min="0" max="10" class="form-control" id="" name="minisubdecoder">
                    </div>
                </div>

                <button type="reset" class="btn btn-warning btn-lg btn-block">Limpar campos</button>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
            </form>
        </div>
    </div>
</div>
