<?php
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $acao = $_POST['acao'] ?? '';
    $idBusca = $_POST['id'] ?? '';
    $arquivo = "perguntasTexto.txt";

    if($acao == 'buscar') {
        if(!file_exists($arquivo)) {
            echo json_encode(["sucesso" => false, "mensagem" => "Arquivo não encontrado."]);
            exit;
        }

        $arqPerguntas = fopen($arquivo, "r");
        $achou = false;

        while(!feof($arqPerguntas)){
            $linha = trim(fgets($arqPerguntas));
            if(empty($linha)) continue;

            $colunaDados = explode(";", $linha);
            
            if($colunaDados[0] == $idBusca){
                $achou = true;
                echo json_encode([
                    "sucesso" => true, 
                    "id" => $colunaDados[0], 
                    "pergunta" => $colunaDados[1], 
                    "respostaCorreta" => $colunaDados[2]
                ]);
                break;
            }
        }
        fclose($arqPerguntas);

        if(!$achou){
            echo json_encode(["sucesso" => false, "mensagem" => "Nenhuma pergunta encontrada com este ID."]);
        }
    } 
    elseif($acao == 'alterar') {
        $pergunta = str_replace(["\r", "\n", ";"], "", $_POST["pergunta"] ?? '');
        $respostaCorreta = str_replace(["\r", "\n", ";"], "", $_POST["respostaCorreta"] ?? '');

        if(!file_exists($arquivo)) {
            echo json_encode(["sucesso" => false, "mensagem" => "Arquivo não encontrado."]);
            exit;
        }

        $arqPerguntas = fopen($arquivo, "r");
        $copia = "";
        $alterado = false;

        while(!feof($arqPerguntas)){
            $linhaOriginal = fgets($arqPerguntas);
            $linhaTrim = trim($linhaOriginal);
            if(empty($linhaTrim)) continue;

            $colunaDados = explode(";", $linhaTrim);

            if($colunaDados[0] == $idBusca){
                $copia .= "$idBusca;$pergunta;$respostaCorreta\n";
                $alterado = true;
            } else {
                $copia .= $linhaOriginal;
            }
        }
        fclose($arqPerguntas);

        if($alterado) {
            file_put_contents($arquivo, $copia);
            echo json_encode(["sucesso" => true, "mensagem" => "Pergunta alterada com sucesso."]);
        } else {
            echo json_encode(["sucesso" => false, "mensagem" => "Falha ao alterar a pergunta."]);
        }
    } 
    else {
        echo json_encode(["sucesso" => false, "mensagem" => "Ação inválida."]);
    }
} else {
    echo json_encode(["sucesso" => false, "mensagem" => "Método inválido."]);
}
?>