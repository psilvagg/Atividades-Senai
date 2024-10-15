<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificação de Notas</title>
</head>

<body>
    <form action="index.php" method="post">
        <input type="number" name="num" placeholder="Insira um número: ">
    </form>
    <?php
    $num = $_POST['num'] ?? '';

    switch ($num) {
        case 0 || 1 || 2 || 3 || 4:
            echo "<h2>Nota E</h2>";
            break;
        case 6 || 5:
            echo "<h2>Nota D</h2>";
            break;
        case 7 || 8:
            echo "<h2>Nota C</h2>";
            break;
        case 9:
            echo "<h2>Nota B</h2>";
            break;
        case 10:
            echo "<h2>Nota A</h2>";
            break;
        default:
            echo "<h2>Indefinido</h2>";
            break;
    }

    ?>
</body>

</html>