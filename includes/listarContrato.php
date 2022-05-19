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
    // die(var_dump($novoImoveis));
    $html = '';
    foreach ($contratos as $contrato) {
        $dataIni = date('d/m/Y', strtotime($contrato->data_inicio));
        $dataFim = date('d/m/Y', strtotime($contrato->data_fim));

        $html .= '<tr>
                        <td>'.$contrato->id.'</td>
                        <td>'.$contrato->endereco.'</td>
                        <td>'.$contrato->nome_proprietario.'</td>
                        <td>'.$contrato->nome_locatario.'</td>
                        <td>'.$dataIni.'</td>
                        <td>'.$dataFim.'</td>
                        <td>'.$contrato->taxa_administracao.'</td>
                        <td>'.$contrato->valor_aluguel.'</td>
                        <td>'.$contrato->valor_condominio.'</td>
                        <td>'.$contrato->valor_iptu.'</td>
                        <td>
                            <a href="editarContrato.php?id='.$contrato->id.'">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="excluirContrato.php?id='.$contrato->id.'">
                                <button class="btn btn-danger">Excluir</button>
                            </a>
                        </td>
                    </tr>';
    }

    $html = !empty($html) ? $html : '<tr><td colspan="5" class="text-center">Nenhum Contrato encontrado</td></tr>'
?>
<main>

    <?= $mensagem ?>
    <section>
        <a href="cadastrarContrato.php">
            <button class="btn btn-success">Cadastrar novo Contrato</button>
        </a>
        <a href="cadastrarImovel.php">
            <button class="btn btn-success">Cadastrar novo Imovel</button>
        </a>
        <a href="cadastrarProprietario.php">
            <button class="btn btn-success">Cadastrar novo Proprietario</button>
        </a>
        <a href="cadastrarCliente.php">
            <button class="btn btn-success">Cadastrar novo Cliente</button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imovel</th>
                    <th>Proprietario</th>
                    <th>locatario</th>
                    <th>Data inicio</th>
                    <th>Data fim</th>
                    <th>Taxa administrativa</th>
                    <th>Valor do aluguel</th>
                    <th>Valor do condominio</th>
                    <th>Valor do IPTU</th>
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