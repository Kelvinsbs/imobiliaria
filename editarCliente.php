<?php

    include __DIR__.'/vendor/autoload.php';

    define('TITLE', 'Editar Cliente');

    use \App\entity\Cliente;

    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
        header('location: index.php?status=error');
        exit;
    }

    $objCliente = Cliente::getCliente($_GET['id']);
    
    if(!$objCliente instanceof Cliente){
        header('location: index.php?status=error');
        exit;
    }

    if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["telefone"])){
        // do something about create
        // $objCliente = new Cliente;
        
        $objCliente->nome = $_POST['nome'];
        $objCliente->email = $_POST['email'];
        $objCliente->telefone = $_POST['telefone'];
        
        $objCliente->atualizar();

        header('location: index.php?status=success');
        exit;

        // var_dump($objCliente);die;

    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/cadastrarClientes.php';
    include __DIR__.'/includes/footer.php';

?>