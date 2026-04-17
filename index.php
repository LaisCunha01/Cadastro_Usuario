<?php
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? "";
    $email = $_POST["email"] ?? "";
    $telefone = $_POST["telefone"] ?? "";
    $senha = $_POST["senha"] ?? "";

    // Exemplo simples (NUNCA salve senha sem criptografia em produção)
    if ($nome && $email && $telefone && $senha) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Aqui você poderia salvar no banco de dados

        $mensagem = "Usuário cadastrado com sucesso!";
    } else {
        $mensagem = "Preencha todos os campos.";
    }
}
?>

<!DOCTYPE html> 
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área de Cadastro</title>
    <link rel="icon" href="imagens/cadastro.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Cadastro de Usuário</h1>
        <p>Preencha o formulário abaixo:</p>

        <form method="POST" action="">
            <div class="input-group">
                <label for="nome">Nome Completo</label>
                <input type="text" name="nome" id="nome" required>
            </div>

            <div class="input-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="input-group">
                <label for="telefone">Telefone</label>
                <input type="tel" name="telefone" id="telefone" required>
            </div>

            <div class="input-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" required>
            </div>

            <button type="submit">Cadastrar</button>
        </form>

        <div id="mensagem">
            <?php echo $mensagem; ?>
        </div>
    </div>

</body>
</html>