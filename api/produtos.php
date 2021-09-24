<?php

/*
*  POST
*  input-acao: 'cadastrar_produto'
*  url: http://localhost/mais_malas/api/produtos.php
*
*  GET
*  url: http://localhost/mais_malas/api/produtos.php
*
*  POST
*  input-acao: 'atualizar_produto'
*  url: http://localhost/mais_malas/api/produtos.php
*
*  DELETE
*  url: http://localhost/mais_malas/api/produtos.php?idProduto=5
*/

//Inclui a conexão com o banco de dados dentro do modulo de produtos.
include_once ("../conexao_bd.php");

//Variavel auxiliar
$queryProduto = "";


// IF ELSE para verificar qual verbo http foi solicitado.
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //Recebendo o tipo de ação que deve ser executada.
    $acao = $_POST['input-acao'];
    
    //Dados do formulario de produtos para inserir
    $nomeProduto = $_POST['nomeProduto'];
    $descricaoProduto = $_POST['descricaoProduto'];
    $precoProduto = $_POST['precoProduto'];
    
    //IF ELSE para verificar se a entrada da ação em vazia ou nula.
    if($acao != null && $acao!= ""){

        //Header para poder retornar o json com resposta da request.
        header('Content-Type: application/json');
        
        //IF ELSE para redirecionar a ação para a queryProduto correta.
        if($acao == 'cadastrar_produto'){
            //Query para inserir um produto na tabela produtos do Mysql.
            $queryProduto = "INSERT INTO produtos (nomeProduto,descricaoProduto,precoProduto,dataCadastro,dataAtualizacao) VALUES('$nomeProduto','$descricaoProduto','$precoProduto',NOW(),NOW());";
           
            //Aqui a response irá receber o que retorna da função mysql_query.
            $response = mysqli_query($conn,$queryProduto);

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

        }else if($acao == 'atualizar_produto'){

            //Dados do formulario de produtos atualizar
            $idProduto =  $_POST['idProduto'];
            $nomeProduto = $_POST['nomeProduto'];
            $descricaoProduto = $_POST['descricaoProduto'];
            $precoProduto = $_POST['precoProduto'];

             //Header para poder retornar o json com resposta da request.
            header('Content-Type: application/json');

            //Query para atualizar as informações de um produto.
            $queryProduto = "UPDATE produtos SET nomeProduto ='$nomeProduto',descricaoProduto='$descricaoProduto',precoProduto='$precoProduto',dataAtualizacao=NOW() WHERE idProduto='$idProduto';" ;
            
            //Variavel auxiliar
            $msg_error;
            
            //IF ELSE caso não for bem sucedido a atualização retorna msg_error = 1
            if(mysqli_query($conn,$queryProduto)){
                $msg_error  = ['error','0'];
                //echo "$msg_error";
                return json_encode($msg_error);
            }else{
                $msg_error  = ['error','1'];
                //echo "$msg_error";
                return json_encode($msg_error);
            }
            //Fechando a conexão com mysqli
            mysqli_close($conn);

        }else{
        
        }

        //Fechando a conexão com mysqli
        mysqli_close($conn);

    }else{
        //Caso a ação informada seja invalida irá cair neste Else e retornar uma mensagem de erro.
        $msg_error = ['error','Atenção ação informada é invalida!'];
            echo "$msg_error";
            return json_encode($msg_error);
    }

}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
   
            //Header para poder retornar o json com resposta da request.
            header('Content-Type: application/json');

            //Query para listar todos os produtos da tabela no Mysql.
            $queryProduto = "SELECT * FROM produtos;";

            $response = mysqli_query($conn,$queryProduto);
            $data = $response->fetch_all(MYSQLI_ASSOC);
            //Fechando a conexão com mysqli
            mysqli_close($conn);

            //Exibindo os dados retornando
            echo json_encode($data);
    
            //Retornando os produtos da tabela.
            return json_encode($data);

        //Fechando a conexão com mysqli
        mysqli_close($conn);

}else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    
        //Id de identificação
        $idProduto =  $_GET['idProduto'];
        
        //Header para poder retornar o json com resposta da request.
        header('Content-Type: application/json');
        
        //Query para remover um produto da tabela de produtos.
        $queryProduto = "DELETE FROM produtos WHERE idProduto='$idProduto';";
        
        //Variavel auxiliar
        $msg_error;

        if(mysqli_query($conn,$queryProduto)){
            $msg_error = ['error','0'];

            echo json_encode($msg_error);
            return json_encode(msg_error);
        }else{
            $msg_error = ['error','1'];

            echo json_encode($msg_error);
            return json_encode($msg_error);
        }

    //Fechando a conexão com mysqli
    mysqli_close($conn);
    
}else{
    echo "REQUEST METHOD INVALIDO! ";
}

?>