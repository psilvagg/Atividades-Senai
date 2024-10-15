<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálcula de IMC</title>
</head>

<body>
    <main>
        <?php
        function imc()
        {
            $altura = $_POST['altura'];
            $genero = $_POST['genero'];

            //Mulheres: (62.1 * altura) – 44.7;
            //Homens: (72.2 * altura) – 58;

            if ($genero = 'fem') {
                $imcFem = round((62.1 * $altura) - 44.7, 2);
                return $imcFem;
            }
            if ($genero = 'masc') {
                $imcMasc = round((72.2 * $altura) - 58, 2);
                return "Peso Ideal: . $imcMasc";
            } else {
                return "Sexo inválido.";
            }
        }
        ?>

        <form action="index.php" method="post">
            <h1>Cálcule seu IMC</h1>
            <input type="text" placeholder="Altura" name="altura"><br><br>
            <select name="Sexo" id="">
                <option value="" label="Selecione seu Genêro"></option>
                <option value="masc" label="Masculino"></option>
                <option value="fem" label="Feminino"></option>
            </select>
            <br><br>
            <input type="submit" value="Calcular">
            <?php
            echo "<br>", "<br>", imc();
            ?>
        </form>
    </main>

</body>

</html>