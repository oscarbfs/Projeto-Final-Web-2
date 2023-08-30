<?php

require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/domain/abstracts/templates/process/delete_process_template.php';
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/ui/business/farm_business.php'; 

class DeleteFarmProcess extends DeleteProcessTemplate {

    protected function performDelete($farmId, $farmImage) {
        $farmBusiness = new FarmBusiness();

        $deleteFarmCommand = new DeleteFarmCommand(
            $farmId, 
        );

        if ($farmBusiness->deleteFarm($deleteFarmCommand)) {
            
            if (file_exists($farmImage)) {
                unlink($farmImage);
            }

            $deleteResult = [
                'success' => true,
                'message' => 'Fazenda deletada com sucesso.'
            ];
        } else {
            $deleteResult = [
                'success' => false,
                'message' => 'Ocorreu um erro, fazenda não deletada'
            ];
        }
        return $deleteResult;
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

$deleteProcess = new DeleteFarmProcess();
$farmId = $_GET['farmId'];
$farmImage = $_GET['farmImage'];

$deleteProcess->deleteFarm($farmId, $farmImage);
?>
