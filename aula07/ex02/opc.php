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
        $ano = filter_input(INPUT_POST,'ano') ?? 1900;

        $idade = date('Y') - $ano;

        if($idade<16){
            $v = "nao pode votar";
        }elseif(($idade<18 || $idade>65)){
            $v = "nao é obrigado a votar";
        }else{
            $v = "é obrigado a votar";
        }

        echo "Voce tem $idade ano(s)<br>";
        echo "Voce $v";
    ?>
</div>
</body>
</html>