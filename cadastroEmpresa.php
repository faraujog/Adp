<?php
 include_once("cabecalho.html");
 include_once("menu.php");
 require_once("BD.php");
 ?>
<script src="js/jquery.maskedinput.js" type="text/javascript"></script>

<!--Código para mascara -->
<script type="text/javascript">
$(document).ready(function(){
	$("input.data").mask("99/99/9999");
        $("#InputCNPJ").mask("99.999.999/9999-99");
        $("#inputCep").mask("99.999-999");
        $("#inputTelefone").mask("(999)99999-9999");
});
</script>



<!--Código para popular o select cidades de acordo com a UF -->
<script type="text/javascript">
$(document).ready(function(){
    $("Select[name=estados]").change(function(){
        var idUF = $(this).val();
        
        $("select[name=cidades]").html('<option value="0">Carregando...</option>');
        $.post("cidades.php?id="+idUF,
              {estado:$(this).val()},
              function(valor){
                  $("select[name=cidades]").html(valor);
              }
        )    
    })
    })
</script>

 <div class="row">
    <div class="container">
        <form method="post" action="novaEmpresa.php" enctype="multipart/form-data" class="form-horizontal" role="form" >
        <fieldset>

          <!-- Form Name -->
               
              <legend>Cadastro de Empresas</legend>
              
              
          <!-- Text input-->
          <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">CNPJ</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
                <input type="text" id="InputCNPJ" name="cnpj" placeholder="CNPJ" class="form-control" required autofocus>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label " for="textinput">Razão Social</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
                <input type="text" id="InputRazao" name="razao" placeholder="Razão Social" class="form-control" required autofocus>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">Nome Fantasia</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
                <input type="text" id="InputFantasia" name="fantasia" placeholder="Nome Fantasia" class="form-control" required autofocus>
            </div>
          </div>

        <!-- Text input-->
          <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">Endereço</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
              <input type="text" id="inputEndereco" name="endereco" placeholder="Endereço" class="form-control">
            </div>
          </div>
          
           <!-- Text input-->
          <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">Número</label>
            <div class="col-xs-8 col-sm-7 col-md-1">
              <input type="text" id="inputNumero" name="numero" placeholder="Número" class="form-control">
            </div>
          </div>
           
          <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">Bairro</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
              <input type="text" id="inputBairro" name="bairro" placeholder="Bairro" class="form-control">
            </div>
          </div> 
             
          <!-- Select Estados -->
          <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">Estado</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
                <select id="estados" name="estados" class="input-xlarge">
                    <option value="0">Escolha um Estado</option>
                     <?php
                       $conexao   = conn_mysql();
                       $SQLEstado = 'SELECT * FROM estados';
                       $operacao1 = $conexao ->prepare($SQLEstado);
                       $pesquisar = $operacao1 ->execute();
                       $resultados = $operacao1 ->fetchAll();
                       $conexao = null;
                       
                       if (count($resultados) > 0) {
                           foreach ($resultados as $UFencontradas){
                           $idUF = $UFencontradas['idEstado'];
                           $nomeUF = utf8_encode($UFencontradas['nomeEstado']);
                           echo "<option value='$idUF'>$nomeUF</option>";
                           } 
                       } else {
                        echo "<option>ERRO - Não foi possível carregar os estados</option>";    
                       }
                     ?>
                </select>   
            </div>
          </div>
          
          <div class="form-group">
	  <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="cidade">Cidade</label>
          <div class="col-xs-8 col-sm-7 col-md-5">
          <select id="cidades" name="cidades" class="input-xlarge"> 
                  <option>Escolha um estado</option>
                  </select>
                  </div>
          </div>

         <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">CEP</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
              <input type="text" id="inputCep" name="cep" placeholder="CEP" class="form-control">
            </div>
          </div>

        <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">Telefone</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
              <input type="text" id="inputTelefone" name="telefone" placeholder="Telefone" class="form-control">
            </div>
          </div>

         <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">E-mail</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
              <input type="text" id="inputEmail" name="email" placeholder="E-mail" class="form-control">
            </div>
          </div>
         <div class="form-group">
            <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="textinput">Web Site</label>
            <div class="col-xs-8 col-sm-7 col-md-5">
              <input type="text" id="inputSite" name="site" placeholder="WEB Site da Empresa" class="form-control">
            </div>
          </div>

       <div class="form-group">
           <input type="hidden" name="MAX_FILE_SIZE" value="500000">
           <label class="col-xs-2 col-sm-2 col-md-3 control-label" for="filename">Logomarca da Empresa</label>
           <div class="col-xs-8 col-sm-7 col-md-5">
               <input type="file" name="filename" id="filename" placeholder="Selecione o arquivo">
           </div>
    
        </div>
       
          <div class="form-group" style="position: absolute; left: 40%;" >
        <button type="submit" class="btn btn-primary  ">Cadastrar</button>
        <button type="button" class="btn btn-danger " onclick="javascript:window.location.href='./principal.php'">Cancelar</button>
       </div>  
      
        </fieldset>
      </form>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

         
        
    <?php
include_once("rodape.html");
?>



    