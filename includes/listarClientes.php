<?php
    $html = '';
    foreach ($clientes as $cliente) {
        $html .= '<tr>
                        <td>'.$cliente->id.'</td>
                        <td>'.$cliente->nome.'</td>
                        <td>'.$cliente->email.'</td>
                        <td>'.$cliente->telefone.'</td>
                        <td>
                            <a href="editar.php?id='.$cliente->id.'">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="excluir.php?id='.$cliente->id.'">
                                <button class="btn btn-danger">Editar</button>
                            </a>
                        </td>
                    </tr>';
    }
?>
<main>
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