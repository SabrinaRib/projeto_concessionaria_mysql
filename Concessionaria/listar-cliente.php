<h1>Listar Cliente</h1>

<?php
    // Cria o comando SQL que seleciona todos os registros da tabela "cliente"
    $sql = "SELECT * FROM cliente";

    // Executa a consulta no banco de dados através da conexão ($conn)
    $res = $conn->query($sql);

    // Armazena a quantidade de registros retornados pela consulta
    $qtd = $res->num_rows;

    // Verifica se a consulta retornou algum resultado
    if($qtd > 0){
        // Exibe o número de resultados encontrados
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";

        // Cria uma tabela com classes do Bootstrap para exibir os dados
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";             
        print "<th>Nome</th>";          
        print "<th>E-mail</th>";        
        print "<th>Telefone</th>";      
        print "<th>Endereço</th>";
        print "<th>Data de Nascimento</th>";
        print "<th>Ações</th>";
        print "</tr>";
        
        // Percorre cada registro retornado da consulta
        while($row = $res->fetch_object()){
            // Cria uma nova linha na tabela para cada cliente
            print "<tr>";
            // Exibe o ID do cliente
            print "<td>".$row->id_cliente."</td>";
            // Exibe o nome do cliente
            print "<td>".$row->nome_cliente."</td>";
            // Exibe o e-mail do cliente
            print "<td>".$row->email_cliente."</td>";
            // Exibe o telefone do cliente
            print "<td>".$row->telefone_cliente."</td>";
            print "<td>".$row->endereco_cliente."</td>";
            print "<td>".$row->dt_nasc_cliente."</td>";
            print "<td>
                <button class='btn btn-success' 
                    onclick=\"location.href='?page=editar-cliente&id_cliente={$row->id_cliente}';\">
                    Editar
                </button>
                <button class='btn btn-danger' 
                    onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-cliente&acao=excluir&id_cliente={$row->id_cliente}';}else{false;}\">
                    Excluir
                </button>
            </td>";
            print "</tr>";
        }

        print "</table>";
    } else {
        print "<p>Não encontrou resultado</p>";
    }
?>