<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu de Opções</title>
</head>

<body>
    <h1>Menu de Opções</h1>

    <form action="" method="POST">
        <label for="opcao">Escolha uma opção:</label>
        <select id="opcao" name="opcao" required>
            <option value="1">1 - Ver Saldo</option>
            <option value="2">2 - Depositar</option>
            <option value="3">3 - Sacar</option>
            <option value="4">4 - Sair</option>
        </select>
        <br><br>

        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $opcao = $_POST['opcao'];
        $saldo = 1000;

        switch ($opcao) {
            case "1":
                echo "<p>Seu saldo é: R$ $saldo</p>";
                break;
            case "2":
                $deposito = 200;
                $saldo += $deposito;
                echo "<p>Você depositou R$ $deposito. Seu novo saldo é: R$ $saldo</p>";
                break;
            case "3":
                $saque = 100;
                if ($saldo >= $saque) {
                    $saldo -= $saque;
                    echo "<p>Você sacou R$ $saque. Seu novo saldo é: R$ $saldo</p>";
                } else {
                    echo "<p>Saldo insuficiente para saque.</p>";
                }
                break;
            case "4":
                echo "<p>Saindo...</p>";
                break;
            default:
                echo "<p>Opção inválida!</p>";
                break;
        }
    }
    ?>

</body>

</html>