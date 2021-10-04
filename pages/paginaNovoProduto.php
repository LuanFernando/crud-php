<!DOCTYPE html>

<!--Incluindo navbar global-->
<?php include_once("navbar_global.php");?>

<html>
    <head>
        <!-- CSS -->
        <link href="../style.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>+Malas - Novo Produto</title>
    </head>
    <body>

        <br>
        <!-- Form Produtos-->
        <div class="container">
            <form class="row g-3" action="../produtoController.php" method="POST">
            <input name="input-acao" type="hidden" value="cadastrar_produto" />
            <div class="col mb-3">
               <label class="form-label">Nome do Produto</label>
               <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" placeholder="Nome do produto" require>
           </div>

           <div class="col mb-3">
               <label class="form-label">Descrição do Produto</label>
               <input type="text" class="form-control" id="descricaoProduto" name="descricaoProduto" placeholder="Descrição do produto" require>
           </div>

           <div class="col mb-3">
               <label class="form-label">Preço do Produto</label>
               <input type="text" class="form-control" id="precoProduto" name="precoProduto" placeholder="Preço do produto" require>
           </div>

           <!--Buttons-->
           <div class="row">
                <button type="submit" class="btn btn-primary mb-3">Salvar Informações</button>
                <input type="button" class="btn btn-danger" onClick="history.go(-1)" value="Cancelar e Voltar">
            </div>
            <!---->
            
            </form>
        </div>    
        <!-- Final form -->

        <!--TO DO : Criar form de cadastro e salvar os dados-->
        <!-- JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

    </body>
</html>