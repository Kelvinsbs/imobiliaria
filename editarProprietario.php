<?php

    include __DIR__.'/vendor/autoload.php';

    define('TITLE', 'Editar Proprietario');

    use \App\entity\Proprietario;

    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
        header('location: listarProprietario.php?status=error');
        exit;
    }

    $objProprietario = Proprietario::getProprietario($_GET['id']);
    
    if(!$objProprietario instanceof Proprietario){
        header('location: listarProprietario.php?status=error');
        exit;
    }

    if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["telefone"]) && isset($_POST["dia_repasse"])){
        // do something about create
        // $objProprietario = new Proprietario;
        
        $objProprietario->nome = $_POST['nome'];
        $objProprietario->email = $_POST['email'];
        $objProprietario->telefone = $_POST['telefone'];
        $objProprietario->dia_repasse = $_POST['dia_repasse'];
        
        $objProprietario->atualizar();

        header('location: listarProprietario.php?status=success');
        exit;
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/cadastrarProprietario.php';
    include __DIR__.'/includes/footer.php';

?>