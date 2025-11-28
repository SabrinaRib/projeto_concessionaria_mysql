<?php
    // 1. BUSCAR DADOS DA VENDA
    $id_venda = @$_REQUEST['id_venda'];

    // Query para buscar os dados da venda e os nomes associados (Cliente, Funcionário, Modelo)
    $sql_venda = "SELECT 
                    v.*, 
                    c.nome_cliente, 
                    f.nome_funcionario, 
                    m.nome_modelo
                  FROM venda v
                  INNER JOIN cliente c ON v.cliente_id_cliente = c.id_cliente
                  INNER JOIN funcionario f ON v.funcionario_id_funcionario = f.id_funcionario
                  INNER JOIN modelo m ON v.modelo_id_modelo = m.id_modelo
                  WHERE v.id_venda = $id_venda";

    $res_venda = $conn->query($sql_venda);
    if ($res_venda->num_rows > 0) {
        $row_venda = $res_venda->fetch_object();
    } else {
        print "<p class='alert alert-danger'>Venda não encontrada!</p>";
        exit;
    }

    // 2. BUSCAR CLIENTES (para o dropdown)
    $sql_cliente = "SELECT * FROM cliente";
    $res_cliente = $conn->query($sql_cliente);

    // 3. BUSCAR FUNCIONÁRIOS (para o dropdown)
    $sql_funcionario = "SELECT * FROM funcionario";
    $res_funcionario = $conn->query($sql_funcionario);

    // 4. BUSCAR MODELOS (para o dropdown)
    $sql_modelo = "SELECT * FROM modelo";
    $res_modelo = $conn->query($sql_modelo);
?>

<div class="row">
    <div class="col-lg-12">
        <h1>Editar Venda</h1>
    </div>
</div>

<form action="?page=salvar-venda" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_venda" value="<?php print $row_venda->id_venda; ?>">

    <div class="mb-3">
        <label>Cliente</label>
        <select name="cliente_id_cliente" class="form-control" required>
            <option value="">Selecione o Cliente</option>
            <?php
                if($res_cliente->num_rows > 0) {
                    while($row_c = $res_cliente->fetch_object()) {
                        $selected = ($row_c->id_cliente == $row_venda->cliente_id_cliente) ? 'selected' : '';
                        print "<option value='{$row_c->id_cliente}' {$selected}>{$row_c->nome_cliente}</option>";
                    }
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Funcionário</label>
        <select name="funcionario_id_funcionario" class="form-control" required>
            <option value="">Selecione o Funcionário</option>
            <?php
                if($res_funcionario->num_rows > 0) {
                    while($row_f = $res_funcionario->fetch_object()) {
                        $selected = ($row_f->id_funcionario == $row_venda->funcionario_id_funcionario) ? 'selected' : '';
                        print "<option value='{$row_f->id_funcionario}' {$selected}>{$row_f->nome_funcionario}</option>";
                    }
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Modelo do Carro</label>
        <select name="modelo_id_modelo" class="form-control" required>
            <option value="">Selecione o Modelo</option>
            <?php
                if($res_modelo->num_rows > 0) {
                    while($row_m = $res_modelo->fetch_object()) {
                        $selected = ($row_m->id_modelo == $row_venda->modelo_id_modelo) ? 'selected' : '';
                        print "<option value='{$row_m->id_modelo}' {$selected}>{$row_m->nome_modelo}</option>";
                    }
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Data da Venda</label>
        <input type="date" name="data_venda" value="<?php print $row_venda->data_venda; ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Valor da Venda (R$)</label>
        <input type="number" step="0.01" name="valor_venda" value="<?php print $row_venda->valor_venda; ?>" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Salvar Edição</button>
</form>