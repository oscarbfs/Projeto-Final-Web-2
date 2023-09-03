<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/domain/models/mapper/set_farm_mapper.php';
class GetFarmQuery {
    private $farms;
    private $success;

    public function __construct($farms, $success) {
        $this->farms = $farms;
        $this->success = $success;
    }

    public static function fromDatabaseResponse($databaseResponse) {
        $farms = [];
        $success = false;
    
        if ($databaseResponse !== null) {
            $success = true;
    
            while ($row = $databaseResponse->fetch_assoc()) {
                $farm = SetFarmMapper::fromJson(json_encode($row));
                $farms[] = $farm;
            }
        }
    
        return new self($farms, $success);
    }

    public function getSucess() {
        return $this->success;
    }

    public function getFarms() {
        return $this->farms;
    }
    
}


?>