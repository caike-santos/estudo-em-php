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

$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$data_nascimento = trim($_POST['data_nascimento'] ?? '');
$username = trim($_POST['username'] ?? '');
$senha = trim($_POST['senha'] ?? '');

if (empty($nome) || empty($email) || empty($username) || empty($senha)) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Por favor, preencha os campos obrigatórios.']);
    exit;
}

try {
    $stmtVerifica = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email OR nome_usuario = :username");
    $stmtVerifica->bindParam(':email', $email);
    $stmtVerifica->bindParam(':username', $username);
    $stmtVerifica->execute();

    if ($stmtVerifica->rowCount() > 0) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'O E-mail ou Nome de Utilizador já está em uso.']);
        exit;
    }

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $stmtInsert = $pdo->prepare("INSERT INTO usuarios (nome_completo, email, telefone, data_nascimento, nome_usuario, senha) 
                                 VALUES (:nome, :email, :telefone, :data_nascimento, :username, :senha)");
    
    $stmtInsert->bindParam(':nome', $nome);
    $stmtInsert->bindParam(':email', $email);
    $stmtInsert->bindParam(':telefone', $telefone);
    $stmtInsert->bindParam(':data_nascimento', $data_nascimento);
    $stmtInsert->bindParam(':username', $username);
    $stmtInsert->bindParam(':senha', $senhaHash);

    if ($stmtInsert->execute()) {
        echo json_encode(['sucesso' => true, 'mensagem' => 'Conta criada com sucesso! Já pode iniciar sessão.']);
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao criar a conta. Tente novamente.']);
    }

} catch (PDOException $e) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro interno no servidor: ' . $e->getMessage()]);
}
?>