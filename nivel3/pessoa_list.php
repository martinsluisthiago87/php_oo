
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

while ($row = mysqli_fetch_assoc($resultado))
{
// $id         = $row['id'];
// $nome       = $row['nome'];
// $endereco   = $row['endereco'];
// $bairro     = $row['bairro'];
// $telefone   = $row['telefone'];
// $email      = $row['email'];
// $id_cidade      = $row['id_cidade'];

$item = file_get_contents('html/list.html');
$item = str_replace('{id}', $row['id'], $item);
}



// var_dump($row);


