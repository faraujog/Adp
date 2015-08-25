<?php
   //verificar se existe cookie
if (isset($_COOKIE['loginautomatico'])){
    //se existe login automatico chama a pagina para verificar o logon
    header("Location:verificalogin.php");
    } 
    else if (isset ($_COOKIE['loginadp'])) //o ultimo login do usuario
        $nomeUsuario = $_COOKIE['loginadp'];
    else $nomeUsuario = "";

require_once("BD.php");
include_once("cabecalho.html");
?>
<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
      }
      .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
      }
      .form-signin .form-signin-heading, .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin .checkbox {
        font-weight: normal;
      }
      .form-signin .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
      .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
      }
      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
    </style>

   
    <div class="container">
        <form role="form" method="post" action="verificalogin.php" class="form-signin">
        <h3 class="form-signin-heading">Insira seu usu&aacute;rio e senha</h3>
        <input type="text" class="form-control" placeholder="Usuário" name="loginsi" 
               value="<?php echo $nomeUsuario ?>" required autofocus>
        <input type="password" class="form-control" placeholder="Senha" name="senha" required>
        <label class="checkbox"> 
        <input type="checkbox"  name="lembrarLogin" value="loginusuario"> Permanecer conectado                  
        </label>
        <button class="btn btn-block btn-primary btn-lg" type="submit">Entrar</button>
      </form>
    </div>
    <!-- /container -->
     




