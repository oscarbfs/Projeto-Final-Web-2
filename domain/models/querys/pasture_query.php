<?php
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/domain/models/mapper/set_pasture_mapper.php';
class GetPastureQuery {
    private $pastures;
    private $success;

    public function __construct($pastures, $success) {
        $this->pastures = $pastures;
        $this->success = $success;
    }

    public static function fromDatabaseResponse($databaseResponse) {
        $pastures = [];
        $success = false;
    
        if ($databaseResponse !== null) {
            $success = true;
    
            while ($row = $databaseResponse->fetch_assoc()) {
                $pasture = SetPastureMapper::fromJson(json_encode($row));
                $pastures[] = $pasture;
            }
        }
    
        return new self($pastures, $success);
    }

    public function getSucess() {
        return $this->success;
    }

    public function getPastures() {
        return $this->pastures;
    }
    
}


?>