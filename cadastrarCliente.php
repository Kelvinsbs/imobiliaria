<?php

    include __DIR__.'/vendor/autoload.php';

    use \App\entity\Cliente;

    if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["telefone"])){
        // do something about create
        $objCliente = new Cliente;
        
        $objCliente->nome = $_POST['nome'];
        $objCliente->email = $_POST['email'];
        $objCliente->telefone = $_POST['telefone'];
        
        $objCliente->cadastrar();

        header('location: index.php?status=success');
        exit;

        // var_dump($objCliente);die;

    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/cadastrarClientes.php';
    include __DIR__.'/includes/footer.php';

?>