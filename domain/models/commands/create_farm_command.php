<?php
class CreateFarmCommand {
    private $farmName;
    private $farmDescription;
    private $farmImage;

    public function __construct($farmName, $farmDescription, $farmImage) {
        $this->farmName = $farmName;
        $this->farmDescription = $farmDescription;
        $this->farmImage = $farmImage;
    }

    public function generateInsertQuery() {
        $query = "INSERT INTO Farm (farmName, farmDescription, farmImage) VALUES (";
        $query .= "'" . $this->farmName . "', ";
        $query .= "'" . $this->farmDescription . "', ";
        $query .= "'" . $this->farmImage . "'";
        $query .= ")";
        return $query;
    }
}

?>