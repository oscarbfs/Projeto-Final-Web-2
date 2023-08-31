<?php
class CreatePastureCommand {
    private $farmId;
    private $pastureName;
    private $pastureDescription;
    private $pastureStatus;
    private $pastureImage;

    public function __construct($farmId, $pastureName, $pastureDescription, $pastureStatus, $pastureImage) {
        $this->farmId = $farmId;
        $this->pastureName = $pastureName;
        $this->pastureDescription = $pastureDescription;
        $this->pastureStatus = $pastureStatus;
        $this->pastureImage = $pastureImage;
    }

    public function generateInsertQuery() {
        $query = "INSERT INTO Pasture (farmId, pastureName, pastureDescription, pastureStatus, pastureImage) VALUES (";
        $query .= "'" . $this->farmId . "', ";
        $query .= "'" . $this->pastureName . "', ";
        $query .= "'" . $this->pastureDescription . "', ";
        $query .= "'" . $this->pastureStatus . "', ";
        $query .= "'" . $this->pastureImage . "'";
        $query .= ")";
        return $query;
    }
}

?>