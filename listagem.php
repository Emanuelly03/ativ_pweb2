<?php
    include('conexão.php');
    ?>
        <form method="POST" name="form" action="search.php">
            <br>
            <label for="search">Buscar usuário:</label>
            <input type="text" name="search">
            <br>
            <button type="submit" value="Send">OK</button>
            <br>
            <br>
        </form>
    <?php

    $cmdo = $pdo->prepare("SELECT user, email FROM cadastro_1");
    $cmdo->execute();
    $resultado = $cmdo->fetchAll(PDO::FETCH_ASSOC);

    for ($i=0; $i < count($resultado); $i++) { 
        echo "Usuário: ".($i+1)."<br>";
        foreach ($resultado[$i] as $key => $value) {
            echo $key.": ".$value."<br>";
        }
        echo "<br>";
    }
    ?>
        <button><a href="login.html">Voltar</a></button>
    <?php
?>