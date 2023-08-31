<?php
class UpdatePastureCommand {
    private $pastureId;
    private $pastureName;
    private $pastureDescription;
    private $pastureStatus;
    private $pastureImage;

    public function __construct($pastureId, $pastureName, $pastureDescription, $pastureStatus, $pastureImage) {
        $this->pastureId = $pastureId;
        $this->pastureName = $pastureName;
        $this->pastureDescription = $pastureDescription;
        $this->pastureStatus = $pastureStatus;
        $this->pastureImage = $pastureImage;
    }

    public function generateUpdateQuery() {
        $query = "UPDATE Pasture SET ";
        $query .= "pastureName = '" . $this->pastureName . "', ";
        $query .= "pastureDescription = '" . $this->pastureDescription . "', ";
        $query .= "pastureStatus = '" . $this->pastureStatus . "', ";
        $query .= "pastureImage = '" . $this->pastureImage . "' ";
        $query .= "WHERE pastureId = " . $this->pastureId;
        return $query;
    }
}

?>