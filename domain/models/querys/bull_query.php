<?php
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/domain/models/mapper/set_bull_mapper.php';
class GetBullQuery {
    private $bull;
    private $success;

    public function __construct($bull, $success) {
        $this->bull = $bull;
        $this->success = $success;
    }

    public static function fromDatabaseResponse($databaseResponse) {
        $bull = [];
        $success = false;
    
        if ($databaseResponse !== null) {
            $success = true;
    
            while ($row = $databaseResponse->fetch_assoc()) {
                $farm = SetBullMapper::fromJson(json_encode($row));
                $bull[] = $farm;
            }
        }
    
        return new self($bull, $success);
    }

    public function getSucess() {
        return $this->success;
    }

    public function getBulls() {
        return $this->bull;
    }
}

?>