<?php

$dados = $_POST;

// print_r ($dados);

if ($dados['id']) {
    $conn = mysqli_connect('localhost', 'root', '', 'livros');

    $id = (int) $dados['id'];

    $sql = "DELETE FROM pessoa WHERE id = '{$id}'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        print "Registro Deletado com sucesso!";
        header("Location: pessoa_list.php");
    }else{
        print mysqli_error($conn);
    }
    mysqli_close($conn);
}