<?php

    include __DIR__.'/vendor/autoload.php';

    define('TITLE', 'Editar Contrato');

    use \App\entity\Contrato;
    use \App\entity\Imovel;
    use \App\entity\Proprietario;
    use \App\entity\Cliente;

    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
        header('location: listarContrato.php?status=error');
        exit;
    }

    $objContrato = Contrato::getContrato($_GET['id']);
    $proprietarios = Proprietario::getProprietarios();
    $proprietarios = Imovel::getImoveis();
    $proprietarios = Cliente::getClientes();
    
    if(!$objImovel instanceof Imovel){
        header('location: listarContrato.php?status=error');
        exit;
    }

    if(isset($_POST["imovel"]) && isset($_POST["proprietario"]) && isset($_POST["locatario"]) && isset($_POST["data_inicio"]) && isset($_POST["data_fim"]) && isset($_POST["taxa_administracao"]) && isset($_POST["valor_aluguel"]) && isset($_POST["valor_condominio"]) && isset($_POST["valor_iptu"])){
        
        $objContrato->imovel = $_POST['imovel'];
        $objContrato->proprietario = $_POST['proprietario'];
        $objContrato->locatario = $_POST['locatario'];
        $objContrato->data_inicio = $_POST['data_inicio'];
        $objContrato->data_fim = $_POST['data_fim'];
        $objContrato->taxa_administracao = $_POST['taxa_administracao'];
        $objContrato->valor_aluguel = $_POST['valor_aluguel'];
        $objContrato->valor_condominio = $_POST['valor_condominio'];
        $objContrato->valor_iptu = $_POST['valor_iptu'];
        
        $objImovel->atualizar();

        header('location: listarContrato.php?status=success');
        exit;
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/cadastrarContrato.php';
    include __DIR__.'/includes/footer.php';

?>