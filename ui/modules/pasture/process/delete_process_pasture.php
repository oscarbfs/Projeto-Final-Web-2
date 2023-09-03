<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/domain/abstracts/templates/process/delete_process_template.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/ui/business/pasture_business.php'; 

class DeletePastureProcess extends DeleteProcessTemplate {

    protected function performDelete($pastureId) {
        $pastureBusiness = new PastureBusiness();

        $pastureImageToDelete = $pastureBusiness->searchPasture($pastureId, null, null)->getPastures()[0]->pastureImage;

        $deletePastureCommand = new DeletePastureCommand(
            $pastureId, 
        );

        if ($pastureBusiness->deletePasture($deletePastureCommand)) {
            
            if (file_exists($pastureImageToDelete)) {
                unlink($pastureImageToDelete);
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
        header('Location: ../../main/tabs/main_tab.php?pagina=pasture');
    }
}

$deleteProcess = new DeletePastureProcess();
$pastureId = $_GET['pastureId'];

$deleteProcess->delete($pastureId);
?>
