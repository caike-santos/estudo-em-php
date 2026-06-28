<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'aura_beauty';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se os serviços foram enviados na URL (ex: ?servicos=1,3,5)
    if (!isset($_GET['servicos']) || empty($_GET['servicos'])) {
        // Se não vieram serviços, busca todos normalmente
        $stmt = $pdo->query("SELECT id, nome, especialidade FROM profissionais ORDER BY nome ASC");
        $profissionais = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Recebe os IDs dos serviços escolhidos
        $servicos_ids = explode(',', $_GET['servicos']);
        $qtd_servicos_exigidos = count($servicos_ids);

        // Prepara os placeholders do SQL (?, ?, ?) baseado na quantidade de serviços
        $placeholders = implode(',', array_fill(0, $qtd_servicos_exigidos, '?'));

        // LÓGICA MÁGICA: Busca profissionais que estão na tabela de ligação 
        // e conta se eles têm exatamente a mesma quantidade de serviços exigidos
        $sql = "SELECT p.id, p.nome, p.especialidade 
                FROM profissionais p
                JOIN profissional_servicos ps ON p.id = ps.profissional_id
                WHERE ps.servico_id IN ($placeholders)
                GROUP BY p.id
                HAVING COUNT(DISTINCT ps.servico_id) = ?";

        $stmt = $pdo->prepare($sql);
        
        // Junta os IDs dos serviços com a contagem final para o bind do PDO
        $params = array_merge($servicos_ids, [$qtd_servicos_exigidos]);
        $stmt->execute($params);
        
        $profissionais = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    echo json_encode(['sucesso' => true, 'dados' => $profissionais]);

} catch (PDOException $e) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro: ' . $e->getMessage()]);
}
?>