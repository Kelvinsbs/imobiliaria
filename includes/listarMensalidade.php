<?php

    $mensagem = '';
    if(isset($_GET['status'])){
        switch ($_GET['status']) {
            case 'success':
                $mensagem = '<div class="alert alert-success">Ação executada com sucesso.</div>';
            break;
            case 'error':
                $mensagem = '<div class="alert alert-danger">Ação não executada.</div>';
            break;
            
            default:
            break;
        }
    }

    $html = '';
    foreach ($mensalidades as $mensalidade) {
        if($mensalidade->pago == 1){
            $labelPago = 'Sim';
        }else{
            $labelPago = 'Não';
        }
        
        if($mensalidade->realizado == 1){
            $labelRealizado = 'Sim';
        }else{
            $labelRealizado = 'Não';
        }

        $html .= '<tr>
                        <td>'.$mensalidade->id_contrato.'</td>
                        <td>'.$mensalidade->numero_parcela.'/12</td>
                        <td>'.floor($mensalidade->valor_mensalidade).'</td>
                        <td>'.floor($mensalidade->valor_repasse).'</td>
                        <td>'.$labelPago.'</td>
                        <td>'.$labelRealizado.'</td>
                        <td>
                            <a href="realizarPagamento.php?id='.$mensalidade->id.'">
                                <button class="btn btn-primary">Pagar</button>
                            </a>
                            <a href="realizarRepasse.php?id='.$mensalidade->id.'">
                                <button class="btn btn-success">Realizar repasse</button>
                            </a>
                        </td>
                    </tr>';
    }

    $html = !empty($html) ? $html : '<tr><td colspan="5" class="text-center">Nenhum proprietario encontrado</td></tr>'
?>
<main>

    <?= $mensagem ?>
    <section>
        <a href="listarProprietario.php">
            <button class="btn btn-success">Listar Proprietarios</button>
        </a>
        <a href="listarImoveis.php">
            <button class="btn btn-success">Listar Imoveis</button>
        </a>
        <a href="listarContrato.php">
            <button class="btn btn-success">Listar Contrato</button>
        </a>
        <a href="cadastrarCliente.php">
            <button class="btn btn-success">Cadastrar novo Cliente</button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>Contrato</th>
                    <th>Numero da parcela</th>
                    <th>Valor da mensalidade</th>
                    <th>Valor do repasse</th>
                    <th>Mensalidade</th>
                    <th>Repasse</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    echo $html;
                ?>
            </tbody>
        </table>

    </section>
</main>