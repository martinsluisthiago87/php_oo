
<?php
require_once 'db/pessoa_db.php';
$conn = mysqli_connect('localhost', 'root', '', 'livros');

// Deletando Registro
if (!empty($_GET['action']) AND $_GET['action'] == 'delete')
{
    $id = $_GET['id'];
    exclui_pessoa($id);
}
// Fim Deletando Registro

//Listando os usuários
$pessoas = lista_pessoa();

$items = '';
if ($pessoas) 
{
    foreach($pessoas as $pessoa)
    {
        $item = file_get_contents('html/item.html');
        $item = str_replace('{id}', $pessoa['id'], $item);
        $item = str_replace('{nome}', $pessoa['nome'], $item);
        $item = str_replace('{endereco}', $pessoa['endereco'], $item);
        $item = str_replace('{bairro}', $pessoa['bairro'], $item);
        $item = str_replace('{telefone}', $pessoa['telefone'], $item);
        $item = str_replace('{email}', $pessoa['email'], $item);
        $item = str_replace('{id_cidade}', $pessoa['id_cidade'], $item);

        $items .= $item;
    }
}

$list = file_get_contents('html/list.html');
$list = str_replace('{items}', $items, $list);

print $list;




