<?php

    include __DIR__.'/vendor/autoload.php';

    use \App\entity\Mensalidade;

    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
        header('location: listarMensalidade.php?id_contrato='.$objMensalidade->id_contrato);
        exit;
    }
    
    $objMensalidade = Mensalidade::getMensalidade($_GET['id']);
    
    if(!$objMensalidade instanceof Mensalidade){
        header('location: listarMensalidade.php?id_contrato='.$objMensalidade->id_contrato);
        exit;
    }

    if(isset($_GET["id"])){
        if($objMensalidade->realizado == 1){
            $objMensalidade->realizado = 0;
        }else{
            $objMensalidade->realizado = 1;
        }
        
        $objMensalidade->atualizarRealizado();

        header('location: listarMensalidade.php?id_contrato='.$objMensalidade->id_contrato);
        exit;
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/listarMensalidade.php';
    include __DIR__.'/includes/footer.php';

?>