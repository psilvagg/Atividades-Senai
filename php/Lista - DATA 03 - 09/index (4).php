<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de Login</title>
</head>

<body>
    <h1>Verificação de Login</h1>

    <form action="" method="POST">
        <label for="username">Nome de Usuário:</label>
        <input type="text" id="username" name="username" required>
        <br><br>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <button type="submit">Login</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == "admin" && $password == "1234") {
            echo "<p>Login bem-sucedido!</p>";
        } else {
            echo "<p>Login ou senha incorretos.</p>";
        }
    }
    ?>

</body>

</html>