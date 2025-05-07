<?php
include_once './include/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Consulta ao banco de dados
    $query = "SELECT * FROM usuarios WHERE usuario = ? AND senha = MD5(?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ss", $usuario, $senha);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Login bem-sucedido
            session_start();
            $_SESSION['usuario'] = $usuario;
            header("Location: index.php");
            exit;
        } else {
            // Login falhou
            header("Location: login.php?erro=1");
            exit;
        }
    } else {
        die("Erro na preparação da consulta: " . $conn->error);
    }
}
?>