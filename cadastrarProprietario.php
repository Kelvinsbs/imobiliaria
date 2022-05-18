<?php

    include __DIR__.'/vendor/autoload.php';

    define('TITLE', 'Cadastrar Proprietario');

    use \App\entity\Proprietario;
    $objProprietario = new Proprietario;

    if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["telefone"])){
        // do something about create
        
        $objProprietario->nome = $_POST['nome'];
        $objProprietario->email = $_POST['email'];
        $objProprietario->telefone = $_POST['telefone'];
        $objProprietario->dia_repasse = $_POST['dia_repasse'];
        
        $objProprietario->cadastrar();

        header('location: listarProprietario.php?status=success');
        exit;

    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/cadastrarProprietario.php';
    include __DIR__.'/includes/footer.php';

?>