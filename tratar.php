<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
</body>
</html>

<?php
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $genero = $_POST['genero'];
    

    
    try{
        include_once('conexao.php');

        $cadastro = $pdo-> prepare("INSERT INTO cadastro(email, telefone, genero) 
        VALUES
        (:email, :telefone, :genero)");

        $cadastro->bindValue(":email", $email);
        $cadastro->bindValue(":telefone", $telefone);
        $cadastro->bindValue(":genero", $genero);


        $cadastro->execute();

    } catch (Exception $e){
        die("<h2>Perdão $pronome $nome , estamos trabalhando no erro: </h2>" . $e->getMessage());
    }
    

    header('location: listar.php');
?>