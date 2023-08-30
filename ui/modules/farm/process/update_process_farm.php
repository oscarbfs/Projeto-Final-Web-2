<?php

require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/domain/abstracts/templates/process/update_process_template.php';
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/ui/business/farm_business.php'; 

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

        $updateFarmCommand = new UpdateFarmCommand(
            $postData['farmId'], 
            $postData['farmName'], 
            $postData['farmDescription'], 
            $postData['farmImage'],
        );

        if ($farmBusiness->updateFarm($updateFarmCommand)) {
            $updateResult = [
                'success' => true,
                'message' => 'Fazenda editada com sucesso.'
            ];
        } else {
            $updateResult = [
                'success' => false,
                'message' => 'Ocorreu um erro, fazenda não editada'
            ];
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
        header('Location: ../../main/tabs/main_tab.php?pagina=fazenda');
    }
}

$updateProcess = new UpdateFarmProcess();
$postData = $_POST;

$updateProcess->updateFarm($postData);
?>