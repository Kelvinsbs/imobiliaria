<main>
    <section>
        <a href="listarContrato.php">
            <button class="btn btn-success">Voltar</button>
        </a>

        <h2 class="mt-3"><?= TITLE ?></h2>
        <?php 
            $htmlImovel = '';
            foreach ($imoveis as $imovel) {
                // if(!empty($objImovel->endereco) && $objImovel->proprietario == $proprietario->id){
                    // $htmlImovel .= '<option value="'.$proprietario->id.'" selected>'.$proprietario->nome.'</option>';
                // }else{
                    $htmlImovel .= '<option value="'.$imovel->id.'">'.$imovel->endereco.'</option>';
                // }
            }

            $htmlProprietario = '';
            foreach ($proprietarios as $proprietario) {
                // if(!empty($objImovel->proprietario) && $objImovel->proprietario == $proprietario->id){
                //     $htmlProprietario .= '<option value="'.$proprietario->id.'" selected>'.$proprietario->nome.'</option>';
                // }else{
                    $htmlProprietario .= '<option value="'.$proprietario->id.'">'.$proprietario->nome.'</option>';
                // }
            }
            $htmlCliente = '';
            foreach ($clientes as $cliente) {
                // if(!empty($objCliente) && $objImovel->proprietario == $proprietario->id){
                    // $htmlCliente .= '<option value="'.$proprietario->id.'" selected>'.$proprietario->nome.'</option>';
                // }else{
                    $htmlCliente .= '<option value="'.$cliente->id.'">'.$cliente->nome.'</option>';
                // }
            }
        ?>
        <form method="post">
            <div class="form-group">
                <label for="exampleFormControlInput1">Imóvel</label>
                <select class="form-control" id="imovel" name="imovel">
                    <option value="0">Selecione</option>
                    <?=$htmlImovel?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Proprietario</label>
                <select class="form-control" id="proprietario" name="proprietario">
                    <option value="0">Selecione</option>
                    <?=$htmlProprietario?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Cliente</label>
                <select class="form-control" id="locatario" name="locatario">
                    <option value="0">Selecione</option>
                    <?=$htmlCliente?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Data Inicio</label>
                <input type="date" class="form-control" id="data_inicio" name="data_inicio" placeholder="" value="<?= !empty($objImovel->endereco) ? $objImovel->endereco : null?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Data Fim</label>
                <input type="date" class="form-control" id="data_fim" name="data_fim" placeholder="" value="<?= !empty($objImovel->endereco) ? $objImovel->endereco : null?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Taxa de administração</label>
                <input type="text" class="form-control" id="taxa_administracao" name="taxa_administracao" placeholder="" value="<?= !empty($objImovel->endereco) ? $objImovel->endereco : null?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Valor do  aluguel</label>
                <input type="text" class="form-control" id="valor_aluguel" name="valor_aluguel" placeholder="" value="<?= !empty($objImovel->endereco) ? $objImovel->endereco : null?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">valor do condomínio</label>
                <input type="text" class="form-control" id="valor_condominio" name="valor_condominio" placeholder="" value="<?= !empty($objImovel->endereco) ? $objImovel->endereco : null?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Valor do IPTU</label>
                <input type="text" class="form-control" id="valor_iptu" name="valor_iptu" placeholder="" value="<?= !empty($objImovel->endereco) ? $objImovel->endereco : null?>">
            </div>
            <div class="form-group">
                <button type="submit" id="btn" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </section>
    <script>
        window.onload = function(){
            if(document.getElementById('valor_iptu').value == ''){
                document.getElementById('btn').innerHTML = 'Cadastrar'
            }else{
                document.getElementById('btn').innerHTML = 'Editar'
            }
        }
    </script>
</main>