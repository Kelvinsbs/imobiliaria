<?php

    include __DIR__.'/vendor/autoload.php';

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
    // die(Var_dump($_POST['excluir']));
    if(isset($_POST['excluir'])){
      
        $objCliente->excluir();

        header('location: index.php?status=success');
        exit;

    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/excluirCliente.php';
    include __DIR__.'/includes/footer.php';

?>