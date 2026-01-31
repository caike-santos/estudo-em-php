<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../_css/estilo.css"/>
  <meta charset="UTF-8"/>
  <title>modelo</title>
</head>
<body>
<div>
    <?php
        $n1 = filter_input(INPUT_POST, 'n1')??0;

        if($n1==2){
            $p ="É Primo";
        }else{
            for($i=2;$i<$n1;$i++){
                //echo $n1%$i."<br>";
                if(($n1%$i)==0){
                    $p = "Não é primo";
                    break;
                }
                $p ="É primo";
            }
        }
        echo $p;
    ?>
    <button><a href="primo.html">Voltar</a></button>
</div>
</body>
</html>