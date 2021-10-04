<!doctype html>

<!--Incluindo NavBar Global-->
<?php include_once("pages/navbar_global.php");?>

<html lang="pt-br">
    <head>
        <!-- CSS -->
    <link href="style.css" rel="stylesheet"/>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>+Malas</title>
    </head>

    <body class="body-gradient">
        <!-- Container --> 
        <div class="container">
        <br>

        <!-- Lista de produtos -->
        <div class="table-responsive-sm">
        <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Produto</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço (R$)</th>
                <th scope="col">Cadastro (data)</th>
                <th scope="col">Ações</th>
                <th scope="col">
                    <div class="btn-group" role="group" aria-label="Third group">
                        <input type="button" id="btnAtualizarPag" class="btn btn-success" onClick="history.go(0)" value="Atualizar Lista">
                    </div> 
                    <div class="btn-group" role="group" aria-label="Third group">
                        <a href="pages/paginaNovoProduto.php" class="btn btn-primary">Novo Produto</a>
                    </div>  
                </th>
            </tr>
        </thead>    
        <tbody>
        
        <?php
        $timeout = 5;
        $url = "http://localhost/mais_malas/api/produtos.php";
        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        $response = json_decode(curl_exec($ch));

        //Finanalizando a sessão do curl
        curl_close($ch);
        ?>
        
        <?php

        //IF ELSE antes para ver se retornou alguma informação
        if($response != null && $response != ""){
        //Inicio foreach
        foreach($response as $produto){

        ?>
            <tr>
                <th scope="row"><?= $produto->idProduto?></th> 
                <td><?= $produto->nomeProduto?></td>
                <td><?= $produto->descricaoProduto?></td>
                <td><?= $produto->precoProduto?></td>
                <td><?= $produto->dataCadastro?></td>
                <td>
                    <a href="pages/paginaAtualizarProduto.php/?idProduto=<?= $produto->idProduto?>&&nomeProduto=<?= $produto->nomeProduto?>&&descricaoProduto=<?= $produto->descricaoProduto?>&&precoProduto=<?= $produto->precoProduto?>" class="btn btn-primary">ATUALIZAR</a>
                    <a href="pages/paginaRemoverProduto.php/?idProduto=<?= $produto->idProduto?>&&nomeProduto=<?= $produto->nomeProduto?>" class="btn btn-danger">REMOVER</a>
                </td>
            </tr>
        <?php }  //Final do foreach
        
        }else{
            //Alerta caso não encontre nenhum produto
            echo "<div class='alert alert-danger' role='alert'>
                    Nenhum produto localizado!
                </div>";
        }
        
        ?>    
    
        </tbody>    
        </table>
        </div>
        <!-- Final lista de produtos -->
        
        </div> 
        
    <!-- JS -->    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

    </body>    
</html>