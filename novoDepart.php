<?php
require_once("BD.php");
include_once("cabecalho.html");

//Inicio para Gravar no banco
try
{
  
$conexao = conn_mysql();
//captura valores do vetor POST
//utf8_encode para manter consistência da codificação utf8 nas páginas e no banco

$departamentos    = utf8_encode(htmlspecialchars($_POST['Depart']));
$gerente          = utf8_encode(htmlspecialchars($_POST['gerente']));        

//criando a instrucao SQL
$SQLInsert = 'INSERT INTO departamentos (NomeDepart, idFunc)
              VALUES (?,?)';

$operacao = $conexao->prepare($SQLInsert);

$inserir = $operacao->execute(array($departamentos, $gerente));
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
			    echo "<p><a href=\"./cadastroDepart.php\">Retornar</a></p>\n";
		}
    }

catch (PDOException $e)
{
    
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
}
include_once("rodape.html");
?>