<?php
/// Incluindo conexão com banco de dados 
include_once("../conexao_bd.php");


if($_SERVER['REQUEST_METHOD'] == 'GET'){
/// Header para poder retornar o json com resposta da request.
header('Content-Type: application/json');

/// Query 
$query_image = "SELECT * FROM uploads";

$response = mysqli_query($conn,$query_image);
$data = $response->fetch_all(MYSQLI_ASSOC);
mysqli_close($conn);

echo json_encode($data);

/// Retornando os dados encontrados
return json_encode($data);
}


?>