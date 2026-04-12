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
    $msg = "";
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $matricula = $_POST["matricula"];
            $arqAluno = fopen("alunos.txt", "r") or die("Arquivo nao encontrado");
            fgets($arqAluno);
            while(!feof($arqAluno)){
                $linha = fgets($arqAluno);
                $colunaDados = explode(";", $linha);
                if($colunaDados[0] == $matricula){
                    echo("{$colunaDados[0]};{$colunaDados[1]};{$colunaDados[2]}");
                    $msg = "Aluno encontrado";
                    break;
                }else{
                    $msg = "Aluno nao encontrado";
                }
            }
            fclose($arqAluno);
        }
    ?>
    <form action="buscarAluno.php" method="post">
    
        <h5>Procurar Aluno</h5>
        <label for="imat">Matricula</label>
        <input type="number" name="matricula" id="imat">
        <input type="submit" value="Procurar">
        <br>
        <?php echo($msg); ?> 
</form>
</div>
</body>
</html>