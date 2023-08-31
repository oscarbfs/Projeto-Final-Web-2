<?php
class UpdateBullCommand {
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

    public function generateUpdateQuery() {
        $query = "UPDATE Bull SET ";
        $query .= "bullName = '". $this->bullName . "',";
        $query .= "bullDescription = '". $this->bullDescription . "',";
        $query .= "bullWeightKg = '". $this->bullWeightKg . "',";
        $query .= "bullWeightArroba = '". $this->bullWeightArroba . "',";
        $query .= "bullGrowthRate = '". $this->bullGrowthRate . "',";
        $query .= "bullImage = '". $this->bullImage . "',";
        $query .= "farmId = '". $this->farmId . "',";
        $query .= "pastureId = '". $this->pastureId . "'";
        $query .= "WHERE bullId = " . $this->bullId;
        return $query;
    }
}

?>