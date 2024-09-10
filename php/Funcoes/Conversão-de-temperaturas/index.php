<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversão de Temperaturas</title>
</head>

<body>
    <?php
    $valor = $_POST['valor'] ?? '';
    function calc($valor)
    {
        $total = ($valor - 32) * 5 / 9;
        echo "<h3>$total</h3>";

        return $total;
    }
    ?>
    <form action="index.php" method="post" name="">
        <h2>Conversão</h2>
        <input type="number" placeholder="Insira um número" name="valor"><br><br>
        <input type="submit" value="Calcular">
        <?php
        calc($valor);
        ?>
    </form>


</body>




</html>