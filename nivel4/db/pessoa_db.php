<?php

function get_pessoa_id($id)
{
    $conn = mysqli_connect('localhost', 'root', '', 'livros');
    $query = "SELECT * FROM pessoa WHERE id = '{$id}'";

    $resultado = mysqli_query($conn, $query);
    $pessoa = mysqli_fetch_assoc($resultado);
    mysqli_close($conn);
    return $pessoa;

}

function exclui_pessoa($id)
{
    $conn = mysqli_connect('localhost', 'root', '', 'livros');
    $query = "DELETE * FROM pessoa WHERE id = '{$id}'";

    $resultado = mysqli_query($conn, $query);
    mysqli_close($conn);
    return $resultado;

}

function insert_pessoa($pessoa)
{
    $conn = mysqli_connect('localhost', 'root', '', 'livros');
    $sql = "INSERT INTO pessoa (id, nome, endereco, bairro, telefone, email, id_cidade) VALUES ('{$pessoa['id']}', '{$pessoa['nome']}', '{$pessoa['endereco']}', '{$pessoa['bairro']}', '{$pessoa['telefone']}', '{$pessoa['email']}', '{$pessoa['id_cidade']}')";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

}

function update_pessoa($pessoa)
{
    $conn = mysqli_connect('localhost', 'root', '', 'livros');
    $sql = "UPDATE pessoa SET nome = '{$pessoa['nome']}', endereco = '{$pessoa['endereco']}', bairro = '{$pessoa['bairro']}', telefone = '{$pessoa['telefone']}', email = '{$pessoa['email']}', id_cidade = '{$pessoa['id_cidade']}' WHERE id = '{$id}'";

    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);

}

function lista_pessoa()
{
    $conn = mysqli_connect('localhost', 'root', '', 'livros');
    $query = "SELECT * FROM pessoa ORDER BY id";

    $resultado = mysqli_query($conn, $query);
    
    $list = mysqli_fetch_all($resultado);
    mysqli_close($conn);
    return $list;

}

function get_next_pesso()
{
    $conn = mysqli_connect('localhost', 'root', '', 'livros');
    $result = mysqli_query($conn, "SELECT max(id) as next FROM pessoa");
    $row = mysqli_fetch_assoc($result);
    $next = (int) $row['next'] + 1;
    mysqli_close($conn);
    return $next;

}