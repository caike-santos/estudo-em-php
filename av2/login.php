<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'aura_beauty';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro de conexão com a base de dados.']);
    exit;
}

$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$senha = isset($_POST['senha']) ? trim($_POST['senha']) : '';

if (empty($email) || empty($senha)) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Preencha todos os campos.']);
    exit;
}
 
try {
    $stmt = $pdo->prepare("SELECT id, nome_completo, senha, pontos_aura FROM usuarios WHERE email = :email LIMIT 1");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $primeiroNome = explode(' ', trim($usuario['nome_completo']))[0];

        echo json_encode([
            'sucesso' => true, 
            'mensagem' => 'Login realizado com sucesso!',
            'nome' => $primeiroNome,
            'pontos' => $usuario['pontos_aura']
        ]);
    } else {
        echo json_encode([
            'sucesso' => false, 
            'mensagem' => 'E-mail ou palavra-passe incorretos.'
        ]);
    }
} catch (PDOException $e) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro na consulta: ' . $e->getMessage()]);
}
?>