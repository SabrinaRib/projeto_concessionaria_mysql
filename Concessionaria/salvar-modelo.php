<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nome = $_POST["nome_modelo"];
        $cor = $_POST["cor_modelo"];
        $ano = $_POST["ano_modelo"];
        $tipo = $_POST["tipo_modelo"];
        $marca = $_POST["marca_id_marca"];

        $sql = "INSERT INTO modelo (nome_modelo, cor_modelo, ano_modelo, tipo_modelo, marca_id_marca)
                VALUES ('{$nome}', '{$cor}', '{$ano}', '{$tipo}', '{$marca}')";

        $res = $conn->query($sql);


        if($res){
            print "<script>alert('Modelo cadastrado com sucesso!');</script>";
            print "<script>location.href='?page=listar-modelo';</script>";
        } else {
            print "<script>alert('Erro ao cadastrar o modelo!');</script>";
            print "<script>location.href='?page=listar-modelo';</script>";
        }
        break;

    case 'editar':
        $id = $_REQUEST["id_modelo"];
        $nome = $_POST["nome_modelo"];
        $cor = $_POST["cor_modelo"];
        $ano = $_POST["ano_modelo"];
        $tipo = $_POST["tipo_modelo"];
        $marca = $_POST["marca_id_marca"];

        $sql = "UPDATE modelo 
                SET nome_modelo='{$nome}', 
                    cor_modelo='{$cor}', 
                    ano_modelo='{$ano}', 
                    tipo_modelo='{$tipo}', 
                    marca_id_marca='{$marca}'
                WHERE id_modelo={$id}";
        $res = $conn->query($sql);

        if($res){
            print "<script>alert('Modelo editada com sucesso!');</script>";
            print "<script>location.href='?page=listar-modelo';</script>";
        } else {
            print "<script>alert('Erro ao editar a modelo!');</script>";
            print "<script>location.href='?page=listar-modelo';</script>";
        }
        break;

    case 'excluir':
        $id = $_REQUEST['id_modelo'];

        $sql = "DELETE FROM modelo WHERE id_modelo={$id}";
        $res = $conn->query($sql);

        if($res){
            print "<script>alert('Modelo excluída com sucesso!');</script>";
            print "<script>location.href='?page=listar-modelo';</script>";
        } else {
            print "<script>alert('Erro ao excluir o modelo!');</script>";
            print "<script>location.href='?page/listar-modelo';</script>";
        }
        break;
}
?>