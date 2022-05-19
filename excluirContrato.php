<?php

    include __DIR__.'/vendor/autoload.php';

    use \App\entity\Contrato;

    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
        header('location: listarContrato.php?status=error');
        exit;
    }

    $objContrato = Contrato::getContrato($_GET['id']);

    if(!$objContrato instanceof Contrato){
        header('location: listarContrato.php?status=error');
        exit;
    }
    
    if(isset($_POST['excluir'])){
      
        $objContrato->excluir();

        header('location: listarContrato.php?status=success');
        exit;

    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/excluirContrato.php';
    include __DIR__.'/includes/footer.php';

?>