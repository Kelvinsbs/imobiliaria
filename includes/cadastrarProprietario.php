<main>
    <section>
        <a href="listarProprietarios.php">
            <button class="btn btn-success">Voltar</button>
        </a>

        <h2 class="mt-3"><?= TITLE ?></h2>

        <form method="post">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="joão da silva" value="<?= !empty($objProprietario->nome) ? $objProprietario->nome : null?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?= !empty($objProprietario->email) ? $objProprietario->email : null ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000" value="<?= !empty($objProprietario->telefone) ? $objProprietario->telefone : null?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Dia de repasse</label>
                <input type="text" class="form-control" id="diaRepasse" name="dia_repasse" placeholder="00" value="<?= !empty($objProprietario->dia_repasse) ? $objProprietario->dia_repasse : null?>">
            </div>
            <div class="form-group">
                <button type="submit" id="btn" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </section>
    <script>
        window.onload = function(){
            if(document.getElementById('nome').value == ''){
                document.getElementById('btn').innerHTML = 'Cadastrar'
            }else{
                document.getElementById('btn').innerHTML = 'Editar'
            }
        }
    </script>
</main>