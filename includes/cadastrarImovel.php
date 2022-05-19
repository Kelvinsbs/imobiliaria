<main>
    <section>
        <a href="listarImoveis.php">
            <button class="btn btn-success">Voltar</button>
        </a>

        <h2 class="mt-3"><?= TITLE ?></h2>
        <?php 
            $html = '';
            foreach ($proprietarios as $proprietario) {
                if(!empty($objImovel->proprietario) && $objImovel->proprietario == $proprietario->id){
                    $html .= '<option value="'.$proprietario->id.'" selected>'.$proprietario->nome.'</option>';
                }else{
                    $html .= '<option value="'.$proprietario->id.'">'.$proprietario->nome.'</option>';
                }
            }
        ?>
        <form method="post">
            <div class="form-group">
                <label for="exampleFormControlInput1">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="" value="<?= !empty($objImovel->endereco) ? $objImovel->endereco : null?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Proprietario</label>
                <select class="form-control" id="proprietario" name="proprietario">
                    <option value="0">Selecione</option>
                    <?=$html?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" id="btn" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </section>
    <script>
        window.onload = function(){
            if(document.getElementById('endereco').value == ''){
                document.getElementById('btn').innerHTML = 'Cadastrar'
            }else{
                document.getElementById('btn').innerHTML = 'Editar'
            }
        }
    </script>
</main>