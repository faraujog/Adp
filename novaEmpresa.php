<?php
require_once("BD.php");
include_once("cabecalho.html");
//-------------- inicio do upload da logomarca -----------------

$permissoes = array ("gif","jpeg", "jpg", "png", "image/gif", "image/jpeg", 
                     "image/jpg", "image/png");
$temp = explode(".", basename($_FILES["filename"]["name"]));
echo "Caminho da Variável";
var_dump($temp);
var_dump($_FILES);
$extensao = end($temp);

if ((in_array($extensao, $permissoes))
&& (in_array($_FILES["filename"]["type"], $permissoes))
&& ($_FILES["filename"]["size"] < $_POST["MAX_FILE_SIZE"]))
  {
  if ($_FILES["filename"]["error"] > 0)
    {
    echo "<h1>Erro no envio, código: " . $_FILES["filename"]["error"] . "</h1>";
    }
  else
    {
	  $dirUploads = "uploads/";
      $logocnpj = $_POST["cnpj"]."/";	  
	  
	  if(!file_exists ( $dirUploads ))
			mkdir($dirUploads, 0500);  
	  
	  $caminhoUpload = $dirUploads.$logocnpj;
	  if(!file_exists ( $caminhoUpload ))
			mkdir($caminhoUpload, 0700); 
			
	  $pathCompleto = $caminhoUpload.basename($_FILES["filename"]["name"]);
      if(move_uploaded_file($_FILES["filename"]["tmp_name"], $pathCompleto))
          $sucesso = "Logo armazenado com sucesso";
      else
		echo "<h1>Problemas ao armazenar o arquivo. Tente novamente.<h1>";
    }
  }
else
  {
  echo "<h1>Arquivo inválido<h1>";
  }

//-------------- Fim do Upload da logomarca --------------------
  
//Inicio para Gravar no banco
try
{
  
$conexao = conn_mysql();
//captura valores do vetor POST
//utf8_encode para manter consistência da codificação utf8 nas páginas e no banco

$CNPJ      = utf8_encode(htmlspecialchars($_POST['cnpj']));
$razao      = utf8_encode(htmlspecialchars($_POST['razao']));
$fantasia   = utf8_encode(htmlspecialchars($_POST['fantasia']));        
$endereco   = utf8_encode(htmlspecialchars($_POST['endereco']));
$numero     = utf8_encode(htmlspecialchars($_POST['numero']));
$bairro     = utf8_encode(htmlspecialchars($_POST['bairro']));
$estados    = utf8_encode(htmlspecialchars($_POST['estados']));
$cidades    = utf8_encode(htmlspecialchars($_POST['cidades']));
$cep        = utf8_encode(htmlspecialchars($_POST['cep']));        
$telefone   = utf8_encode(htmlspecialchars($_POST['telefone']));
$email      = utf8_encode(htmlspecialchars($_POST['email']));
$site       = utf8_encode(htmlspecialchars($_POST['site']));
$arqlogo    = $pathCompleto;

//criando a instrucao SQL
$SQLInsert = 'INSERT INTO empresa (CNPJ, Razao, Fantasia, Endereco, Numero, Bairro, Cidade, Estado, CEP, Telefone, Email, Site, ArquivoLogo)
              VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';
$operacao = $conexao->prepare($SQLInsert);

$inserir = $operacao->execute(array($CNPJ, $razao, $fantasia, $endereco, $numero, $bairro, $cidades, $estados, $cep, $telefone, $email, $site, $arqlogo));
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
			    echo "<p><a href=\"./cadastroEmpresa.php\">Retornar</a></p>\n";
		}
    }

catch (PDOException $e)
{
    
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
}
include_once("rodape.html");
?>