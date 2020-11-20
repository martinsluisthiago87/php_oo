<?php

class Pessoa
{
    private static $conn;
    public static function getConnection()
    {
        if (empty(self::$conn)) {
            $ini = parse_ini_file('config/livro.ini');
            $host = $ini['host'];
            $name = $ini['name'];
            $user = $ini['user'];
            $pass = $ini['pass'];
            self::$conn = new PDO("mysql:host={$host};dbname={$name};", "{$user}","{$pass}");
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$conn;
        
    }
    public static function find($id)
    {
        
        $conn = self::getConnection();
        $result = $conn->query("SELECT * FROM pessoas WHERE id = '{$id}'");
        return $result->fetch();

    }

    public static function delete($id)
    {
        $conn = self::getConnection();

        $result = $conn->query("DELETE FROM pessoas WHERE id = '{$id}'");
        return $result;
    }

    public static function all()
    {
        $conn = self::getConnection();

        $result = $conn->query("SELECT * FROM pessoa ORDER BY id");
        return $result->fetchAll();
    }

    public static function save($pessoa)
    {
        $conn = self::getConnection();

        if (empty($pessoa['id'])) 
        {
            $result = $conn->query("SELECT max(id) as next FROM pessoa");
            $row = $result->fetch();
            $pessoa['id'] = (int) $row['next'] + 1;

            $sql = "INSERT INTO pessoa (id, nome, endereco, bairro, telefone, 
                                        email, id_cidade) 
                                    VALUES ('{$pessoa['id']}', '{$pessoa['nome']}', 
                                    '{$pessoa['endereco']}', '{$pessoa['bairro']}', 
                                    '{$pessoa['telefone']}', '{$pessoa['email']}', 
                                    '{$pessoa['id_cidade']}')";
        }
        else
        {
            $sql = "UPDATE pessoa SET  nome = '{$pessoa['nome']}', 
                                    endereco = '{$pessoa['endereco']}', 
                                    bairro = '{$pessoa['bairro']}', 
                                    telefone = '{$pessoa['telefone']}', 
                                    email = '{$pessoa['email']}', 
                                    id_cidade = '{$pessoa['id_cidade']}' 
                        WHERE id = '{$pessoa['id']}'";


        }

        return $conn->query($sql);
    }
    
}
