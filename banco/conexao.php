<?php 
function conectar_banco() {

    $servidor   = 'localhost:3307';
    $usuario    = 'root';
    $senha      = '';
    $banco      = 'db_biblioteca';   
    
    $conn = mysqli_connect($servidor, $usuario, $senha, $banco);

    if (!$conn) {
        exit("Erro na conexão: " . mysqli_connect_error());
    }

    return $conn;
}

?>