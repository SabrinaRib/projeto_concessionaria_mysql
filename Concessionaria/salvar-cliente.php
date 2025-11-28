<?php
    switch($_REQUEST['acao']) {

        case 'cadastrar':
            $nome = $_POST['nome_cliente'];
            $email = $_POST['email_cliente'];
            $telefone = $_POST['telefone_cliente'];
            $endereco = $_POST['endereco_cliente'];
            $dt_nasc_cliente = $_POST['dt_nasc_cliente'];

            $sql = "INSERT INTO cliente (nome_cliente, email_cliente, telefone_cliente, endereco_cliente, dt_nasc_cliente)
                    VALUES ('{$nome}', '{$email}', '{$telefone}', '{$endereco}', '{$dt_nasc_cliente}')";

            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Cadastrou com sucesso!');</script>";
                print "<script>location.href='?page=listar-cliente';</script>";
            } else {
                print "<script>alert('Não cadastrou!');</script>";
                print "<script>location.href='?page=listar-cliente';</script>";
            }
        break;

        case 'editar':
            $nome = $_POST['nome_cliente'];
            $email = $_POST['email_cliente'];
            $telefone = $_POST['telefone_cliente'];
            $endereco = $_POST['endereco_cliente'];
            $dt_nasc_cliente = $_POST['dt_nasc_cliente'];

            $sql = "UPDATE cliente SET 
                        nome_cliente='{$nome}', 
                        email_cliente='{$email}', 
                        telefone_cliente='{$telefone}', 
                        endereco_cliente='{$endereco}', 
                        dt_nasc_cliente='{$dt_nasc_cliente}' 
                    WHERE id_cliente=".$_REQUEST['id_cliente'];

            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Editou com sucesso!');</script>";
                print "<script>location.href='?page=listar-cliente';</script>";
            } else {
                print "<script>alert('Não editou!');</script>";
                print "<script>location.href='?page=listar-cliente';</script>";
            }
        break;

        case 'excluir':
            $sql = "DELETE FROM cliente WHERE id_cliente=".$_REQUEST['id_cliente'];

            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Excluído com sucesso!');</script>";
                print "<script>location.href='?page=listar-cliente';</script>";
            } else {
                print "<script>alert('Não excluiu!');</script>";
                print "<script>location.href='?page=listar-cliente';</script>";
            }
        break;
    }
?>