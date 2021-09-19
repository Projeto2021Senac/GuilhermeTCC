<?php
$msg = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $msg = '<div class ="alert alert-success"> Ação executada com sucesso!</div>';
            break;
        case 'error':
            $msg = '<div class ="alert alert-success"> Ação não executada!</div>';
            break;

    }
}

?>

 <div class="container-fluid">
     
     <?php if($msg != ""){
         echo $msg; 
         echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"5;
        URL='cadRastreio.php'\">" ;
     }
         
      ?>
     <br>
            <div class="row">
                
                <div>
                    <div class="row">

                        <div class="col-4 offset-4 bg-gradient rounded-3" style=" background-color: black;opacity: 90%">
                            <h3 style="color: white; text-align: center"><?=TITLE?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-4 offset-4 bg-gradient rounded-3" style=" background-color: black;opacity: 80%">

                 
                    <form method="post" action="" style="color: white" >
                        
                        <div class="form-group">
                            <label>Código</label>
                            <input type="text" class="form-control" name="idRastreio" readonly placeholder="Número"
                                   value=" <?=$rastreio->idRastreio ?>">
                        </div>

                        <div class="form-group">
                            <label>Data de Envio</label>
                            <input type="date" class="form-control" name="dtEntrega" required="" value="<?=$rastreio->dtEntrega?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Data de Retorno</label>
                            <input type="date" class="form-control" name="dtRetorno" required="" value="<?=$rastreio->dtRetorno?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Observação</label>
                            <input type="text"   class="form-control" name="obs" required="" value="<?=$rastreio->obs?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Valor</label>
                            <input type="text" class="form-control" name="vlrCobrado" required="" value="<?=$rastreio->vlrCobrado?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Consulta</label>
                            <select type="text" class="form-control" name="TFKConsulta" required="" value="<?=$rastreio->TFKConsulta?>">
                                
                                <option value=""></option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Serviço</label>
                            <select type="text" class="form-control" name="TFKServico" required="" value="<?=$rastreio->TFKServico?>">
                                </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Terceirizado</label>
                            <select type="text" class="form-control" name="RFKTerceiro" required="" value="<?=$rastreio->RFKTerceiro?>">
                                </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Serviço Terceirizado</label>
                            <select type="text" class="form-control" name="RFKServico" required="" value="<?=$rastreio->RFKServico?>">
                                </select>
                        </div>
                        

                        <br>

                </div>
                <div>
                    <div class="row">
                        <div class="col-4 offset-4 bg-gradient rounded-3" style=" background-color: black;opacity: 100%">
                            <br>
                            <input type="submit"  name="<?=BTN ?>"
                                   class="btn btn-success btInput p-1 offset-5" value="Enviar"
                                   <?php //if ($btEnviar == TRUE) echo "disabled"; ?>>
                            <br>
                            <br>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>