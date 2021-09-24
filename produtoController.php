<?php

//IF ELSE para verificar qual o tipo de request
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $input_acao = $_POST['input-acao'];
        if($input_acao == 'cadastrar_produto'){
            salvarProduto();
        }else if($input_acao == 'atualizar_produto'){
            atualizarProduto();
        }else{

        }
   
}else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        //removerProduto();

}else if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $input_acao = $_GET['input-acao'];
    //IF ELSE não deu certo para usar o method delete
    if($input_acao == 'remover_produto'){
        removerProduto();
    }
   
}else if($_SERVER['REQUEST_METHOD'] == 'UPDATE'){

}else{
    
}

//Função para salvar os dados no banco de dados
function salvarProduto(){
    //Dados do formulario
    $nomeProduto = $_POST['nomeProduto'];
    $descricaoProduto = $_POST['descricaoProduto'];
    $precoProduto = $_POST['precoProduto'];
    
    //Variavel auxiliar para setar a ação que deve ser executada na API
    $input_acao = $_POST['input-acao'];

    //Url da API
    $url = "http://localhost/mais_malas/api/produtos.php";
    //Iniciando sessão curl
    $ch = curl_init($url);
    //Atribuindo valores do formulario ao array
    $post_data = array( 'input-acao'=>$input_acao,
                        'nomeProduto'=> $nomeProduto,
                        'descricaoProduto' => $descricaoProduto,
                        'precoProduto' => $precoProduto
    );
    //Setando para não verificar o SSL
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    //Setando para retornar os dados em linhas diferentes e não tudo na mesma string.
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    //Setando o array $post_data
    curl_setopt($ch,CURLOPT_POSTFIELDS,$post_data);

    //Executando curl
    $response = json_decode(curl_exec($ch));

    if($response>=1){
        //echo $response;

        echo "<center>
              <h1>Produto cadastrado com sucesso!</h1>
              <a href='index.php' id='btnVoltarHome'>Voltar para a Home</a>
             </center>";
        //Redirect('index.php');
    }else{
        echo "<center>
              <h1>Produto não cadastrado!</h1>
              <a href='index.php' id='btnVoltarHome'>Voltar para a Home</a>
              <input type='button' id='btnVoltarCadastro' onClick='history.go(-1)'>Voltar para cadastro de produto</a>
             </center>";
    }
    //Finalizando sessão curl
    curl_close($ch);



    
}

//Função para remover os dados do banco de dados.
function removerProduto(){
    //Dados do formulario
    $idProduto = $_GET['idProduto'];

    //Url da API
    $url = "http://localhost/mais_malas/api/produtos.php?idProduto=$idProduto";
   //Iniciando sessão curl
    $ch = curl_init($url);

    //Setando para não verificar o SSL
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    //Setando para retornar os dados em linhas diferentes e não tudo na mesma string.
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    //Setando o para customizar a request
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    $response = json_decode(curl_exec($ch));
    //$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($response[1] != '1'){
        echo "<center>
              <h1>Produto removido com sucesso!</h1>
              <a href='index.php' id='btnVoltarHome'>Voltar para a Home</a>
             </center>";
    }else{
        var_dump($response[1] =='1');
        echo "<center>
              <h1>Produto não removido!</h1>
              <a href='index.php' id='btnVoltarHome'>Voltar para a Home</a>
              <input type='button' id='btnVoltarCadastro' onClick='history.go(-1)'>Voltar para cadastro de produto</a>
             </center>";
    }

    curl_close($ch);


}

//Função para atualizar o produto no banco de dados
function atualizarProduto(){
    //Dados do formulario
    $idProduto = $_POST['idProduto'];
    $nomeProduto = $_POST['nomeProduto'];
    $descricaoProduto = $_POST['descricaoProduto'];
    $precoProduto = $_POST['precoProduto'];
    
    //Variavel auxiliar para setar a ação que deve ser executada na API
    $input_acao = $_POST['input-acao'];

   //Url da API
   $url = "http://localhost/mais_malas/api/produtos.php";
   //Iniciando sessão curl
   $ch = curl_init($url);
   //Atribuindo valores do formulario ao array
   $post_data = array( 'input-acao'=>$input_acao,
                        'idProduto' =>$idProduto,
                       'nomeProduto'=> $nomeProduto,
                       'descricaoProduto' => $descricaoProduto,
                       'precoProduto' => $precoProduto
   );
   //Setando para não verificar o SSL
   curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
   //Setando para retornar os dados em linhas diferentes e não tudo na mesma string.
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
   //Setando o array $post_data
   curl_setopt($ch,CURLOPT_POSTFIELDS,$post_data);

   //Executando curl
   $response = json_decode(curl_exec($ch));
   
   if($response == null){
       echo "<center>
             <h1>Produto atualizado com sucesso!</h1>
             <a href='index.php' id='btnVoltarHome'>Voltar para a Home</a>
            </center>";
   }else{
       //var_dump($response);
       echo "<center>
             <h1>Produto não atualizado!</h1>
             <a href='index.php' id='btnVoltarHome'>Voltar para a Home</a>
             <input type='button' id='btnVoltarCadastro' onClick='history.go(-1)'>Voltar para cadastro de produto</a>
            </center>";
   }
   //Finalizando sessão curl
   curl_close($ch);

}

?>