
        <?php
        $pessoa = [];
        $pessoa['id']           = '';
        $pessoa['nome']         = '';
        $pessoa['endereco']     = '';
        $pessoa['bairro']       = '';
        $pessoa['telefone']     = '';
        $pessoa['email']        = '';
        $pessoa['id_cidade']    = '';

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
                    $pessoa = mysqli_fetch_assoc($resultado);
                    // echo "<pre>";
                    // print_r($pessoa);
                    // echo "</pre>";
                    // exit;
                        
                    }
                    // print $id;
                }
        }
        elseif($_REQUEST['action'] == 'save')
        {
            $id         = $_POST['id'];
            $pessoa     = $_POST;

            if (empty($_POST['id'])) {
                
                // RETORNA O ID
                $result = mysqli_query($conn, "SELECT max(id) as next FROM pessoa");
                $row = mysqli_fetch_assoc($result);
                $next = (int) $row['next'] + 1;

                $sql = "INSERT INTO pessoa (id, nome, endereco, bairro, telefone, email, id_cidade) VALUES ('{$next}', '{$pessoa['nome']}', '{$pessoa['endereco']}', '{$pessoa['bairro']}', '{$pessoa['telefone']}', '{$pessoa['email']}', '{$pessoa['id_cidade']}')";
                $result = mysqli_query($conn, $sql);
            }else {
                $sql = "UPDATE pessoa SET nome = '{$pessoa['nome']}', endereco = '{$pessoa['endereco']}', bairro = '{$pessoa['bairro']}', telefone = '{$pessoa['telefone']}', email = '{$pessoa['email']}', id_cidade = '{$pessoa['id_cidade']}' WHERE id = '{$id}'";

                $result = mysqli_query($conn, $sql);
            }
            print $result ? "Registro salvo com sucesso!" : mysqli_error($conn);
            mysqli_close($conn);
            // echo "<pre>";
            // print_r ($_POST);
            // echo "</pre>";

        }
        }
        require_once 'lista_combo_cidades.php';
        $cidades = lista_combo_cidades($pessoa['id_cidade']);

        $form = file_get_contents('html/form.html'); //Ler o arquivo e retorna na forma de string
        $form = str_replace('{id}', $pessoa['id'], $form);
        $form = str_replace('{nome}', $pessoa['nome'], $form);
        $form = str_replace('{endereco}', $pessoa['endereco'], $form);
        $form = str_replace('{bairro}', $pessoa['bairro'], $form);
        $form = str_replace('{telefone}', $pessoa['telefone'], $form);
        $form = str_replace('{email}', $pessoa['email'], $form);
        $form = str_replace('{id_cidade}', $pessoa['id_cidade'], $form);
        $form = str_replace('{cidades}', $cidades, $form);

        print $form;


 