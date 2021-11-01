 <?php
///Incluindo conexão com banco de dados
include_once ("../conexao_bd.php");

/// No exemplo abaixo estamos recebendo uma imagen salvando em uma pasta dentro do servidor e salvando
/// o nome , diretorio e data do upload em uma tabela  no banco de dados.
 
    if(isset($_FILES['image'])&& isset($_POST['name'])){
        $ext = strtolower(substr($_FILES['image']['name'],-4));/// Pegando a extensão do arquivo
        $nameFile = $_POST['name'];/// Pegando o nome do arquivo informado pelo usuario
        $new_name = $nameFile."_".date("Y.m.d-H.i.s").$ext;//Definindo um novo nome para o arquivo
        $dir = '../uploads/';/// Diretório para uploads
        move_uploaded_file($_FILES['image']['tmp_name'],$dir.$new_name);/// Fazer upload do arquivo
        echo($_FILES['image']['tmp_name']."\n");
        echo($ext);
        
    }

    ///Header para poder retornar o json com resposta da request.
    header('Content-Type: application/json');

    /// Salvando caminho da imagem no banco de dados
    $query_uploads = "INSERT INTO uploads(nome_imagen,diretorio_imagen,data_upload) VALUES('$nameFile','uploads/$new_name',Now());";
    /// Aqui a response irá receber o que retorna da função mysql_query.
    $response = mysqli_query($conn,$query_uploads);

     /// IF ELSE verifica a função mysqli_insert_id e retorna o id inserido.
     if(mysqli_insert_id($conn)){
        echo "$response";
        echo ("Imagen enviada com sucesso!"."\n");
        return json_encode($response);
    }else{
        echo "$response";
        echo ("Falha no upload da imagen!"."\n");
        return json_encode($response);
    }


 ?>