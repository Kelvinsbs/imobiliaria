<?php

    include __DIR__.'/vendor/autoload.php';

    define('TITLE', 'Editar Imovel');

    use \App\entity\Proprietario;
    use \App\entity\Imovel;

    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
        header('location: listarImoveis.php?status=error');
        exit;
    }

    $objImovel = Imovel::getImovel($_GET['id']);
    $proprietarios = Proprietario::getProprietarios();
    
    if(!$objImovel instanceof Imovel){
        header('location: listarImoveis.php?status=error');
        exit;
    }

    if(isset($_POST["endereco"]) && isset($_POST["proprietario"])){
        
        $objImovel->endereco = $_POST['endereco'];
        $objImovel->proprietario = $_POST['proprietario'];
        
        $objImovel->atualizar();

        header('location: listarImoveis.php?status=success');
        exit;
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/cadastrarImovel.php';
    include __DIR__.'/includes/footer.php';

?>