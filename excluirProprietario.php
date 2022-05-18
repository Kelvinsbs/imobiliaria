<?php

    include __DIR__.'/vendor/autoload.php';

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
    
    if(isset($_POST['excluir'])){
      
        $objProprietario->excluir();

        header('location: listarProprietario.php?status=success');
        exit;

    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/excluirProprietario.php';
    include __DIR__.'/includes/footer.php';

?>