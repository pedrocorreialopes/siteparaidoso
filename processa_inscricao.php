
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $telefone = htmlspecialchars($_POST['telefone']);
    
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

    $sql = "INSERT INTO inscricoes (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Inscrição realizada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Método de requisição inválido.";
}
?>