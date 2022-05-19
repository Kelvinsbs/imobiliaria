<?php

    include __DIR__.'/vendor/autoload.php';

    use \App\entity\Contrato;
    use \App\entity\Imovel;
    use \App\entity\Proprietario;
    use \App\entity\Cliente;

    $contratos = Contrato::getDadosContratos();
    
    $imoveis = Imovel::getImoveis();
    $proprietarios = Proprietario::getProprietarios();
    $clientes = Cliente::getClientes();

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/listarContrato.php';
    include __DIR__.'/includes/footer.php';

?>