<?php
 include_once("cabecalho.html");
 include_once("menu.php");
 require_once("BD.php");
 ?>


 <div class="row">
    <div class="container">
        <form method="post" action="novoDepart.php" enctype="multipart/form-data" class="form-horizontal" role="form" >
        <fieldset>

          <!-- Form Name -->
          <legend>Cadastro de Departamentos</legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">Departamentos</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
                <input type="text" id="InputDepart" name="Depart" placeholder="Departamento" class="form-control" required autofocus>
            </div>
          </div>
          
      
          <!-- Select Departamentos -->
          <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">Gerente</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
                <select id="gerente" name="gerente" class="input-xlarge">
                    <option value="0">Seleciona o Gerente</option>
                     <?php
                       $conexao   = conn_mysql();
                       $SQLFunc = "SELECT * FROM funcionarios where Gerente='S'";
                       $operacao1 = $conexao ->prepare($SQLFunc);
                       $pesquisar = $operacao1 ->execute();
                       $resultados = $operacao1 ->fetchAll();
                       $conexao = null;
                       
                       if (count($resultados) > 0) {
                           foreach ($resultados as $FuncEncontrado){
                           $idFunc   = $FuncEncontrado['idFunc'];
                           $nomeFunc = utf8_decode($FuncEncontrado['NomeFunc']);
                           $gerente  = $FuncEncontrado['Gerente'];
                          
                        echo "<option value='$idFunc'>$nomeFunc</option>";
                       } 
                       } else {
                        echo "<option>ERRO - Não há funcionários cadastrados</option>";    
                       }
                     ?>
                </select> 
            </div>   
          </div>
          <div class="form-group" style="position: absolute; left: 40%">
        <button type="submit" class="btn btn-primary ">Cadastrar</button>
        <button type="button" class="btn btn-danger" onclick="javascript:window.location.href='./principal.php'">Cancelar</button>
       </div>  
       </fieldset>
      </form>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
<?php
include_once("rodape.html");
?>



    