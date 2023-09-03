<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/infra/configs/DBConnection.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/infra/services/pasture_service.php';

class PastureBusiness {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = DBConnection::getInstance();
    }

    public function searchPasture($pastureId, $farmId, $pastureName) {
        $pastureService = new PastureService($this->dbConnection);
        return $pastureService->search($pastureId, $farmId, $pastureName);
    }

    public function createPasture(CreatePastureCommand $command) {
        $pastureService = new PastureService($this->dbConnection);
        return $pastureService->create($command);
    }

    public function updatePasture(UpdatePastureCommand $command) {
        $pastureService = new PastureService($this->dbConnection);
        return $pastureService->update($command);
    }

    public function deletePasture(DeletePastureCommand $command) {
        $pastureService = new PastureService($this->dbConnection);
        return $pastureService->delete($command);
    }
}

?>
