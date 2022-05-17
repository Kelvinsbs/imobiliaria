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
                # code...
                break;
        }
    }

    $html = '';
    foreach ($clientes as $cliente) {
        $html .= '<tr>
                        <td>'.$cliente->id.'</td>
                        <td>'.$cliente->nome.'</td>
                        <td>'.$cliente->email.'</td>
                        <td>'.$cliente->telefone.'</td>
                        <td>
                            <a href="editarCliente.php?id='.$cliente->id.'">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="excluirCliente.php?id='.$cliente->id.'">
                                <button class="btn btn-danger">Excluir</button>
                            </a>
                        </td>
                    </tr>';
    }

    $html = !empty($html) ? $html : '<tr><td colspan="5" class="text-center">Nenhum cliente encontrado</td></tr>'
?>
<main>

    <?= $mensagem ?>
    <section>
        <a href="cadastrarCliente.php">
            <button class="btn btn-success">Cadastrar novo Cliente</button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
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