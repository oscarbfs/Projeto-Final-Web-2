<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/domain/abstracts/templates/process/update_process_template.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/ui/business/bull_business.php'; 

class UpdateBullProcess extends UpdateProcessTemplate {
    protected function validateData($postData) {
        if (empty($postData['bullName'])) {
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
        $bullBusiness = new BullBusiness();

        $oldBullImage = $postData['oldBullImage']; 
        $bullId = $postData['bullId'];
        $bullName = $postData['bullName'];
        $bullDescription = $postData['bullDescription'];
        $bullStatus = $postData['bullStatus'];
        
        if (isset($_FILES['bullImage']) && $_FILES['bullImage']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/uploads/';
            $uploadFile = $uploadDir . basename($_FILES['bullImage']['name']);
            echo $uploadFile;
            echo $oldBullImage;
            
            
            if (move_uploaded_file($_FILES['bullImage']['tmp_name'], $uploadFile)) {
                
                $updateBullCommand = new UpdateBullCommand(
                    $bullId, 
                    $bullName, 
                    $bullDescription, 
                    $bullStatus, 
                    $uploadFile 
                );

                if ($bullBusiness->updateBull($updateBullCommand)) {
                    
                    if (file_exists($oldBullImage)) {
                        unlink($oldBullImage);
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
            $updateBullCommand = new UpdateBullCommand(
                $bullId, 
                $bullName, 
                $bullDescription, 
                $bullStatus,
                $oldBullImage 
            );

            if ($bullBusiness->updateBull($updateBullCommand)) {
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
        header('Location: ../../bull/pages/detail_bull.php?bullId=' . $_POST['bullId']);
    }
}

$updateProcess = new UpdateBullProcess();
$postData = $_POST;

$updateProcess->update($postData);
?>
