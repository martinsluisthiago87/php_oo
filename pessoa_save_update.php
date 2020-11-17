<?php

$dados = $_POST;

// print_r ($dados);

if ($dados['id']) {
    $conn = mysqli_connect('localhost', 'root', '', 'livros');

    $sql = "UPDATE pessoa SET nome = '{$dados['nome']}', endereco = '{$dados['endereco']}', bairro = '{$dados['bairro']}', telefone = '{$dados['telefone']}', email = '{$dados['email']}', id_cidade = '{$dados['id_cidade']}' WHERE id = '{$dados['id']}'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        print "Registro atualizado com sucesso!";
        header("Location: pessoa_list.php");
    }else{
        print mysqli_error($conn);
    }
    mysqli_close($conn);
}