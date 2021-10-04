<!DOCTYPE html>
<?php
    include_once("navbar_global.php");
?>
<html>
    <head>
        <!-- CSS -->
        <link href="../../style.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>+Malas - Remover Produto</title>
    </head>  
    <body>
    <br>
    <?php
        $nomeProduto = $_GET['nomeProduto'];
        $idProduto = $_GET['idProduto'];
    ?>
    <center>
        <h1>Realmente deseja remover <?= $nomeProduto;?>?</h1>
        <br>
        <br>
        <div class="container">
            <form class="row g-3" id="formProduto" name="formProduto" action="../../produtoController.php">
            <input name="input-acao" type="hidden" value="remover_produto" />
            <div class="row g-3">
                <label id="idProduto" name="idProduto" value="<?=$idProduto?>">ID REFERÊNCIA <?=$idProduto?></label>
                <!--Input oculto apenas para passar o valor de id-->
                <input name="idProduto" type="hidden" value="<?=$idProduto?>" />
                <button type="submit" class="btn btn-danger mb-3">Remover Produto</button>

                <input type="button" class="btn btn-secondary" onClick="history.go(-1)" value="Cancelar e Voltar">
            </div>
            </form>
    </div>
    </center>
    

     <!-- JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    </body>    
</html>