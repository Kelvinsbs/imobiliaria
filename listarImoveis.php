<?php

    include __DIR__.'/vendor/autoload.php';

    use \App\entity\Imovel;

    $imovels = Imovel::getImoveis();

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/listarImoveis.php';
    include __DIR__.'/includes/footer.php';

?>