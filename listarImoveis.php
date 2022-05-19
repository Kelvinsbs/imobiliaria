<?php

    include __DIR__.'/vendor/autoload.php';

    use \App\entity\Imovel;
    use \App\entity\Proprietario;

    $imoveis = Imovel::getImoveisAndProprietario();
    
    $proprietarios = Proprietario::getProprietarios();

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/listarImoveis.php';
    include __DIR__.'/includes/footer.php';

?>