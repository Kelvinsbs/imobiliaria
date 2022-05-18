<?php

    include __DIR__.'/vendor/autoload.php';

    use \App\entity\Proprietario;

    $proprietarios = Proprietario::getProprietarios();

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/listarProprietario.php';
    include __DIR__.'/includes/footer.php';

?>