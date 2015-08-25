<?php
require_once("BD.php");
include_once("cabecalho.html");

//Inicio para Gravar no banco
try
{
  
$conexao = conn_mysql();
//captura valores do vetor POST
//utf8_encode para manter consistência da codificação utf8 nas páginas e no banco

$Nome          = utf8_encode(htmlspecialchars($_POST['NomeCompleto']));
$departamentos = utf8_encode(htmlspecialchars($_POST['departamentos']));
$gerente       = utf8_encode(htmlspecialchars($_POST['gerente']));        
$adm           = utf8_encode(htmlspecialchars($_POST['administrador']));
$email         = utf8_encode(htmlspecialchars($_POST['email']));
$login         = utf8_encode(htmlspecialchars($_POST['login']));
$senha         = utf8_encode(htmlspecialchars($_POST['senhaFunc']));
$confSenha     = utf8_encode(htmlspecialchars($_POST['senhaFuncConf']));
//compara as senhas
if (($senha != $confSenha) || (strlen($senha)<4)|| (strlen($confSenha)>8)){
    echo("Dados inválidos com a senha."); //tentar colocar um erro melhor
    die();
}
//criando a instrucao SQL
$SQLInsert = 'INSERT INTO funcionarios (login, senha, NomeFunc, idDepart, Gerente, Administrador,Email)
              VALUES (?,MD5(?),?,?,?,?,?)';

$operacao = $conexao->prepare($SQLInsert);

$inserir = $operacao->execute(array($login, $senha, $Nome, $departamentos, $gerente, $adm, $email));
$conexao = null;

		if ($inserir){
			 echo "<h1>Cadastro efetuado com sucesso.</h1>\n";
			 echo "<p class=\"lead\"><a href=\"./index.php\">Página principal</a></p>\n";
		}
		else {
			echo "<h1>Erro na operação.</h1>\n";
				$arr = $operacao->errorInfo();		
				$erro = utf8_decode($arr[2]);
				echo "<p>$erro</p>";							
			    echo "<p><a href=\"./cadastroFunc.php\">Retornar</a></p>\n";
		}
    }

catch (PDOException $e)
{
    
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
}
include_once("rodape.html");
?>