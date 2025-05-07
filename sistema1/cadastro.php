<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Usuário</title>
  <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
  <header>
    <h1>Cadastro de Usuário</h1>
  </header>
  <main>
    <div class="container">
      <form action="processar-cadastro.php" method="POST">
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" placeholder="Digite o nome de usuário" required>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" placeholder="Digite a senha" required>
        
        <button type="submit">Cadastrar</button>
      </form>
    </div>
  </main>
</body>
</html>

<?php
if (isset($_GET['erro']) && $_GET['erro'] == 1) {
    echo "<p style='color: red; text-align: center;'>Usuário já existe. Escolha outro nome de usuário.</p>";
}
?>