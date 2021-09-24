<!DOCTYPE html>

<!-- Incluindo navbar global-->
<?php include_once("navbar_global.php");?>

<html>
    <head>
        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>+Malas - Atualizar</title>
    </head>
    <body>

    <?php 
        //Pegando valores recebidos via GET
        $idProduto = $_GET['idProduto']; 
        $nomeProduto = $_GET['nomeProduto'];
        $descricaoProduto = $_GET['descricaoProduto'];
        $precoProduto = $_GET['precoProduto'];
    ?>
    <!-- Form -->
    <br>
    
    <div class="container">
        <form class="row g-3" id="formProduto" name="formProduto" action="../../produtoController.php" method="POST">
            <input name="input-acao" type="hidden" value="atualizar_produto" />
            <div class="col mb-3">
                <div class="row g-3">
                <label class="form-label">Id Produto :</label>
                </div>
                <div class="row g-3">
                <h2><?= $idProduto; ?></h2>
                <!--Passando id-->
                <input name="idProduto" type="hidden" value="<?= $idProduto; ?>" />
                </div>
            </div>

            <div class="col mb-3">
            <label class="form-label">Produto:</label>
            <input class="form-control" type="text" id="nomeProduto" name="nomeProduto" value="<?=$nomeProduto;?>">
            </div> 

            <div class="col mb-3">
            <label class="form-label">Descrição do Produto</label>
            <input class="form-control" type="text" id="descricaoProduto" name="descricaoProduto" value="<?= $descricaoProduto;?>">
            </div>

            <div classs="col mb-3">
            <label class="form-label">Preço do Produto</label>
            <input class="form-control" type="text" id="precoProduto" name="precoProduto" value="<?= $precoProduto;?>">
            </div>
            
            <br>

            <div class="row g-3">
                <button type="submit" class="btn btn-primary mb-3">Atualizar Informações</button>
                <input type="button" class="btn btn-danger" onClick="history.go(-1)" value="Cancelar e Voltar">
            </div>
        </form>
    </div>
    <!-- Final form -->

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    </body>
</html>