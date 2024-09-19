<?php 



class UserModel {

    public static function getAllUsers() {
        require "../config/conexao.php";
        $sql = "SELECT * FROM usuarios";
        $resultado = $conn->query($sql);
    
        $users = array();
        while ($row = $resultado->fetch_assoc()) {
            $users[] = $row;
        }
    
        return $users;
    }

    public static function cadastrarUsuario($dadosCadastro) {
        require "../config/conexao.php";
        
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
    
        $passwordHash = password_hash($dadosCadastro['password'], PASSWORD_DEFAULT);
        
        $stmt->bind_param("sss", $dadosCadastro['name'], $dadosCadastro['email'], $passwordHash);
        
        if ($stmt->execute()) {
            echo '<script>alert("Cadastro Efetuado!"); window.location.href = "../public/";</script>';
            exit();
        } else {
            echo '<script>alert("Erro ao inserir dados' . $conn->error . '");</script>';
            http_response_code(500);
        }
    
        $stmt->close();
        $conn->close();
    }


    public static function loginUsuario($dadosLogin) {
        require "../config/conexao.php";
    
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $dadosLogin['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    
        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
            
            if(password_verify($dadosLogin['password'], $usuario['senha'])){
                $_SESSION['usuario'] = $usuario;
                $_SESSION['login'] = TRUE;

                $_SESSION['userData'] = $usuario;
                echo '<script> window.location.href = "../";</script>';
                exit(); 
            } else {
                echo '<script>alert("Usuário ou senha incorreta!");</script>';
            }
        } else {
            echo '<script>alert("Usuário ou senha incorreta!");</script>';
        }
    
        $conn->close();
    }





}
