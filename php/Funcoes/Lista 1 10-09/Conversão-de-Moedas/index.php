<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversão do Dolar</title>
</head>

<body>
    <?php
    $valor = $_POST['valor'] ?? '';
    function calc($valor)
    {
        $total = ($valor * 1.81);
        echo "<h3>$total</h3>";
        return $total;
    }
    ?>
    <form action="index.php" method=post>
        <h1>Conversão de Dolar para Real</h1>
        <h2>Cotação do Dolar: R$1.81</h2>
        <input type="text" placeholder="Insira o valor em R$" name="valor"><br><br>
        <input type="submit" value="Converter">

        <?php
        calc($valor);
        ?>
    </form>

</body>

</html>