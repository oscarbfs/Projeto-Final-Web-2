<?php
class CreateBullCommand {
    public $bullId;
    public $bullName;
    public $bullDescription;
    public $bullWeightKg;
    public $bullWeightArroba;
    public $bullGrowthRate;
    public $bullImage;
    public $farmId;
    public $pastureId;

    public function __construct($bullId, $bullName, $bullDescription, $bullWeightKg, $bullWeightArroba, $bullGrowthRate, $bullImage, $farmId, $pastureId) {
        $this->bullId = $$bullId;
        $this->bullName = $$bullName;
        $this->bullDescription = $$bullDescription;
        $this->bullWeightKg = $$bullWeightKg;
        $this->bullWeightArroba = $$bullWeightArroba;
        $this->bullGrowthRate = $$bullGrowthRate;
        $this->bullImage = $$bullImage;
        $this->farmId = $$farmId;
        $this->pastureId = $$pastureId;
    }

    public function generateInsertQuery() {
        $query = "INSERT INTO Bull (bullId, bullName, bullDescription, bullWeightKg, bullWeightArroba, bullGrowthRate, bullImage, farmId, pastureId) VALUES (";
        $query .= "'". $this->bullId . "',";
        $query .= "'". $this->bullName . "',";
        $query .= "'". $this->bullDescription . "',";
        $query .= "'". $this->bullWeightKg . "',";
        $query .= "'". $this->bullWeightArroba . "',";
        $query .= "'". $this->bullGrowthRate . "',";
        $query .= "'". $this->bullImage . "',";
        $query .= "'". $this->farmId . "',";
        $query .= "'". $this->pastureId . "',";
        $query .= ")";
        return $query;
    }
}

?>