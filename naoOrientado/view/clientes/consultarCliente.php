<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "imobiliaria");
 
if ($mysqli->connect_errno){
	echo "Ocorreu um erro na conexão com o banco de dados.";
	exit;
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
    <table width="400px" border="0" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <?php
        $result = $mysqli->query("SELECT * FROM clientes");
        $html = '';
        if($result->num_rows > 0){
            while ($response = $result->fetch_assoc()){
                // die(var_dump($response));
                echo '<tr>';
                echo '  <td>'.$response["id"].'</td>';
                echo '  <td>'.$response["nome"].'</td>';
                echo '  <td>'.$response["email"].'</td>';
                echo '  <td>'.$response["telefone"].'</td>';
                echo '  <td><a href="cadastrarCliente.php?id='.$response["id"].'">Editar</a> <a href="cadastrarCliente.php?id='.$response["id"].'">Excluir</a></td>';
                echo '</tr>';
            }
        }
        // die(var_dump($result));
        // if(!empty($result)){
        //     $html = ''   ;
        //     foreach ($result as $value) {
        //         $html .= "<tr>
        //                     <td>$value['id']</td>
        //                     <td>$value['nome']</td>
        //                     <td>$value['email']</td>
        //                     <td>$value['telefone']</td>
        //                 </tr>";
        //     }
        //     echo $html;
        // }
        ?>
    </table>
  </body>
</html>