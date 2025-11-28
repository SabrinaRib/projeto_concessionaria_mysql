<h1>Listar Modelo</h1>

<?php
$sql = "SELECT 
            modelo.id_modelo,
            modelo.nome_modelo,
            modelo.cor_modelo,
            modelo.ano_modelo,
            modelo.tipo_modelo,
            marca.nome_marca
        FROM modelo
        INNER JOIN marca ON modelo.marca_id_marca = marca.id_marca";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";            
        print "<th>Nome do Modelo</th>";          
        print "<th>Cor</th>";        
        print "<th>Ano</th>";
        print "<th>Tipo</th>";  
        print "<th>Marca</th>";            
        print "<th>Ações</th>";
        print "</tr>";
        
$i = 1;
    while ($row = $res->fetch_object()) {
    print "<tr>";
    print "<td>{$i}</td>";
    print "<td>{$row->nome_modelo}</td>";
    print "<td>{$row->cor_modelo}</td>";
    print "<td>{$row->ano_modelo}</td>";
    print "<td>{$row->tipo_modelo}</td>";
    print "<td>{$row->nome_marca}</td>";
    print "<td>
        <button class='btn btn-success' 
            onclick=\"location.href='?page=editar-modelo&id_modelo={$row->id_modelo}';\">
            Editar
        </button>
        <button class='btn btn-danger' 
            onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-modelo&acao=excluir&id_modelo={$row->id_modelo}';}else{false;}\">
            Excluir
        </button>
    </td>";
    print "</tr>";
    $i++;
}


        print "</table>";
    } else {
        print "<p>Não encontrou resultado</p>";
    }
?>