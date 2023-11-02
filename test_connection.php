<!DOCTYPE html>
<html>
<head>
	<title>Testa conexão com BD</title>
</head>
<body>
<?php
require_once __DIR__ .'/database_connection.php';

try {
    $db = new Database();
    $conec = $db->getConnection();
}catch(PDOException $e) {
    echo 'Erro ao conectar com BD: ' . $e->getMessage();
    exit;
}
echo "Conexão com o banco ".$db->getDbname() ." feita com sucesso!";
?>
</body>
</html>