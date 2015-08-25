<?php
 include_once("cabecalho.html");
 include_once("menu.php");
 require_once("BD.php");
 ?>

<div class="row">
    <div class="container">
        <form method="post" action="novoFunc.php" enctype="multipart/form-data" class="form-horizontal" role="form" >
        <fieldset>

          <!-- Form Name -->
          <legend>Cadastro de Funcionários</legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">Nome Completo</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
                <input type="text" id="InputNome" name="NomeCompleto" placeholder="Nome Completo" class="form-control" required autofocus>
            </div>
          </div>
          
      
          <!-- Select Departamentos -->
          <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">Departamentos</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
                <select id="estados" name="departamentos" class="input-xlarge">
                    <option value="0">Seleciona o departamento</option>
                     <?php
                       $conexao   = conn_mysql();
                       $SQLDepart = 'SELECT * FROM departamentos';
                       $operacao1 = $conexao ->prepare($SQLDepart);
                       $pesquisar = $operacao1 ->execute();
                       $resultados = $operacao1 ->fetchAll();
                       $conexao = null;
                       
                       if (count($resultados) > 0) {
                           foreach ($resultados as $DepartEncontrado){
                           $idDep   = $DepartEncontrado['idDepart'];
                           $nomeDep = utf8_decode($DepartEncontrado['NomeDepart']);
                           echo "<option value='$idDep'>$nomeDep</option>";
                           } 
                       } else {
                        echo "<option>ERRO - Não há departamentos cadastrados</option>";    
                       }
                     ?>
                </select>   
            </div>
          </div>
          
          <!-- Select Gerente -->
          <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">É Gerente?</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
                <select id="gerente" name="gerente" class="input-xlarge">
                    <option value="N">Não</option>
                    <option value="S">Sim</option> 
                </select>   
            </div>
          </div> 
          
          <!-- Select Adm -->
          <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">É Administrador?</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
                <select id="idadm" name="administrador" class="input-xlarge">
                    <option value="N">Não</option>
                    <option value="S">Sim</option> 
                </select>   
            </div>
          </div> 
          
         <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">E-mail</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
                <input type="text" id="inputEmail" name="email" placeholder="E-mail" class="form-control" required autofocus>
            </div>
          </div> 
          
            <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">Login</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
                <input type="text" id="inputLogin" name="login" placeholder="Escolha um login" class="form-control" required autofocus>
            </div>
          </div>

        <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">Senha</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
                <input type="password" id="inputSenha" name="senhaFunc" placeholder="Senha (4 a 8 caracteres)" class="form-control" required autofocus >
            </div>
          </div>

        <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">Confirmar Senha</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
                <input type="password" id="inputSenhaConf" name="senhaFuncConf" placeholder="Repita a Senha" class="form-control" required autofocus>
            </div>
          </div>     
  

       
    <div class="form-group" style="position: absolute; left: 40%;">
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



    