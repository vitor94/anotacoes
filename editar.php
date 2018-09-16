<?php
require 'conexao/db.php';
$id = 0;
if(isset($_GET['id']) && empty($_GET['id']) == false){
    $id = addslashes($_GET['id']);
}
if(isset($_POST['nome']) && empty($_POST['nome']) == false){
    $data = date('d/m/Y', strtotime($_POST['data']));
    $dia = addslashes($_POST['dia']);
    $nome = addslashes($_POST['nome']);
    $valor = addslashes($_POST['valor']);
    $copias = addslashes($_POST['copias']);

    $sql = "UPDATE anotacoesprof SET data = '$data', dia = '$dia', nome = '$nome', valor = '$valor', copias = '$copias', WHERE id = '$id'";
    $pdo->query($sql);

    header("Location: index.php");
}

    $sql = "SELECT * FROM anotacoesprof WHERE id = '$id'";
    $sql = $pdo->query($sql);
    if($sql->rowCount() > 0){
        $dado = $sql->fetch();
    }else{
        header("Location: index.php");
    
}
?>  
    
      <form class=" row-fluid" method= "POST">

                                        <div class="control-group">
											<label class="control-label" for="basicinput">Data</label>
											<div class="controls">
												<input type="text" name = "data" id="basicinput" placeholder="Nome" class="span8" autocomplete="off" require value = "<?php echo $dado['data']; ?>">
											</div>
                                        </div>
                                        <div class="control-group">
											<label class="control-label" for="basicinput"></label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." name = "dia" class="span8">
													<option value="">Selecionar</option>
													<option value="Manhã">Manhã</option>
													<option value="Noite">Noite</option>
												</select>
											</div>
										</div>



										<div class="control-group">
											<label class="control-label" for="basicinput">Nome</label>
											<div class="controls">
												<input type="text" name = "nome" id="basicinput" placeholder="Nome" class="span8" autocomplete="off" require value = "<?php echo $dado['nome']; ?>">
											</div>
                                        </div>
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Valor R$</label>
											<div class="controls">
												<input type="text" name = "valor" onKeyUp="mascaraMoeda(this, event)" id="basicinput" placeholder="Valor" class="span4" autocomplete="off" require value = "<?php echo $dado['valor']; ?>">
                                            </div>
                                            <div class="control-group">
											<label class="control-label" for="basicinput">Total de copias</label>
											<div class="controls">
												<input type="text" name="copias" id="basicinput" placeholder="Copias" class="span8" autocomplete="off" require value = "<?php echo $dado['nome']; ?>">
											</div> 
										</div>
                                        
                                       
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
     