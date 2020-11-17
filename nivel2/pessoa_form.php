<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Editar Pessoa</title>
  </head>
  <body>
        <?php
        $id         = '';
        $nome       = '';
        $endereco   = '';
        $bairro     = '';
        $telefone   = '';
        $email      = '';
        $id_cidade  = '';
        if (!empty($_REQUEST['action'])) 
        {
            $conn = mysqli_connect('localhost', 'root', '', 'livros');
            if ($_REQUEST['action'] == 'edit') 
            {
                if (!empty($_GET['id'])) 
                {
                    
                    $id = (int) $_GET['id'];
                    $query = "SELECT * FROM pessoa WHERE id = '{$id}'";

                    $resultado = mysqli_query($conn, $query);

                    if ($resultado) {
                    $row = mysqli_fetch_assoc($resultado);
                        $id         = $row['id'];
                        $nome       = $row['nome'];
                        $endereco   = $row['endereco'];
                        $bairro     = $row['bairro'];
                        $telefone   = $row['telefone'];
                        $email      = $row['email'];
                        $id_cidade  = $row['id_cidade'];
                    }else{
                        print "Pessoa Invalida!";
                    }
                    // print $id;
                }
        }elseif($_REQUEST['action'] == 'save')
        {
            $id         = $_POST['id'];
            $nome       = $_POST['nome'];
            $endereco   = $_POST['endereco'];
            $bairro     = $_POST['bairro'];
            $telefone   = $_POST['telefone'];
            $email      = $_POST['email'];
            $id_cidade  = $_POST['id_cidade'];
            if (empty($_POST['id'])) {
                
                // RETORNA O ID
                $result = mysqli_query($conn, "SELECT max(id) as next FROM pessoa");
                $row = mysqli_fetch_assoc($result);
                $next = (int) $row['next'] + 1;

                $sql = "INSERT INTO pessoa (id, nome, endereco, bairro, telefone, email, id_cidade) VALUES ('{$next}', '{$nome}', '{$endereco}', '{$bairro}', '{$telefone}', '{$email}', '{$id_cidade}')";
                $result = mysqli_query($conn, $sql);
            }else {
                $sql = "UPDATE pessoa SET nome = '{$nome}', endereco = '{$endereco}', bairro = '{$bairro}', telefone = '{$telefone}', email = '{$email}', id_cidade = '{$id_cidade}' WHERE id = '{$id}'";

                $result = mysqli_query($conn, $sql);
            }
            print $result ? "Registro salvo com sucesso!" : mysqli_error($conn);
            mysqli_close($conn);
            // echo "<pre>";
            // print_r ($_POST);
            // echo "</pre>";

        }
        }

        ?>
  <div class="left">
  <form enctype="multipart/form-data" method="post" action="pessoa_form.php?action=save">
        <div class="form-group">
            <label for="exampleInputEmail1">Código</label>
            <input type="text" class="form-control" readonly="1" name="id" style="width: 30%;" value="<?php echo $id?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" class="form-control" name="nome" value="<?php echo $nome?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Endereço</label>
            <input type="text" class="form-control" name="endereco" value="<?php echo $endereco?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Bairro</label>
            <input type="text" class="form-control" name="bairro" value="<?php echo $bairro?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Telefone</label>
            <input type="text" class="form-control" name="telefone" value="<?php echo $telefone?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $email?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Cidade</label>
            <select name="id_cidade" class="form-control" id="exampleFormControlSelect1">
                <?php
                    require_once 'lista_combo_cidades.php';
                    print lista_combo_cidades($id_cidade);
                ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Enviar</button>
            <button onclick="window.location='pessoa_list.php'" type="button" class="btn btn-warning">
          <img src="assets/images/info.svg" alt="" style="width: 15px; margin-right:5px;">Listar Pessoas
        </button>
        </div>
    </form>
  </div>
    

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