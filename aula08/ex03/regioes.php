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
        $e = $_POST["estados"] ?? "Nada foi selecionado";

        switch($e){
            case "norte":
                echo "Regiao Norte";
                break;
            case "nordeste":
                echo "Regiao Nordeste";
                break;
            case "cento":
                echo "Regiao Centro-Oeste";
                break;
            case "sul":
                echo "Regiao Sul";
                break;
            case "suldeste":
                echo "Regiao Suldeste";
                break;
            default:
                echo "Nada foi selecionado";    

        }
    ?>
    <button><a href="estados.html">Voltar</a></button>
</div>
</body>
</html>