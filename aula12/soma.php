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
        function soma($a, $b){
           $s = $a + $b;
           echo "$s<br>"; 
        }

        function soma2($a, $b): int{
            $s = $a + $b;
            return $s;
        }

        $n1 = 7;
        $n2 = 8;

        soma($n1, $n2);

        $r = soma2($n1, $n2);
        echo $r;
    ?>
</div>
</body>
</html>