<?php

use system\core\ExternalApiConection;

require_once './system/core/ExternalApiConection.php';

$teste = ExternalApiConection::makeRequest("https://www.swapi.tech/api/films/1");

$data = json_decode($teste, true);


foreach ($data["result"]["properties"] as $indice => $dado) {
    echo $indice . " => ". $dado. "<br>";
}

?>
<!--<!DOCTYPE html>-->
<!--<html lang="pt-br">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>Resposta da API</title>-->
<!--</head>-->
<!--<body>-->
<!--<h1>Detalhes do Personagem</h1>-->
<!---->
<?php //if ($teste !== false): ?>
<!--    <h2>Dados de Luke Skywalker (Personagem 1):</h2>-->
<!--    <table border="1">-->
<!--        <tr>-->
<!--            <th>Campo</th>-->
<!--            <th>Valor</th>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>Nome</td>-->
<!--            <td>--><?php //echo htmlspecialchars($data["description"]); ?><!--</td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>Altura</td>-->
<!--            <td>--><?php //echo htmlspecialchars($data['height']); ?><!--</td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>Cor dos Olhos</td>-->
<!--            <td>--><?php //echo htmlspecialchars($data['eye_color']); ?><!--</td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>Ano de Nascimento</td>-->
<!--            <td>--><?php //echo htmlspecialchars($data['birth_year']); ?><!--</td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>Sexo</td>-->
<!--            <td>--><?php //echo htmlspecialchars($data['gender']); ?><!--</td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>Planeta de Origem</td>-->
<!--            <td><a href="--><?php //echo htmlspecialchars($data['homeworld']); ?><!--" target="_blank">Link para Planeta</a></td>-->
<!--        </tr>-->
<!--    </table>-->
<?php //else: ?>
<!--    <p>Erro ao obter dados da API.</p>-->
<?php //endif; ?>
<!--</body>-->
<!--</html>-->
