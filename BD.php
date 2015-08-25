<?php

function conn_mysql(){
    $servidor = 'localhost';
    $porta    = 3306;
    $banco    = 'adp';
    $usuario  = 'root';
    $senha    = '159753';
    
         $conn = new PDO("mysql:host=$servidor; 
                          port=$porta; 
                          dbname=$banco", 
                          $usuario, 
                          $senha, 
                          array(PDO::ATTR_PERSISTENT => true)
                          );
 return $conn;
  
}

?>

