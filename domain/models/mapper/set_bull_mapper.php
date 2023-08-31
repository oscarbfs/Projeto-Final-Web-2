<?php
class SetBullMapper {

     public $bullId;
     public $bullName;
     public $bullDescription;
     public $bullWeightKg;
     public $bullImage;
     public $farmId;
     public $pastureId;

    public function __construct($bullId, $bullName, $bullDescription, $bullWeightKg, $bullImage, $farmId, $pastureId) {
        $this->bullId = $bullId;
        $this->bullName = $bullName;
        $this->bullDescription = $bullDescription;
        $this->bullWeightKg = $bullWeightKg;
        $this->bullImage = $bullImage;
        $this->farmId = $farmId;
        $this->pastureId = $pastureId;
    }

    public static function fromJson($json) {
        $data = json_decode($json, true);

        $bullId = $data['bullId'];
        $bullName = $data['bullName'];
        $bullDescription = $data['bullDescription'];
        $bullWeightKg = $data['bullWeightKg'];
        $bullImage = $data['bullImage'];
        $farmId = $data['farmId'];
        $pastureId = $data['pastureId'];

        return new self($bullId, $bullName, $bullDescription, $bullWeightKg, $bullImage, $farmId, $pastureId);
    }
}

?>