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
        function somamult():int{
            $v = func_get_args();
            $t = func_num_args();

            $s = 0;

            for($i=0; $i<$t; $i++){
                $s += $v[$i];
                if($i == ($t-1)){
                    echo "$v[$i] = ";
                }else{
                echo "$v[$i] + ";
                }
            }

            return $s;
        }

        echo somamult(4, 8, 7, 40, 8, 3);
    ?>
</div>
</body>
</html>