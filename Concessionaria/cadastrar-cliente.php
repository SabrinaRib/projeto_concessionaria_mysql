<h1>Cadastrar Cliente</h1> <!-- Título da página -->

<!-- O formulário envia os dados para a página "salvar-cliente" -->
<form action="?page=salvar-cliente" method="POST">

    <!-- Campo escondido: serve para informar a ação que será feita (no caso, "cadastrar") -->
    <input type="hidden" name="acao" value="cadastrar">

    <!-- Campo para digitar o nome do cliente -->
    <div div class="mb-3">
        <label>Nome
            <input type="text" name="nome_cliente"  class="form-control">
        </label>
    </div>

    <!-- Campo para digitar o e-mail do cliente -->
    <div div class="mb-3">
        <label>E-mail
            <input type="text" name="email_cliente" class="form-control">
        </label>
    </div>

    <!-- Campo para digitar o telefone do cliente -->
    <div div class="mb-3">
        <label>Telefone
            <input type="text" name="telefone_cliente" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Endereço
            <input type="text" name="telefone_cliente" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Data de Nascimento
            <input type="date" name="dt_nasc_cliente" class="form-control">
        </label>
    </div>

    <br>

    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>