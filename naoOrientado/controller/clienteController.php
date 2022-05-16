<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "imobiliaria");
 
if ($mysqli->connect_errno){
	echo "Ocorreu um erro na conexão com o banco de dados.";
	exit;
}
 
// mysqli_set_charset($mysqli, 'utf8');

// die(var_dump($_POST));

if(!isset($_POST["hdId"])){
    if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["telefone"])){
        if(empty($_POST["nome"])){
            // $response['status'] = 0;
            $erro = "Campo nome obrigatório";
            echo json_encode($response);
            return false;
        }
        if(empty($_POST["email"])){
            // $response['status'] = 0;
            $erro = "Campo e-mail obrigatório";
            echo json_encode($response);
            return false;
        }
        if(empty($_POST["telefone"])){
            // $response['status'] = 0;
            $erro = "Campo telefone obrigatório";
            echo json_encode($response);
            return false;
        }
    
        $nome   = $_POST["nome"];
        $email  = $_POST["email"];
        $telefone = $_POST["telefone"];
        
        $sql = "INSERT INTO clientes (id, nome,email,telefone) VALUES ('0', '$nome', '$email', '$telefone')";
    
        $inserted = mysqli_query($mysqli, $sql);
        
        if(!$inserted){
            // $response['status'] = 0;
            $erro = "ocorreu um erro ao inserir os dados";
            // $response['erro'] = $stmt->error;
        }else{
            // $response['status'] = 1;
            $sucesso = "Dados cadastrados com sucesso!";
        }
    
    }else{
        // $response['status'] = 0;
        $erro = "Por favor, preencha os campos obrigatórios";
    }
}else{
    if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["telefone"])){
        if(empty($_POST["nome"])){
            // $response['status'] = 0;
            $erro = "Campo nome obrigatório";
            echo json_encode($response);
            return false;
        }
        if(empty($_POST["email"])){
            // $response['status'] = 0;
            $erro = "Campo e-mail obrigatório";
            echo json_encode($response);
            return false;
        }
        if(empty($_POST["telefone"])){
            // $response['status'] = 0;
            $erro = "Campo telefone obrigatório";
            echo json_encode($response);
            return false;
        }
    
        $id   = $_POST["hdId"];
        $nome   = $_POST["nome"];
        $email  = $_POST["email"];
        $telefone = $_POST["telefone"];
        
        $sql = "UPDATE clientes SET nome = '$nome', email = '$email', telefone = '$telefone' WHERE id = $id";
    
        $updated = mysqli_query($mysqli, $sql);
        
        if(!$updated){
            // $response['status'] = 0;
            $erro = "ocorreu um erro ao alterar os dados";
            // $response['erro'] = $stmt->error;
        }else{
            // $response['status'] = 1;
            $sucesso = "Dados Alterados com sucesso!";
        }
    
    }else{
        // $response['status'] = 0;
        $erro = "Por favor, preencha os campos obrigatórios";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Locatario</title>
  </head>
  <body>
    <?php
    if(isset($erro)){
        echo '<div style="color:#F00">'.$erro.'</div><br/><br/>';
    }elseif(isset($sucesso)){
        echo '<div style="color:#00f">'.$sucesso.'</div><br/><br/>';
    }
    ?>
  </body>
</html>