<?php

class AdminModel{
    public static function getAllUsers($userId = null) {
        require "../config/conexao.php";

        if (isset($userId)) {
            $sql = "SELECT * FROM usuarios WHERE id = $userId;";
        } else {
            $sql = "SELECT * FROM usuarios;";
        }
       
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 1) {
            $users = array();
            while ($row = $resultado->fetch_assoc()) {
                $users[] = $row;
            }
            return $users;
        } elseif ($resultado->num_rows == 1) {
            return $resultado->fetch_assoc();
        } else {
            return null;
        }
    }

    public static function updateTipoUsuario($userId, $tipoUsuario) {
        require "../config/conexao.php";
        $stmt = $conn->prepare("UPDATE usuarios SET tipo_usuario = ? WHERE id = ?");
        
        if ($stmt === false) {
            die("Erro ao preparar o statement: " . $conn->error);
        }
        $stmt->bind_param("si", $tipoUsuario, $userId);
    
        $resultado = $stmt->execute();
    
        if ($resultado) {
            header('Location: ../public/list-users?deu certo');
        } else {    
            header('Location: ../public/list-users?nao deu certo');
        }
        $stmt->close();
    }
    
}