<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Idade</title>
</head>

<body>
    <h1>Cadastro</h1>
    <form action="index.php" method="POST">
        <label for="idade">Digite sua idade:</label>
        <input type="number" id="idade" name="idade" required>
        <br><br>
        <input type="submit" value="Cadastrar">
    </form>

    <?php
    $msg = '';
    $idade = $_POST['idade'] ?? 0;

    if ($idade >= 18) {
        $msg = '';
        echo "<h2>Cadastro permitido! Bem-vindo(a).</h2>";
    } else {
        echo "<h2>Você não pode se cadastrar. É necessário ter 18 anos ou mais.</h2>";
    }
    ?>
</body>

</html>