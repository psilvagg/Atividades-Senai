<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota dos Alunos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eef2f3;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }

        .container {
            background: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 50px auto;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
        }

        .form-control {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .result-container {
            margin-top: 20px;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .result-container h2 {
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .result-container p {
            color: #333;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>Cadastro de Alunos</h1>

        <form method="post">
            <?php for ($i = 1; $i <= 10; $i++): ?>
                <div class="form-group">
                    <label for="nome<?php echo $i; ?>">Nome do Aluno <?php echo $i; ?>:</label>
                    <input type="text" class="form-control" name="nome[]" required>
                </div>
                <div class="form-group">
                    <label for="nota<?php echo $i; ?>">Nota do Aluno <?php echo $i; ?>:</label>
                    <input type="number" class="form-control" name="nota[]" step="0.01" min="0" max="10" required>
                </div>
            <?php endfor; ?>
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <div class="result-container">
                <h2>Resultados:</h2>
                <?php
                $nomes = $_POST['nome'];
                $notas = $_POST['nota'];
                $somaNotas = 0;
                $maiorNota = 0;
                $nomeMaiorNota = '';

                for ($i = 0; $i < 10; $i++) {
                    $somaNotas += (float)$notas[$i];
                    if ((float)$notas[$i] > $maiorNota) {
                        $maiorNota = (float)$notas[$i];
                        $nomeMaiorNota = $nomes[$i];
                    }
                }

                $media = $somaNotas / 10;

                echo "<p>Média da classe: <strong>" . number_format($media, 2, ',', '.') . "</strong></p>";
                echo "<p>Aluno com maior nota: <strong>$nomeMaiorNota</strong> (Nota: " . number_format($maiorNota, 2, ',', '.') . ")</p>";
                ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>