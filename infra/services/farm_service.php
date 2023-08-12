<?php
class FarmService extends IFarmService {
    private $dbConnection;

    public function __construct(DBConnection $dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function search($farmId, $farmName) {
        $query = "SELECT * FROM Farm WHERE 1";
        $params = array();

        if ($farmId !== null) {
            $query .= " AND farmId = ?";
            $params[] = $farmId;
        }

        if ($farmName !== null) {
            $query .= " AND farmName LIKE ?";
            $params[] = "%$farmName%";
        }

        $stmt = $this->dbConnection->getConnection()->prepare($query);

        if ($stmt) {
            if (!empty($params)) {
                $paramTypes = str_repeat('s', count($params));
                $stmt->bind_param($paramTypes, ...$params);
            }

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result) {
                return GetFarmQuery::fromDatabaseResponse($result);
            } else {
                return new GetFarmQuery([], false);
            }
        }
    }
    
    public function create(CreateFarmCommand $command) {
        $connection = $this->dbConnection->getConnection();
        $query = $command->generateInsertQuery();
       
        return $connection->query($query);
    }

    public function update(UpdateFarmCommand $command) {
        $connection = $this->dbConnection->getConnection();
        $query = $command->generateUpdateQuery();
       
        return $connection->query($query);
    }

    public function delete(DeleteFarmCommand $command) {
        $connection = $this->dbConnection->getConnection();
        $query = $command->generateDeleteQuery();
       
        return $connection->query($query);
    }
}

?>
