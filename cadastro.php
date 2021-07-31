<?php
    include ('conexão.php');
    if(empty($_POST['nome']) || empty($_POST['user']) || empty($_POST['email']) || empty($_POST['senha'])){
        header('Location: cadastro.html');
        exit();
    }

    $nome = $_POST['nome'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $cmd = $pdo->prepare("INSERT INTO cadastro_1(nomecompleto, user, email, senha) VALUES (:n, :nu, :e, :s)");

    $cmd->bindparam(":n",$nome);
    $cmd->bindparam(":nu",$user);
    $cmd->bindparam(":e",$email);
    $cmd->bindValue(":s",md5($senha));
    
    $cmd1 = $pdo->prepare("SELECT nomecompleto FROM cadastro_1 WHERE user = :nu and email = :e");

    $cmd1->bindparam(":nu", $user);
    $cmd1->bindparam(":e",$email);
    $cmd1->execute();

    if($cmd1->rowCount() == 0){
        $cmd->execute();
        header("Location: login.html");
    }else{
        echo "Usuário já cadastrado.";
        ?>
            <button><a href="cadastro.html">Voltar</a></button>
        <?php
    }
     
?>