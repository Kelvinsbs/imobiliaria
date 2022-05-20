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
    foreach ($imoveis as $imovel) {
        $html .= '<tr>
                        <td>'.$imovel->id.'</td>
                        <td>'.$imovel->endereco.'</td>
                        <td>'.$imovel->nome_proprietario.'</td>
                        <td>
                            <a href="editarImovel.php?id='.$imovel->id.'">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="excluirImovel.php?id='.$imovel->id.'">
                                <button class="btn btn-danger">Excluir</button>
                            </a>
                        </td>
                    </tr>';
    }

    $html = !empty($html) ? $html : '<tr><td colspan="5" class="text-center">Nenhum proprietario encontrado</td></tr>'
?>
<main>

    <?= $mensagem ?>
    <section>
        <a href="index.php">
            <button class="btn btn-success">Listar Clientes</button>
        </a>
        <a href="listarProprietario.php">
            <button class="btn btn-success">Listar Proprietarios</button>
        </a>
        <a href="listarContrato.php">
            <button class="btn btn-success">Listar Contrato</button>
        </a>
        <a href="cadastrarImovel.php">
            <button class="btn btn-success">Cadastrar novo Imovel</button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Endereço</th>
                    <th>Proprietario</th>
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