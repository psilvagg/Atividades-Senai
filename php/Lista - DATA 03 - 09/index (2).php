<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Par ou Ímpar</title>
</head>

<body>
    <h1>Verificação de Número Par ou Ímpar</h1>

    <form action="" method="POST">
        <label for="numero">Insira um número:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit">Verificar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST['numero'];

        if ($numero % 2 == 0) {
            echo "<p>O número $numero é Par.</p>";
        } else {
            echo "<p>O número $numero é Ímpar.</p>";
        }
    }
    ?>

</body>

</html>