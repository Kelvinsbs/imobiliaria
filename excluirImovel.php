<?php

    include __DIR__.'/vendor/autoload.php';

    use \App\entity\Imovel;

    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
        header('location: listarImoveis.php?status=error');
        exit;
    }

    $objImovel = Imovel::getImovel($_GET['id']);

    if(!$objImovel instanceof Imovel){
        header('location: listarImoveis.php?status=error');
        exit;
    }
    
    if(isset($_POST['excluir'])){
      
        $objImovel->excluir();

        header('location: listarImoveis.php?status=success');
        exit;

    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/excluirImovel.php';
    include __DIR__.'/includes/footer.php';

?>