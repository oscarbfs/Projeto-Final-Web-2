<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/domain/abstracts/templates/process/create_process_template.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/ui/business/pasture_business.php';

class CreatePastureProcess extends CreateProcessTemplate {
    protected function validateData($postData) {
        if (empty($postData['pastureName'])) {
            $validationResult = [
                'success' => false,
                'message' => 'Por favor, preencha todos os campos obrigatórios.'
            ];
        } else if (empty($postData['pastureStatus'])) {
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
        $pastureBusiness = new PastureBusiness();
        
        if (isset($_FILES['pastureImage']) && $_FILES['pastureImage']['error'] === UPLOAD_ERR_OK) {

            $uploadDir = '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/uploads/';
            $uploadFile = $uploadDir . basename($_FILES['pastureImage']['name']);
            
            if (move_uploaded_file($_FILES['pastureImage']['tmp_name'], $uploadFile)) {
                require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/infra/configs/session.php';
                $sessionManager = SessionManager::getInstance();
                $selectedFarmId = $sessionManager->getSelectedFarmId();
                
                $createPastureCommand = new CreatePastureCommand(
                    $selectedFarmId,
                    $postData['pastureName'], 
                    $postData['pastureDescription'], 
                    $postData['pastureStatus'], 
                    $uploadFile, 
                );
                
                if ($pastureBusiness->createPasture($createPastureCommand)) {
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
        header('Location: ../../main/tabs/main_tab.php?pagina=pasture');
    }
}

$createProcess = new CreatePastureProcess();
$postData = $_POST;

$createProcess->create($postData);
?>
