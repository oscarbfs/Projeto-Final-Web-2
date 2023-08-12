<?php
include '../configs/dataBase.php';

class FarmService extends IFarmService {
    private $dbManager;

    public function __construct(DatabaseConnection $dbManager) {
        $this->dbManager = $dbManager;
    }

    public function search($farmId, $farmName) {
    }
    
    public function create(CreateFarmCommand $command) {
        $conn = $this->dbManager->getConnection();
        $query = $command->generateInsertQuery();
        
        if ($conn->query($query) === TRUE) {
            return true; // Successfully created
        } else {
            return false; // Error creating record
        }
    }

    public function update(UpdateFarmCommand $command) {
        $conn = $this->dbManager->getConnection();
        $query = $command->generateUpdateQuery();
        
        if ($conn->query($query) === TRUE) {
            return true; // Successfully created
        } else {
            return false; // Error creating record
        }
    }

    public function delete(DeleteFarmCommand $command) {
        $conn = $this->dbManager->getConnection();
        $query = $command->generateDeleteQuery();
        
        if ($conn->query($query) === TRUE) {
            return true; // Successfully created
        } else {
            return false; // Error creating record
        }
    }
}
?>
