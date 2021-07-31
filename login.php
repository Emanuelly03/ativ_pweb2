<?php
    include('conexão.php');
    if(empty($_POST['user']) || empty($_POST['senha'])){
        header('Location:login.html');
        exit();
    }

    $user = $_POST['user'];
    $senha = $_POST['senha'];

    $cmd = $pdo->prepare("SELECT user, senha FROM cadastro_1 WHERE user = :user and senha = :senha");

    $cmd->bindparam(":user", $user);
    $cmd->bindValue(":senha", md5($senha));
    $cmd->execute();

    if($cmd->rowCount() == 0){
        echo "Usuário ou senha inválidos.";
        ?>
            <button><a href="login.html">Voltar</a></button>
        <?php
    }else{
        header("Location: listagem.php");
    }
?>