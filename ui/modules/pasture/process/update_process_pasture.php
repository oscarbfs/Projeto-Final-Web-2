<?php

require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/domain/abstracts/templates/process/update_process_template.php';
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/ui/business/pasture_business.php'; 

class UpdatePastureProcess extends UpdateProcessTemplate {
    protected function validateData($postData) {
        if (empty($postData['pastureName'])) {
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
        $pastureBusiness = new PastureBusiness();

        $oldPastureImage = $postData['oldPastureImage']; 
        $pastureId = $postData['pastureId'];
        $pastureName = $postData['pastureName'];
        $pastureDescription = $postData['pastureDescription'];
        $pastureStatus = $postData['pastureStatus'];
        
        if (isset($_FILES['pastureImage']) && $_FILES['pastureImage']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'C:/xampp/htdocs/ProjetoFinalWeb2/uploads/';
            $uploadFile = $uploadDir . basename($_FILES['pastureImage']['name']);
            echo $uploadFile;
            echo $oldPastureImage;
            
            
            if (move_uploaded_file($_FILES['pastureImage']['tmp_name'], $uploadFile)) {
                
                $updatePastureCommand = new UpdatePastureCommand(
                    $pastureId, 
                    $pastureName, 
                    $pastureDescription, 
                    $pastureStatus, 
                    $uploadFile 
                );

                if ($pastureBusiness->updatePasture($updatePastureCommand)) {
                    
                    if (file_exists($oldPastureImage)) {
                        unlink($oldPastureImage);
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
            $updatePastureCommand = new UpdatePastureCommand(
                $pastureId, 
                $pastureName, 
                $pastureDescription, 
                $pastureStatus,
                $oldPastureImage 
            );

            if ($pastureBusiness->updatePasture($updatePastureCommand)) {
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
        header('Location: ../../pasture/pages/detail_pasture.php?pastureId=' . $_POST['pastureId']);
    }
}

$updateProcess = new UpdatePastureProcess();
$postData = $_POST;

$updateProcess->update($postData);
?>
