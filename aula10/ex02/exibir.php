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
        $n1 = filter_input(INPUT_POST, 'n1')??0;

        $i = 0;

        do{
            echo "$n1 x $i = ".($n1*$i)."<br>";
            $i++;
        }while($i<=10);
    ?>
    <button><a href="tabuada.html">Voltar</a></button>
</div>
</body>
</html>