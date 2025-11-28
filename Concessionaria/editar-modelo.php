<h1>Editar Modelo</h1>
<?php
    $sql = "SELECT * FROM modelo WHERE id_modelo=" . $_REQUEST['id_modelo'];

    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>

<form action="?page=salvar-modelo" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_modelo" value="<?php print $row->id_modelo; ?>">

     <div class="mb-3">
            <label>Nome:
            <input type="text" name="nome_modelo" class="form-control" 
               value="<?php print $row->nome_modelo; ?>">
        </label>
    </div>

    <div class="mb-3">
        <label>Cor:
            <input type="text" name="cor_modelo" class="form-control" 
               value="<?php print $row->cor_modelo; ?>">
        </label>
    </div>

    <div class="mb-3">
        <label>Ano
            <input type="number" name="ano_modelo" class="form-control" 
               value="<?php print $row->ano_modelo; ?>">
        </label>
    </div>
    <div class="mb-3">
        <label>Ano
            <input type="text" name="tipo_modelo" class="form-control" 
               value="<?php print $row->tipo_modelo; ?>">
        </label>
    </div>
    <div class="mb-3">
    <label>Marca:</label>
    <select name="marca_id_marca" class="form-control" required>
        <option value="">- Escolha -</option>
    <?php
        $sql = "SELECT * FROM marca";
        $res = $conn->query($sql);

        if($res->num_rows > 0){
            while($row = $res->fetch_object()){
                // Verifica se essa marca é a que está associada ao modelo
                $selected = ($row->id_marca == $dados->marca_id_marca) ? "selected" : "";
                print "<option value='{$row->id_marca}' {$selected}>{$row->nome_marca}</option>";
            }
        } else {
            print "<option>Não há marcas cadastradas</option>";
        }
    ?>
</select>

    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>