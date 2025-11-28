<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome = $_POST['nome_marca'];

        $sql = "INSERT INTO marca(nome_marca) VALUES('{$nome}')";
        $res = $conn->query($sql);

        if($res){
            print "<script>alert('Marca cadastrada com sucesso!');</script>";
            print "<script>location.href='?page=listar-marca';</script>";
        } else {
            print "<script>alert('Marca não cadastrada!');</script>";
            print "<script>location.href='?page=listar-marca';</script>";
        }
        break;

    case 'editar':
        $nome = $_POST['nome_marca'];
        $id = $_REQUEST['id_marca'];

        $sql = "UPDATE marca SET nome_marca='{$nome}' WHERE id_marca={$id}";
        $res = $conn->query($sql);

        if($res){
            print "<script>alert('Marca editada com sucesso!');</script>";
            print "<script>location.href='?page=listar-marca';</script>";
        } else {
            print "<script>alert('Erro ao editar a marca!');</script>";
            print "<script>location.href='?page=listar-marca';</script>";
        }
        break;

    case 'excluir':
        $id = $_REQUEST['id_marca'];

        $sql = "DELETE FROM marca WHERE id_marca={$id}";
        $res = $conn->query($sql);

        if($res){
            print "<script>alert('Marca excluída com sucesso!');</script>";
            print "<script>location.href='?page=listar-marca';</script>";
        } else {
            print "<script>alert('Erro ao excluir a marca!');</script>";
            print "<script>location.href='?page/listar-marca';</script>";
        }
        break;
}
?>