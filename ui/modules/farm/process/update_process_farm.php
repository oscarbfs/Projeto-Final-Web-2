<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/domain/abstracts/templates/process/update_process_template.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/ui/business/farm_business.php'; 

class UpdateFarmProcess extends UpdateProcessTemplate {
    protected function validateData($postData) {
        if (empty($postData['farmName'])) {
            $validationResult = [
                'success' => false,
                'message' => 'Por favor, preencha todos os campos obrigatórios.'
            ];
        } else {
            $validationResult = [
                'success' => true,
                'message' => 'Dados validados com sucesso.'
            ];
        }
    
        return $validationResult;
    }
    
    protected function performUpdate($postData) {
        $farmBusiness = new FarmBusiness();

        $oldFarmImage = $postData['oldFarmImage']; 
        $farmId = $postData['farmId'];
        $farmName = $postData['farmName'];
        $farmDescription = $postData['farmDescription'];
        
        if (isset($_FILES['farmImage']) && $_FILES['farmImage']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/uploads/';
            $uploadFile = $uploadDir . basename($_FILES['farmImage']['name']);
            
            
            if (move_uploaded_file($_FILES['farmImage']['tmp_name'], $uploadFile)) {
                
                $updateFarmCommand = new UpdateFarmCommand(
                    $farmId, 
                    $farmName, 
                    $farmDescription, 
                    $uploadFile 
                );

                if ($farmBusiness->updateFarm($updateFarmCommand)) {
                    
                    if (file_exists($oldFarmImage)) {
                        unlink($oldFarmImage);
                    }

                    $updateResult = [
                        'success' => true,
                        'message' => 'Fazenda atualizada com sucesso.'
                    ];
                } else {
                    $updateResult = [
                        'success' => false,
                        'message' => 'Ocorreu um erro, fazenda não atualizada'
                    ];
                }
            } else {
                $updateResult = [
                    'success' => false,
                    'message' => 'Erro ao mover o arquivo para o servidor.'
                ];
            }
        } else {
            $updateFarmCommand = new UpdateFarmCommand(
                $farmId, 
                $farmName, 
                $farmDescription, 
                $oldFarmImage 
            );

            if ($farmBusiness->updateFarm($updateFarmCommand)) {
                $updateResult = [
                    'success' => true,
                    'message' => 'Fazenda atualizada com sucesso.'
                ];
            } else {
                $updateResult = [
                    'success' => false,
                    'message' => 'Ocorreu um erro, fazenda não atualizada'
                ];
            }
        }

        return $updateResult;
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
        header('Location: ../../main/tabs/main_tab.php?pagina=farm');
    }
}

$updateProcess = new UpdateFarmProcess();
$postData = $_POST;

$updateProcess->update($postData);
?>
