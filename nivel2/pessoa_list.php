<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Lista de Pessoas</title>
  </head>
  <body>
      <table class="table"> 
          <thead>
              <tr>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col">ID</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Endereço</th>
                  <th scope="col">Bairro</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Cidade</th>
              </tr>
          </thead>
          <tbody>
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
                    $id         = $row['id'];
                    $nome       = $row['nome'];
                    $endereco   = $row['endereco'];
                    $bairro     = $row['bairro'];
                    $telefone   = $row['telefone'];
                    $email      = $row['email'];
                    $id_cidade      = $row['id_cidade'];

                    print '<tr>';

                    print "<td> <a href='pessoa_form.php?action=edit&id={$id}'><img src='assets/images/edit.svg' alt='' style='width: 15px; margin-right:5px;'> </a></td>";
                    print "<td><a href='pessoa_list.php?action=delete&id={$id}'><img src='assets/images/remove.svg' alt='' style='width: 15px; margin-right:5px;'></a></td>";
                    print "<td>{$id}</td>";
                    print "<td>{$nome}</td>";
                    print "<td>{$endereco}</td>";
                    print "<td>{$bairro}</td>";
                    print "<td>{$telefone}</td>";
                    print "<td>{$email}</td>";
                    print '</tr>';
                }


                // var_dump($row);

              ?>
          </tbody>

      </table>

        <button onclick="window.location='pessoa_form.php'" type="button" class="btn btn-success">
          <img src="assets/images/insert.svg" alt="" style="width: 15px; margin-right:5px;">Inserir
        </button>

      <!-- <button onclick="window.location='pessoa_form_insert.php'">
          <img src="assets/images/insert.svg" alt="" style="width: 17px;">Inserir
      </button> -->
    
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>