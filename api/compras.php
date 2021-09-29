<?php

/*
*  POST
*  input-acao: 'cadastrar_compra'
*  url: http://localhost/mais_malas/api/compras.php
*
*  GET
*  url: http://localhost/mais_malas/api/produtos.php
*
*/

//Inclui a conexão com o banco de dados dentro do modulo de produtos.
include_once ("../conexao_bd.php");

//IF ELSE para verificar qual o method request foi solicitado.
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //Recebendo o tipo de ação que deve ser executada.
    $acao = $_POST['input-acao'];
    
    //Dados do formulario de compra para inserir
    $idProduto = $_POST['idProduto'];
    $precoProduto = $_POST['precoProduto'];

    //IF ELSE para verificar se a entrada da ação em vazia ou nula.
    if($acao != null && $acao!= ""){

        //Header para poder retornar o json com resposta da request.
        header('Content-Type: application/json');
        
            //IF ELSE para redirecionar a ação para a queryProduto correta.
            if($acao == 'cadastrar_compra'){
                //Query para inserir um compra na tabela compras do Mysql.
                $queryCompras = "INSERT INTO compras (idProduto,dataCompra,valorCompra) VALUES('$idProduto',NOW(),'$precoProduto');";
            
                //Aqui a response irá receber o que retorna da função mysql_query.
                $response = mysqli_query($conn,$queryCompras);

                //IF ELSE verifica a função mysqli_insert_id e retorna o id inserido.
                if(mysqli_insert_id($conn)){
                    echo "$response";
                    return json_encode($response);
                }else{
                    echo "$response";
                    return json_encode($response);
                }

                //Fechando a conexão com mysqli
                mysqli_close($conn);

            }else{
                //Outra ação aqui
            }
    }else{
        //Ação não encontrada
    }

}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
        //Header para poder retornar o json com resposta da request.
        header('Content-Type: application/json');

        //Query para listar todos as compras da tabela no Mysql.
        $queryCompras = "SELECT * FROM compras;";

        $response = mysqli_query($conn,$queryCompras);
        $data = $response->fetch_all(MYSQLI_ASSOC);
        //Fechando a conexão com mysqli
        mysqli_close($conn);

        //Exibindo os dados retornando
        echo json_encode($data);
    
        //Retornando os compras da tabela.
       return json_encode($data);

        //Fechando a conexão com mysqli
        mysqli_close($conn);
}else{

}
?>