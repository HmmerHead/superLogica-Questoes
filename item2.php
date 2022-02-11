<?php

/**
 * Para execução desse código, usar Command Line do PHP
 */


// Criando um array
$array = array();

// Inserindo números
$array = [1, 2, 3, 4, 5, 6, 7];

// Imprimindo a terceira posição
echo "Imprimindo a terceira posição \n";
var_dump($array[2]);

// Variável formatada
$arrayFormatado = implode(',', $array);

// Variável apagada
$novaVariavelCriada = $arrayFormatado;
unset($array);
unset($arrayFormatado);

// Procurar o valor 14
array_search(14, explode(',', $novaVariavelCriada));

// Busca e remoção
$novoArray = explode(',', $novaVariavelCriada);

function retornaPosicaoAnterior(int $chaveTemp, array $array): int
{
    while ($chaveTemp >= 0) {
        if ($chaveTemp == 0) {
            $posicao = 0;
            break;
        }

        if (array_key_exists(($chaveTemp - 1), $array)) {
            $posicao = $chaveTemp - 1;
            break;
        }
        $chaveTemp--;
    }
    return $posicao;
}

foreach ($novoArray as $key => $value) {
    $chaveTemp = $key;

    if  (empty($novoArray)) {
        break;
    }

    $posicao = retornaPosicaoAnterior($chaveTemp, $novoArray);

    $atual = $value;
    $anterior = $novoArray[$posicao];
    $bool = $value < $novoArray[$posicao];

    if ($value < $novoArray[$posicao]) {
        unset($novoArray[$key]);
    }
}

// Remover o último
if (!empty($novoArray)) {
    array_pop($novoArray);
}

// Conta os itens
count($novoArray);

// Inverte a ordem dos itens
array_reverse($novoArray);


?>
