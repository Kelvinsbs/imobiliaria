<?php

    include __DIR__.'/vendor/autoload.php';

    define('TITLE', 'Cadastrar Contrato');

    use \App\entity\Contrato;
    use \App\entity\Imovel;
    use \App\entity\Proprietario;
    use \App\entity\Cliente;

    $objContrato = new Contrato;
    $objImovel = new Imovel;
    $objProprietario = new Proprietario;
    $objCliente = new Cliente;

    $imoveis = Imovel::getImoveis();
    $proprietarios = Proprietario::getProprietarios();
    $clientes = Cliente::getClientes();
    
    if(isset($_POST["imovel"]) && isset($_POST["proprietario"]) && isset($_POST["locatario"]) && isset($_POST["data_inicio"]) && isset($_POST["data_fim"]) && isset($_POST["taxa_administracao"]) && isset($_POST["valor_aluguel"]) && isset($_POST["valor_condominio"]) && isset($_POST["valor_iptu"])){
        // do something about create
        
        $objContrato->imovel = $_POST['imovel'];
        $objContrato->proprietario = $_POST['proprietario'];
        $objContrato->locatario = $_POST['locatario'];
        $objContrato->data_inicio = $_POST['data_inicio'];
        $objContrato->data_fim = $_POST['data_fim'];
        $objContrato->taxa_administracao = $_POST['taxa_administracao'];
        $objContrato->valor_aluguel = $_POST['valor_aluguel'];
        $objContrato->valor_condominio = $_POST['valor_condominio'];
        $objContrato->valor_iptu = $_POST['valor_iptu'];
        
        $objContrato->cadastrar();

        header('location: listarImoveis.php?status=success');
        exit;

    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/cadastrarContrato.php';
    include __DIR__.'/includes/footer.php';

?>