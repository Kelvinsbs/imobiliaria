<?php

    include __DIR__.'/vendor/autoload.php';

    define('TITLE', 'Cadastrar Imovel');

    use \App\entity\Imovel;
    use \App\entity\Proprietario;
    $objImovel = new Imovel;
    $objProprietario = new Proprietario;

    if(isset($_POST["endereco"]) && isset($_POST["proprietario"])){
        // do something about create
        
        $objImovel->endereco = $_POST['endereco'];
        $objImovel->proprietario = $_POST['proprietario'];
        
        $objImovel->cadastrar();

        header('location: listarImoveis.php?status=success');
        exit;

    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/cadastrarImovel.php';
    include __DIR__.'/includes/footer.php';

?>