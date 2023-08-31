<?php
class CreateBullCommand {
    public $bullName;
    public $bullDescription;
    public $bullWeightKg;
    public $bullImage;
    public $farmId;
    public $pastureId;

    public function __construct($bullName, $bullDescription, $bullWeightKg, $bullImage, $farmId, $pastureId) {
        $this->bullName = $$bullName;
        $this->bullDescription = $$bullDescription;
        $this->bullWeightKg = $$bullWeightKg;
        $this->bullImage = $$bullImage;
        $this->farmId = $$farmId;
        $this->pastureId = $$pastureId;
    }

    public function generateInsertQuery() {
        $query = "INSERT INTO Bull (bullName, bullDescription, bullWeightKg, bullWeightArroba, bullGrowthRate, bullImage, farmId, pastureId) VALUES (";
        $query .= "'". $this->bullName . "',";
        $query .= "'". $this->bullDescription . "',";
        $query .= "'". $this->bullWeightKg . "',";
        $query .= "'". $this->bullImage . "',";
        $query .= "'". $this->farmId . "',";
        $query .= "'". $this->pastureId . "',";
        $query .= ")";
        return $query;
    }
}

?>