<?php
class UpdateFarmCommand {
    private $farmId;
    private $farmName;
    private $farmDescription;
    private $farmImage;

    public function __construct($farmId, $farmName, $farmDescription, $farmImage) {
        $this->farmId = $farmId;
        $this->farmName = $farmName;
        $this->farmDescription = $farmDescription;
        $this->farmImage = $farmImage;
    }

    public function generateUpdateQuery() {
        $query = "UPDATE Farm SET ";
        $query .= "farmName = '" . $this->farmName . "', ";
        $query .= "farmDescription = '" . $this->farmDescription . "', ";
        $query .= "farmImage = '" . $this->farmImage . "' ";
        $query .= "WHERE farmId = " . $this->farmId;
        return $query;
    }
}

?>