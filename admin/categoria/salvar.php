<div class="col-sm-12 mb-4">
    <h3 class="text-primary">
        Cadastrar Categoria
    </h3>
</div>

<div class="col-sm-12">
    <div class="card shadow">
        <form method="post" name="frmsalvar" id="frmsalvar" class="m-3">
            <div class="form-group row">
                <label for="inputText" class="col-sm-2 col-form-label">
                    Nome
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtnome" name="txtnome" placeholder="Digite seu nome" maxlength="50" minlength="3" />
                </div>
            </div>
            <div class="form-group row">
                <label for="inputText" class="col-sm-2 col-form-label">
                    Ramal
                </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="txtramal" name="txtramal" min="111" max="999" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-primary m-3" name="btnsalvar" id="btnsalvar" value="Salvar" />
                    <a class="btn btn-danger" <!-- href="?p=categoria/consultar" -->><i class="bi bi-arrow-return-left"></i></a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
if (filter_input(INPUT_POST, 'btnsalvar')) {
    $nome = filter_input(INPUT_POST, 'txtnome');
    $ramal = filter_input(INPUT_POST, 'txtramal');

    $dados = array(
        'nome' => $nome,
        'ramal' => $ramal,
    );

    include_once '../controles/Categoria.php';
    $cat = new Categoria();

    $cat->setDadosJson(json_encode($dados));

    if ($cat->salvarFirebase() === true) {
        echo '<div class="alert alert-danger mt-3" role="alert">
        Erro
    </div>';
    } else {
        echo '<div class="alert alert-success mt-3" role="alert">
        Salvo
    </div>';
    }
}
