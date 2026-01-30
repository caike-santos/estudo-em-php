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
        $n2 = filter_input(INPUT_POST, 'n2')??0;
        $p = filter_input(INPUT_POST, 'passo')??0;

        if(($n2-$n1)>=0){
            while($n1<=$n2){
                echo "$n1, ";
                $n1 += $p;
            }
        }else{
            while($n1>=$n2){
                echo "$n1, ";
                $n1 -= $p;
            }
        }
    ?>
    <button><a href="passar.html">Voltar</a></button>
</div>
</body>
</html>