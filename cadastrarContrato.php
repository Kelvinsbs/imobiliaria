<?php

    include __DIR__.'/vendor/autoload.php';

    define('TITLE', 'Cadastrar Contrato');

    use \App\entity\Contrato;
    use \App\entity\Imovel;
    use \App\entity\Proprietario;
    use \App\entity\Cliente;
    use \App\entity\Mensalidade;

    $objContrato = new Contrato;
    $objImovel = new Imovel;
    $objProprietario = new Proprietario;
    $objCliente = new Cliente;
    $objMensalidade = new Mensalidade;

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

        if(!empty($objContrato->id)){
            // criar a mensalidade
            $valor_mensalidade = (int)$_POST['valor_aluguel'] + (int)$_POST['valor_condominio'] + (int)$_POST['valor_iptu'];
            
            $valor_repasse = ((int)$_POST['valor_aluguel'] + (int)$_POST['valor_iptu']) - (int)$_POST['taxa_administracao'];

            // die(var_dump($valor_mensalidade, $valor_repasse));
            // O VALOR DO REPASSE VAI SER O NOVO_TOTAL MENOS O CONDOMINIO

            for ($i=1; $i <= 12 ; $i++) {
                if($i == 1){
                    $diaInicioMensalidade = date('d', strtotime($_POST['data_inicio']));
                    // $mesInicioMensalidade = date('m', strtotime($_POST['data_inicio']));

                    $maxDays=date('t', strtotime($_POST['data_inicio']));

                    if($diaInicioMensalidade != '1' || $diaInicioMensalidade != '01'){
                        $mensalidade_dia = floor((int)$valor_mensalidade / (int)$maxDays);
                        $dias_restante_mes = (int)$maxDays - (int)$diaInicioMensalidade;
                        $novo_valor_mensalidade = floor((int)$mensalidade_dia * $dias_restante_mes);

                        // calcular o valor do repasse
                        $novo_valor_repasse = (int)$novo_valor_mensalidade - (int)$_POST['valor_condominio'] - (int)$_POST['taxa_administracao'];
                        if($novo_valor_repasse <= 0){
                            $novo_valor_repasse = 0;
                        }
                    }else{
                        $novo_valor_mensalidade = $valor_mensalidade;
                        $novo_valor_repasse = $valor_repasse;
                    }

                }else{
                    $novo_valor_mensalidade = $valor_mensalidade;
                    $novo_valor_repasse = $valor_repasse;
                }

                $objMensalidade->id_contrato = $objContrato->id;
                $objMensalidade->numero_parcela = $i;
                $objMensalidade->valor_mensalidade = $novo_valor_mensalidade;
                $objMensalidade->valor_repasse = $valor_repasse;
                $objMensalidade->pago = 0;
                $objMensalidade->realizado = 0;

                $objMensalidade->cadastrarMensalidade();

            }
        }


        header('location: listarMensalidade.php?id_contrato='.$objContrato->id);
        // header('location: listarContrato.php?status=success');
        exit;

    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/cadastrarContrato.php';
    include __DIR__.'/includes/footer.php';

?>