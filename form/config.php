<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "form";
$porta = 3307;

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname, $porta);

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>
