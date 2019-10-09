<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">    
</head>
<body>
    <table class="table table-striped table-hover">
        <thead>
            <th>email</th>
            <th>telefone</th>
            <th>Tipos de corte</th>

            
        </thead>
<?php
    try {
        require('conexao.php');
        // A variável $pdo, usada a seguir, está vindo do conexao.php

        $consulta = $pdo->prepare("SELECT * FROM cadastro");
        $consulta->execute();

        $cadastros = $consulta->fetchAll();
        
        foreach($cadastros as $cadastro) {
            echo "<tr>
                    <td>{$cadastro["email"]}</td>
                    <td>{$cadastro["telefone"]}</td>
                    <td>{$cadastro["genero"]}</td>

                    
                    <td><a href='editar.php?id={$cadastro["id_cadastro"]}'></td>
                </tr>";
        }

    } catch(Exception $e) {
        die("Erro de banco de dados: " . $e->getMessage());
    }    
?>    
    </table>
    <p><a href="index.html">Voltar ao início.</a></p>
    <script src="vendor/popper.min.js"></script>
    <script src="vendor/jquery-3.3.1.slim.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
