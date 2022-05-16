<?php

    include __DIR__.'/vendor/autoload.php';

    use \App\entity\Cliente;

    $clientes = Cliente::getClientes();

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/listarClientes.php';
    include __DIR__.'/includes/footer.php';

?>