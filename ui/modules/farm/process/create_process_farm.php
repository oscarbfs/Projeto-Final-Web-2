<?php

require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/domain/abstracts/templates/process/create_process_template.php';
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/ui/business/farm_business.php'; 

class CreateFarmProcess extends CreateProcessTemplate {
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
    

    protected function performCreate($postData) {
        $farmBusiness = new FarmBusiness();

        $createFarmCommand = new CreateFarmCommand(
            $postData['farmName'], 
            $postData['farmDescription'], 
            $postData['farmImage'],
        );

        if ($farmBusiness->createFarm($createFarmCommand)) {
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
        header('Location: ../../main/tabs/main_tab.php?pagina=fazenda');
    }
}

$createProcess = new CreateFarmProcess();
$postData = $_POST;

$createProcess->createFarm($postData);
?>