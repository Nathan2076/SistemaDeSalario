<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PWII - AVP I</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="style.css">
</head>
<body>
  <section>
    <h1>Sistema de salário</h1>
    <div>
      <form method="post">
        <label for="name">Nome</label><br />
        <input type="text" name="name" /><br />
        <br />
        <input type="number" step="0.01" name="week1" placeholder="Valor semana 1" />
        <input type="number" step="0.01" name="week2" placeholder="Valor semana 2" />
        <br />
        <input type="number" step="0.01" name="week3" placeholder="Valor semana 3" />
        <input type="number" step="0.01" name="week4" placeholder="Valor semana 4" /><br />
        <br />
        <input type="submit" name="submit" value="Calcular" id="submit" />
      </form>
    </div>
    <div id="message">
      <?php
          // Get user input

          $name  = filter_input(INPUT_POST, "name");
          $week1 = filter_input(INPUT_POST, "week1");
          $week2 = filter_input(INPUT_POST, "week2");
          $week3 = filter_input(INPUT_POST, "week3");
          $week4 = filter_input(INPUT_POST, "week4");

          // Guards

          if (!($name && $week1 && $week2 && $week3 && $week4)) {
              echo "Favor informar todos os dados.";
              return;
          }
        
          if ($week1 < 0 || $week2 < 0 || $week3 < 0 || $week4 < 0) {
              echo "Favor informar valores positivos.";
              return;
          }

          // Variables used
        
          $weeks = [ $week1, $week2, $week3, $week4 ];
          $month = $week1 + $week2 + $week3 + $week4;
          $monthBonus = true; 
          $salary = 1927.02;
        
          // The salary is initialized with the minimum value of R$1927.02,
          // and the additional values earned by commission are added directly.

          foreach ($weeks as $week) {
              if ($week < 20000) {
                  $monthBonus = false;
              } else {
                  $salary += 200;
                  $salary += ($week - 20000) * 0.05;
              }
          }

          if ($monthBonus)
              $salary += ($month - 80000) * 0.1;

          echo "O vendedor $name receberá R$ $salary ao final do mês.";
      ?>
    </div>
  </section>
</body>
</html>
