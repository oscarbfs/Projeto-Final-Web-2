<?php
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/domain/interfaces/services/pasture_interface.php';
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/domain/models/querys/pasture_query.php';

class PastureService extends IPastureService {
    private $dbConnection;

    public function __construct(DBConnection $dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function search($pastureId, $farmId, $pastureName) {
        $query = "SELECT * FROM Pasture WHERE 1";
        $params = array();

        if ($pastureId !== null) {
            $query .= " AND pastureId = ?";
            $params[] = $pastureId;
        }

        if ($farmId !== null) {
            $query .= " AND farmId = ?";
            $params[] = $farmId;
        }

        if ($pastureName !== null) {
            $query .= " AND pastureName LIKE ?";
            $params[] = "%$pastureName%";
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
                return GetPastureQuery::fromDatabaseResponse($result);
            } else {
                return new GetPastureQuery([], false);
            }
        }
    }
    
    public function create(CreatePastureCommand $command) {
        $connection = $this->dbConnection->getConnection();
        $query = $command->generateInsertQuery();
       
        return $connection->query($query);
    }

    public function update(UpdatePastureCommand $command) {
        $connection = $this->dbConnection->getConnection();
        $query = $command->generateUpdateQuery();
       
        return $connection->query($query);
    }

    public function delete(DeletePastureCommand $command) {
        $connection = $this->dbConnection->getConnection();
        $query = $command->generateDeleteQuery();
       
        return $connection->query($query);
    }
}

?>
