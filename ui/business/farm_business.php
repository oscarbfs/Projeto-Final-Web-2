<?php
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/infra/configs/DBConnection.php';
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/infra/services/farm_service.php';

class FarmBusiness {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = DBConnection::getInstance();
    }

    public function searchFarm($farmId, $farmName) {
        $farmService = new FarmService($this->dbConnection);
        return $farmService->search($farmId, $farmName);
    }

    public function createFarm(CreateFarmCommand $command) {
        $farmService = new FarmService($this->dbConnection);
        return $farmService->create($command);
    }

    public function updateFarm(UpdateFarmCommand $command) {
        $farmService = new FarmService($this->dbConnection);
        return $farmService->update($command);
    }

    public function deleteFarm(DeleteFarmCommand $command) {
        $farmService = new FarmService($this->dbConnection);
        return $farmService->delete($command);
    }
}

?>
