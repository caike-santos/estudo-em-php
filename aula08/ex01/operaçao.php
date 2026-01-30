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
        $n1 = filter_input(INPUT_POST, 'n1') ?? 0;
        $op = filter_input(INPUT_POST, 'op') ?? 1;

        switch ($op){
            case 1:
                $res = $n1*2;
               break; 
            case 2:
                $res = pow($n1, 3);
                break;
            case 3:
                $res = sqrt($n1);        
        }

        echo"O resultado foi: $res<br>";

    ?>
    <button><a href="cal.html">Voltar</a></button>
</div>
</body>
</html>