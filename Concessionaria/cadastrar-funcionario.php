<h1>Cadastrar Funcionário</h1>
<form action="?page=salvar-funcionario" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Nome
            <input type="text" name="nome_funcionario" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>E-mail
            <input type="text" name="email_funcionario" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Telefone
            <input type="text" name="telefone_funcionario" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>