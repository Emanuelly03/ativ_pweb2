<?php
    include('conexão.php');

    if(empty($_POST['search'])){
        header('Location: listagem.php');
        exit();
    }

    $buscar = $_POST['search'];

    $cmdo = $pdo->prepare("SELECT user, email FROM cadastro_1 WHERE user = :bu or email = :bu");

    $cmdo->bindparam(":bu", $buscar);
    $cmdo->execute();

    if($cmdo->rowCount() == 0){
        echo "Esse usuário não existe.<br>";
    }else{
        $resultado = $cmdo->fetch(PDO::FETCH_ASSOC);
        echo "Usuário:<br>";
        foreach ($resultado as $key => $value) {
            echo $key.": ".$value."<br>";
        }
        echo "<br>";
    }

    ?>
        <button><a href="listagem.php">Voltar</a></button>
    <?php
?>