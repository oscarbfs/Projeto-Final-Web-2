<?php

require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/domain/abstracts/templates/process/create_process_template.php';
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/ui/business/bull_business.php';

class CreateBullProcess extends CreateProcessTemplate {
    protected function validateData($postData) {
        if (empty($postData['bullName'])) {
            $validationResult = [
                'success' => false,
                'message' => 'Por favor, preencha todos os campos obrigatórios.'
            ];
        } else if (empty($postData['bullStatus'])) {
            $validationResult = [
                'success' => false,
                'message' => 'Por favor, preencha todos os campos obrigatórios.'
            ];
        }else {
            $validationResult = [
                'success' => true,
                'message' => 'Dados validados com sucesso.'
            ];
        }
    
        return $validationResult;
    }
    

    protected function performCreate($postData) {
        $bullBusiness = new BullBusiness();
        
        if (isset($_FILES['bullImage']) && $_FILES['bullImage']['error'] === UPLOAD_ERR_OK) {

            $uploadDir = 'C:/xampp/htdocs/ProjetoFinalWeb2/uploads/';
            $uploadFile = $uploadDir . basename($_FILES['bullImage']['name']);
            
            if (move_uploaded_file($_FILES['bullImage']['tmp_name'], $uploadFile)) {
                require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/infra/configs/session.php';
                $sessionManager = SessionManager::getInstance();
                $selectedFarmId = $sessionManager->getSelectedFarmId();
                
                $createBullCommand = new CreateBullCommand(
                    $postData['bullName'], 
                    $postData['bullDescription'], 
                    $postData['bullWeightKg'], 
                    $selectedFarmId,
                    $uploadFile, 
                    $postData['bullPastureId'], 
                );
                
                if ($bullBusiness->createBull($createBullCommand)) {
                    $createResult = [
                        'success' => true,
                        'message' => 'Fazenda criada com sucesso.'
                    ];
                } else {
                    $createResult = [
                        'success' => false,
                        'message' => 'Ocorreu um erro, fazenda não criada'
                    ];
                }
            } else {
                $createResult = [
                    'success' => false,
                    'message' => 'Erro ao mover o arquivo para o servidor.'
                ];
            }
        } else {
            $createResult = [
                'success' => false,
                'message' => 'Por favor, selecione uma imagem válida.'
            ];
        }

        return $createResult;
    }

    protected function displayMessage($result) {
        $message = $result['message'];
        echo "<script>
            const messageDialog = document.getElementById('message-dialog');
            const messageText = document.getElementById('message-text');
            const closeButton = document.getElementById('close-button');

            messageText.innerText = \"$message\";
            messageDialog.style.display = 'block';

            closeButton.addEventListener('click', () => {
                messageDialog.style.display = 'none';
            });
        </script>";
    }

    protected function redirectToPreviousPage() {
        header('Location: ../../main/tabs/main_tab.php?pagina=bull');
    }
}

$createProcess = new CreateBullProcess();
$postData = $_POST;

$createProcess->create($postData);
?>
