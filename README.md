<h1 align="center">Sistema de Salário</h1>
<p align="center">Uma calculadora de salários sob comissão com o uso de porcentagens</p>
<p align="center">
  <img alt="Exemplo" src="docs/Exemplo.gif" />
</p>
<br />

## Sobre

Este trabalho avaliativo de PHP da disciplina de Programação Web II envolve o cálculo de salários, utilizando porcentagens no contexto de ganhos sob comissão.

## A atividade

Todos os vendedores de uma loja possuem um salário mínimo de R$ 1927,02 e, com a nova implementação de um sistema de meritocracia, todos possuem uma meta de vendas semanais de R$ 20.000 (R$ 80.000 por mês), que é adicionada ao salário mínimo.

- Todas as semanas que alcançaram R$ 20.000 em vendas recebem 1% do valor das vendas;
- Todas as semanas que ultrapassaram R$ 20.000 recebem 1% de 20.000 + 5% do excedente;
- Semanas que não alcançaram R$ 20.000 não recebem bônus.

Caso a meta de todas as semanas tenha sido alcançada, um bônus de 10% sobre o excedente do mês é aplicado. Caso apenas 1 semana não tenha alcançado a meta de R$ 20.000, o bônus do mês não é aplicado.

Ao final, o programa exibe na tela, o salário que o vendedor receberá no mês, com base nos valores introduzidos.

## Os cálculos

Todo o cálculo de lucro semanal é feito em apenas 8 linhas, enquanto o lucro mensal é calculado em apenas 2.

O programa armazena as vendas das 4 semanas em suas próprias variáveis, e depois as adiciona em uma array chamada `semanas` e as soma em uma variável chamada `mês`. Além disso, uma variável `bonusMensal` é inicializada como `true` e o `salário` é definido com o valor inicial de 1927.02, como é possível analisar nas linhas 51 a 54:
```php
$weeks = [ $week1, $week2, $week3, $week4 ];
$month = $week1 + $week2 + $week3 + $week4;
$monthBonus = true; 
$salary = 1927.02;
```

Nas linhas 59 a 66, o salário das vendas semanais é calculado. O código itera sobre cada semana da array `semanas` e verifica seu valor. Se ele for menor que 20000, o bônus mensal é desativado, ao tornar a variável `bonusMensal` como `false`.

No entanto, se seu valor for maior, ele adiciona R$ 200 ao salário (1% de 2000), além de 5% do seu excedente. Caso o valor seja exatamente 20000, o código estará calculando 5% de 0, portanto não há problemas em colocar as duas operações uma após a outra.
```php
foreach ($weeks as $week) {
    if ($week < 20000) {
        $monthBonus = false;
    } else {
        $salary += 200;
        $salary += ($week - 20000) * 0.05;
    }
}
```

Para o cálculo do valor mensal, apenas as linhas 68 e 69 são necessárias. Caso o `bonusMensal` seja `true`, o valor de 10% do excedente do mês é adicionado ao salário.

> [!NOTE]
> Esta parte apenas é executada caso o código que o define como `false` não tenha sido atingido, o que deixa implícito que nenhuma semana teve lucros menores do que R$ 20.000, pois essa é a condição que é definida no bloco anterior.

```php
if ($monthBonus)
    $salary += ($month - 80000) * 0.1;
```

## Tecnologias utilizadas

- ✅ PHP
- ✅ HTML
- ✅ CSS

## Fontes consultadas

- [Governador confirma novo Piso Regional do Paraná](https://www.aen.pr.gov.br/Noticia/Maior-do-Brasil-governador-confirma-novo-Piso-Regional-que-vai-de-R-18-mil-R-21-mil) (Agência Estadual de Notícias)
- [foreach - Manual](https://www.php.net/manual/pt_BR/control-structures.foreach.php) (PHP)
- [PSR-12: Extended Coding Style](https://www.php-fig.org/psr/psr-12/) (PHP-FIG)