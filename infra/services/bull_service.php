<?php
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/domain/interfaces/services/bull_interface.php';
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/domain/models/querys/bull_query.php';

class FarmService extends IBullService {
    private $dbConnection;

    public function __construct(DBConnection $dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function search($bullId, $bullName) {
        $query = "SELECT * FROM Bull WHERE 1";
        $params = array();

        if ($bullId !== null) {
            $query .= " AND bullId = ?";
            $params[] = $bullId;
        }

        if ($bullName !== null) {
            $query .= " AND bullName LIKE ?";
            $params[] = "%$bullName%";
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
    
    public function create(CreateBullCommand $command) {
        $connection = $this->dbConnection->getConnection();
        $query = $command->generateInsertQuery();
       
        return $connection->query($query);
    }

    public function update(UpdateBullCommand $command) {
        $connection = $this->dbConnection->getConnection();
        $query = $command->generateUpdateQuery();
       
        return $connection->query($query);
    }

    public function delete(DeleteBullCommand $command) {
        $connection = $this->dbConnection->getConnection();
        $query = $command->generateDeleteQuery();
       
        return $connection->query($query);
    }
}

?>
