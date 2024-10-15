<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eef2f3;
            font-family: 'Arial', sans-serif;
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

        @media (max-width: 576px) {
            .container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>Cadastro de Produtos</h1>

        <form method="post">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <div class="form-group">
                    <label for="produto<?php echo $i; ?>">Produto <?php echo $i; ?>:</label>
                    <input type="text" class="form-control" name="nome[]" required>
                </div>
                <div class="form-group">
                    <label for="preco<?php echo $i; ?>">Preço:</label>
                    <input type="number" class="form-control" name="preco[]" step="0.01" required>
                </div>
            <?php endfor; ?>
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <div class="result-container">
                <h2>Resultados:</h2>
                <?php
                $nomes = $_POST['nome'];
                $precos = $_POST['preco'];
                $produtos = [];

                for ($i = 0; $i < 5; $i++) {
                    $produtos[] = ['nome' => $nomes[$i], 'preco' => (float)$precos[$i]];
                }

                $qntInferiorA50 = array_reduce($produtos, function ($count, $produto) {
                    return $count + ($produto['preco'] < 50 ? 1 : 0);
                }, 0);

                $produtosEntre50e100 = array_filter($produtos, function ($produto) {
                    return $produto['preco'] >= 50 && $produto['preco'] < 100;
                });
                $nomesEntre50e100 = array_column($produtosEntre50e100, 'nome');

                $precosAcima100 = array_filter($produtos, function ($produto) {
                    return $produto['preco'] > 100;
                });
                $mediaAcima100 = count($precosAcima100) > 0 ? array_sum(array_column($precosAcima100, 'preco')) / count($precosAcima100) : 0;

                echo "<p>A quantidade de produtos com preço inferior a R$50,00: <strong>$qntInferiorA50</strong></p>";
                echo "<p>Produtos com preço entre R$50,00 e R$100,00: <strong>" . implode(", ", $nomesEntre50e100) . "</strong></p>";
                if ($mediaAcima100 > 0) {
                    echo "<p>A média dos preços dos produtos com preço superior a R$100,00: <strong>R$" . number_format($mediaAcima100, 2, ',', '.') . "</strong></p>";
                } else {
                    echo "<p>Não há produtos com preço superior a R$100,00.</p>";
                }
                ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>