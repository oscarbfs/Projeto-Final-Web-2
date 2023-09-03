<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/infra/configs/session.php';

if (isset($_POST['farmId'])) {
    $farmId = $_POST['farmId'];
    
    $sessionManager = SessionManager::getInstance();
    
    $sessionManager->setSelectedFarmId($farmId);
    
    $response = [
        'success' => true,
        'message' => 'ID da fazenda selecionada armazenado na sessão.'
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = [
        'success' => false,
        'message' => 'ID da fazenda não fornecido.'
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
