<div class="col-sm-12 mb-4">
    <h3 class="text-primary">
        Cadastrar Funcionário
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
                    <input type="text" class="form-control" id="txtnome" name="txtnome" placeholder="Digite seu nome" maxlength="128" minlength="3" />
                </div>
            </div>
            <div class="form-group row">
                <label for="inputText" class="col-sm-2 col-form-label">
                    E-mail
                </label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="txtemail" name="txtemail" maxlength="128" />
                </div>
            </div>
            <div class="form-group row">
                <label for="inputText" class="col-sm-2 col-form-label">
                    Cargo
                </label>
                <div class="col-sm-10">
                    <select class="form-select" name="selectCargo">
                        <option selected>Abra esse menu de seleção</option>
                        <option value="Desenvolvedor Back-end">Desenvolvedor Back-end</option>
                        <option value="Desenvolvedor Front-end">Desenvolvedor Front-end</option>
                        <option value="Desenvolvedor Fullstack">Desenvolvedor Fullstack</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputText" class="col-sm-2 col-form-label">
                    Salário
                </label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="txtsalario" name="txtsalario" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-primary m-3" name="btnsalvar" id="btnsalvar" value="Salvar" />
                    <a class="btn btn-danger" href="?p=categoria/consultar"><i class="bi bi-arrow-return-left"></i></a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
if (filter_input(INPUT_POST, 'btnsalvar')) {
    $nome = filter_input(INPUT_POST, 'txtnome');
    $email = filter_input(INPUT_POST, 'txtemail');
    $cargo = filter_input(INPUT_POST, "selectCargo");
    $salario = filter_input(INPUT_POST, "txtsalario");

    $dados = array(
        'nome' => $nome,
        'email' => $email,
        'cargo' => $cargo,
        'salario' => $salario
    );

    include_once '../controles/Funcionario.php';
    $fun = new Funcionario();

    $fun->setDadosJson(json_encode($dados));

    if ($fun->salvarFirebase() === true) {
        echo '<div class="alert alert-danger mt-3" role="alert">
        Erro
    </div>';
    } else {
        echo '<div class="alert alert-success mt-3" role="alert">
        Salvo
    </div>';
    }
}
