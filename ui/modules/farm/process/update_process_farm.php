<?php

require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/domain/abstracts/templates/process/update_process_template.php';
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/ui/business/farm_business.php'; 

class EditFarmProcess extends UpdateProcessTemplate {
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
    

    protected function performEdit($postData) {
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
        echo $result['message'];
    }

    protected function redirectToPreviousPage() {
        header('Location: ../../main/tabs/main_tab.php?pagina=fazenda');
    }
}

$updateProcess = new EditFarmProcess();
$postData = $_POST;

$updateProcess->updateFarm($postData);
?>