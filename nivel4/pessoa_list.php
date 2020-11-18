
<?php
$conn = mysqli_connect('localhost', 'root', '', 'livros');

// Deletando Registro
if (!empty($_GET['action']) AND $_GET['action'] == 'delete') {
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM pessoa WHERE id = '{$id}'");
}
// Fim Deletando Registro

//Listando os usuários
$query = "SELECT * FROM pessoa ORDER BY id";
$resultado = mysqli_query($conn, $query);

$items = '';
while ($row = mysqli_fetch_assoc($resultado))
{
    $item = file_get_contents('html/item.html');
    $item = str_replace('{id}', $row['id'], $item);
    $item = str_replace('{nome}', $row['nome'], $item);
    $item = str_replace('{endereco}', $row['endereco'], $item);
    $item = str_replace('{bairro}', $row['bairro'], $item);
    $item = str_replace('{telefone}', $row['telefone'], $item);
    $item = str_replace('{email}', $row['email'], $item);
    $item = str_replace('{id_cidade}', $row['id_cidade'], $item);

    $items .= $item;
}

$list = file_get_contents('html/list.html');
$list = str_replace('{items}', $items, $list);

print $list;



// var_dump($row);


