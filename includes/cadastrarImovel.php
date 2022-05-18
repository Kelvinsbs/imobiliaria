<main>
    <section>
        <a href="listarImoveis.php">
            <button class="btn btn-success">Voltar</button>
        </a>

        <h2 class="mt-3"><?= TITLE ?></h2>

        <form method="post">
            <div class="form-group">
                <label for="exampleFormControlInput1">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="" value="<?= !empty($objImovel->endereco) ? $objImovel->endereco : null?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Proprietario</label>
                <select type="email" class="form-control" id="Proprietario" name="Proprietario">
                    <?php 
                            die(var_dump($proprietarios));
                        foreach ($proprietarios as $proprietario) {
                            $html .= '<option value="'.$proprietario->id.'">'.$proprietario->nome.'</option>';
                        }
                    ?>
                </select>
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