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
    foreach ($proprietarios as $proprietario) {
        $html .= '<tr>
                        <td>'.$proprietario->id.'</td>
                        <td>'.$proprietario->nome.'</td>
                        <td>'.$proprietario->email.'</td>
                        <td>'.$proprietario->telefone.'</td>
                        <td>'.$proprietario->dia_repasse.'</td>
                        <td>
                            <a href="editarProprietario.php?id='.$proprietario->id.'">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="excluirProprietario.php?id='.$proprietario->id.'">
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
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Dia de repasse</th>
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