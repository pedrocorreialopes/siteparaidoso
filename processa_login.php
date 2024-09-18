<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);
    
    // Conectando ao banco de dados (ajuste as credenciais conforme necessário)
    $servername = "localhost";
    $username = "seu_usuario";
    $password = "sua_senha";
    $dbname = "seu_banco_de_dados";
    
    // Criando a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Verificando a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Usuário autenticado com sucesso
        $_SESSION['email'] = $email;
        echo "Login realizado com sucesso!";
        // Redirecionar para uma página protegida, por exemplo, dashboard.php
        // header("Location: dashboard.php");
    } else {
        echo "Email ou senha incorretos.";
    }

    $conn->close();
} else {
    echo "Método de requisição inválido.";
}
?>
