<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
</head>
<body>
    <h1>Calculadora de IMC</h1>
    /*Atividade: Calculadora de IMC (Índice de Massa Corporal)
Desenvolva um script em PHP que permita ao usuário calcular seu 
Índice de Massa Corporal (IMC) inserindo sua altura (em metros) e seu peso (em quilogramas). 
O IMC é calculado dividindo o peso pela altura ao quadrado (IMC = peso / altura^2).

O script deve exibir o resultado do IMC e uma mensagem indicando a categoria do IMC do usuário, 
conforme a seguinte tabela:

IMC abaixo de 18.5: Abaixo do peso
IMC entre 18.5 e 24.9: Peso normal
IMC entre 25 e 29.9: Sobrepeso
IMC entre 30 e 34.9: Obesidade grau I
IMC entre 35 e 39.9: Obesidade grau II (severa)
IMC acima de 40: Obesidade grau III (mórbida)
Certifique-se de validar as entradas do usuário para garantir que sejam números válidos maiores que zero.*/
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="formu">
        <h2>
            <label for="metros">Insira sua altura (ex: 1.80):</label><br>
            <input id="metros" type="text" name="metros" placeholder="Altura em metros">
            <br>
            <label for="peso">Insira seu peso em kg (ex: 65):</label><br>
            <input id="peso" type="number" name="peso" placeholder="Peso em kg">
            <br>
            <input type="submit" value="Calcular">
        </h2>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $altura = $_POST["metros"];
        $peso = $_POST["peso"];

        // Convertendo altura para número decimal
        $altura = str_replace(',', '.', $altura);

        // Validando a entrada
        if (!is_numeric($altura) || !is_numeric($peso) || $altura <= 0 || $peso <= 0) {
            echo "<h2>Por favor, insira valores válidos para altura e peso.</h2>";
        } else {
            // Calculando IMC
            $imc = $peso / ($altura ** 2);

            // Formatando o IMC para exibir apenas duas casas apos a virgula
            $imc_formatado = number_format($imc, 2, ',', '.');

            // Verificando a categoria do IMC
            echo "<h2>Resultado: $imc_formatado - ";
            if ($imc < 18.5) {
                echo "abaixo do peso";
            } elseif ($imc >= 18.5 && $imc <= 24.9) {
                echo "peso normal";
            } elseif ($imc >= 25 && $imc <= 29.9) {
                echo "sobrepeso";
            } elseif ($imc >= 30 && $imc <= 34.9) {
                echo "obesidade grau 1";
            } elseif ($imc >= 35 && $imc <= 39.9) {
                echo "obesidade grau 2 (severa)";
            } else {
                echo "obesidade grau 3 (mórbida)";
            }
            echo "</h2>";
        }
    }
    ?>
</body>
</html>
