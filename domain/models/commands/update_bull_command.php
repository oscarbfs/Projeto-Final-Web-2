<?php
class UpdateBullCommand {
    public $bullId;
    public $bullName;
    public $bullDescription;
    public $bullWeightKg;
    public $bullImage;
    public $pastureId;

    public function __construct($bullId, $bullName, $bullDescription, $bullWeightKg, $bullImage, $pastureId) {
        $this->bullId = $bullId;
        $this->bullName = $bullName;
        $this->bullDescription = $bullDescription;
        $this->bullWeightKg = $bullWeightKg;
        $this->bullImage = $bullImage;
        $this->pastureId = $pastureId;
    }

    public function generateUpdateQuery() {
        $query = "UPDATE Bull SET ";
        $query .= "bullName = '". $this->bullName . "',";
        $query .= "bullDescription = '". $this->bullDescription . "',";
        $query .= "bullWeightKg = '". $this->bullWeightKg . "',";
        $query .= "bullImage = '". $this->bullImage . "',";
        $query .= "pastureId = '". $this->pastureId . "'";
        $query .= "WHERE bullId = " . $this->bullId;
        return $query;
    }
}

?>