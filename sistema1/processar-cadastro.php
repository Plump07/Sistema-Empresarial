<?php
include_once './include/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Verifica se o usuário já existe
    $query = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuário já existe
        header("Location: cadastro.php?erro=1");
        exit;
    } else {
        // Insere o novo usuário no banco de dados
        $query = "INSERT INTO usuarios (usuario, senha) VALUES (?, MD5(?))";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $usuario, $senha);

        if ($stmt->execute()) {
            // Cadastro bem-sucedido
            header("Location: login.php?cadastro=1");
            exit;
        } else {
            die("Erro ao cadastrar usuário: " . $conn->error);
        }
    }
}
?>