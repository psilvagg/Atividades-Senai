<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Simples</title>
</head>
<body>
    <h1>Calculadora Simples</h1>

    <form action="" method="POST">
        <label for="numero1">Número 1:</label>
        <input type="number" id="numero1" name="numero1" required step="any">
        <br><br>

        <label for="numero2">Número 2:</label>
        <input type="number" id="numero2" name="numero2" required step="any">
        <br><br>

        <label for="operacao">Selecione uma operação:</label>
        <select id="operacao" name="operacao">
            <option value="+">Somar (+)</option>
            <option value="-">Subtrair (-)</option>
            <option value="*">Multiplicar (*)</option>
            <option value="/">Dividir (/)</option>
        </select>
        <br><br>

        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = $_POST['numero1'];
        $numero2 = $_POST['numero2'];
        $operacao = $_POST['operacao'];
        $resultado = 0;

        switch ($operacao) {
            case "+":
                $resultado = $numero1 + $numero2;
                break;
            case "-":
                $resultado = $numero1 - $numero2;
                break;
            case "*":
                $resultado = $numero1 * $numero2;
                break;
            case "/":
                if ($numero2 != 0) {
                    $resultado = $numero1 / $numero2;
                } else {
                    echo "<p>Erro: Divisão por zero não é permitida.</p>";
                    exit;
                }
                break;
            default:
                echo "<p>Operação inválida!</p>";
                exit;
        }

        echo "<p>Resultado: $numero1 $operacao $numero2 = $resultado</p>";
    }
    ?>

</body>
</html>
