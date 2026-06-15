<?php
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $pergunta = $_POST["pergunta"] ?? '';
    $tipoExclusao = $_POST["tipo_exclusao"] ?? '';
    
    $arquivo = "";
    if($tipoExclusao == 'btn_alternativas') {
        $arquivo = "perguntas.txt";
    } elseif($tipoExclusao == 'btn_texto') {
        $arquivo = "perguntasTexto.txt";
    } else {
        echo json_encode(["sucesso" => false, "mensagem" => "Ação inválida."]);
        exit;
    }

    if(file_exists($arquivo)){
        $arqPerguntas = fopen($arquivo, "r");
        $copia = "";
        $encontrou = false;

        while(!feof($arqPerguntas)){
            $linha = fgets($arqPerguntas);
            if(trim($linha) == '') continue;

            $colunaDados = explode(";", $linha);
            
            if(isset($colunaDados[0]) && trim($colunaDados[0]) == trim($pergunta)){
                $encontrou = true;
            } else {
                $copia .= $linha;
            }
        }
        fclose($arqPerguntas);

        if($encontrou){
            file_put_contents($arquivo, $copia);
            echo json_encode(["sucesso" => true, "mensagem" => "Pergunta excluída com sucesso."]);
        } else {
            echo json_encode(["sucesso" => false, "mensagem" => "Nenhuma pergunta encontrada com este ID."]);
        }
    } else {
        echo json_encode(["sucesso" => false, "mensagem" => "Arquivo de perguntas não encontrado."]);
    }
} else {
    echo json_encode(["sucesso" => false, "mensagem" => "Método inválido."]);
}
?>