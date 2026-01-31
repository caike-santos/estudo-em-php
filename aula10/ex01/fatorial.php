<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../../_css/estilo.css"/>
  <meta charset="UTF-8"/>
  <title>modelo</title>
</head>
<body>
<div>
    <?php
        $n1 = filter_input(INPUT_GET, 'n1')??0;

        $i=1;
        $f=$n1;

        do {
            $f *= ($n1-$i);
            $i++;
        }while($i<$n1);

        echo "O fatorial de $n1 é igual a $f";
    ?>
    <button><a href="calcular.html">Voltar</a></button>
</div>
</body>
</html>