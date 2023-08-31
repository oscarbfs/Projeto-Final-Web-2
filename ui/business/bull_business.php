<?php
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/infra/configs/DBConnection.php';
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/infra/services/bull_service.php';

class BullBusiness {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = DBConnection::getInstance();
    }

    public function searchBull($bullId, $farmId, $pastureId, $bullName) {
        $bullService = new BullService($this->dbConnection);
        return $bullService->search($bullId, $farmId, $pastureId, $bullName);
    }

    public function createBull(CreateBullCommand $command) {
        $bullService = new BullService($this->dbConnection);
        return $bullService->create($command);
    }

    public function updateBull(UpdateBullCommand $command) {
        $bullService = new BullService($this->dbConnection);
        return $bullService->update($command);
    }

    public function deleteBull(DeleteBullCommand $command) {
        $bullService = new BullService($this->dbConnection);
        return $bullService->delete($command);
    }
}

?>
