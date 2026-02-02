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
        $v1 = [1, 2, 3, 4];

        $v2 = range(1, 10, 1);

        $v3 = [1 => "A", 3 => "B", 6 => "D"];

        $v4 = ["nome" => "Caike", "idade" => 19, "altura" => 1.83];

        $m = [[2, 3], [5, 8], [7, 6]];

        echo "<h2>Funções Vetoriais</h2><br>";
        echo "1. count():<br>";
        echo"array: ";
        foreach($v1 as $valor){
            echo "$valor, ";
        }
        echo "<br>Número de elementos: ". count($v1);

        echo "<br><br><br>";

        echo "<br>2. array_push():<br>";
        echo"array: ";
        foreach($v1 as $valor){
            echo "$valor, ";
        }
        echo "<br>Número adicionado: 7<br>";
        array_push($v1, 7);
        foreach($v1 as $valor){
            echo "$valor, ";
        }

        echo "<br><br><br>";

        echo "3. array_pop():<br>";
        echo"array: ";
        foreach($v1 as $valor){
            echo "$valor, ";
        }
        echo "<br>Número removido: 7<br>";
        array_pop($v1);
        foreach($v1 as $valor){
            echo "$valor, ";
        }

        echo "<br><br><br>";

        echo "<br>4. array_unshift():<br>";
        echo"array: ";
        foreach($v1 as $valor){
            echo "$valor, ";
        }
        echo "<br>Número adicionado no inicio: 7<br>";
        array_unshift($v1, 7);
        foreach($v1 as $valor){
            echo "$valor, ";
        }

        echo "<br><br><br>";

        echo "5. array_shift():<br>";
        echo"array: ";
        foreach($v1 as $valor){
            echo "$valor, ";
        }
        echo "<br>Número removido no inicio: 7<br>";
        array_shift($v1);
        foreach($v1 as $valor){
            echo "$valor, ";
        }

        echo "<br><br><br>";

         
        echo "6. sort():<br>";
        echo"array: ";
        $v1 = [2, 4, 1, 3];
        foreach($v1 as $valor){
            echo "$valor, ";
        }
        echo "<br>Vetor ordenado: <br>";
         echo"array: ";
        sort($v1);
        foreach($v1 as $valor){
            echo "$valor, ";
        }

        echo "<br><br><br>";

        echo "7. rsort():<br>";
        echo"array: ";
        $v1 = [2, 4, 1, 3];
        foreach($v1 as $valor){
            echo "$valor, ";
        }
        echo "<br>Vetor ordenado ao contrario: <br>";
         echo"array: ";
        rsort($v1);
        foreach($v1 as $valor){
            echo "$valor, ";
        }

        echo "<br><br><br>";

        echo "8. asort():<br>";
        $v1 = [2, 4, 1, 3];
        echo "<pre>";
        print_r($v1);
        echo "</pre>";
        echo "<br>Vetor ordenado com os indices associados: <br>";
        asort($v1);
        echo "<pre>";
        print_r($v1);
        echo "</pre>";

        echo "<br><br><br>";

        echo "9. arsort():<br>";
        $v1 = [2, 4, 1, 3];
        echo "<pre>";
        print_r($v1);
        echo "</pre>";
        echo "<br>Vetor ordenado ao contrario com os indices associados: <br>";
        arsort($v1);
        echo "<pre>";
        print_r($v1);
        echo "</pre>";

        echo "<br><br><br>";

        echo "10. ksort():<br>";
        echo "<pre>";
        print_r($v1);
        echo "</pre>";
        echo "<br>Vetor ordenado pelos indices: <br>";
        ksort($v1);
        echo "<pre>";
        print_r($v1);
        echo "</pre>";

        echo "<br><br><br>";

        echo "11. krsort():<br>";
        echo "<pre>";
        print_r($v1);
        echo "</pre>";
        echo "<br>Vetor ordenado pelos indices ao contrario: <br>";
        krsort($v1);
        echo "<pre>";
        print_r($v1);
        echo "</pre>";

        echo "<br><br><br>";



    ?>
</div>
</body>
</html>