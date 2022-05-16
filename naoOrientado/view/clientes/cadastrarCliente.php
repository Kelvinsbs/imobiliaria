<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "imobiliaria");
 
if ($mysqli->connect_errno){
	echo "Ocorreu um erro na conexão com o banco de dados.";
	exit;
}

$id = $_GET['id'];
if(!empty($id)){
  $result = $mysqli->query("SELECT * FROM clientes WHERE id = '$id'");
  $response = $result->fetch_assoc();
  // die(var_dump($response));
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

    <form action="../../controller/clienteController.php" method="post">
      <div class="form-group">
        <input type="hidden" class="form-control" id="hdId" name="hdId" value="<?= (isset($response['id'])) ? $response['id'] : '' ?>" placeholder="joão da silva">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?= (isset($response['nome'])) ? $response['nome'] : '' ?>" placeholder="joão da silva">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= (isset($response['email'])) ? $response['email'] : '' ?>" placeholder="name@example.com">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">telefone</label>
        <input type="text" class="form-control" id="telefone" name="telefone" value="<?= (isset($response['telefone'])) ? $response['telefone'] : '' ?>" placeholder="(00) 00000-0000">
      </div>
      <?php
      if(!empty($id)){
      ?>
        <button type="submit" class="btn btn-primary">Editar</button>
      <?php
      }else{
      ?>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      <?php
      }
      ?>
    </form>
  </body>
</html>