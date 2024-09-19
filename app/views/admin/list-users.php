
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Tipo de Usuário</th>
            <th>#</th>
        </thead>
        <tbody>
            <?php foreach($users as $user){?>
            <tr>
                <form action="update_tipo_usuario" method="post">
                    <input type="hidden" name="userId" value="<?php echo $user['id']?>">
                    <td><input name="nome" type="text" value="<?php echo $user['nome']?>"></td>
                    <td><input name="email" type="text" value="<?php echo $user['email']?>"></td>
                    <td>
                        <select name="tipo_usuario" 
                        <?php if($_SESSION['usuario']['tipo_usuario'] != 3){echo "disabled";}?>>
                            <option value="1" <?php if ($user['tipo_usuario'] == 1) echo 'selected'; ?>>Usuário Comum</option>
                            <option value="2" <?php if ($user['tipo_usuario'] == 2) echo 'selected'; ?>>Administrador</option>
                            <option value="3" <?php if ($user['tipo_usuario'] == 3) echo 'selected'; ?>>Administrador Master
                            </option>
                        </select>
                    </td>
                    <td><button>Confirmar</button></td>
                </form>
            </tr>
            <?php
            }?>
        </tbody>
    </table>
</body>

</html>