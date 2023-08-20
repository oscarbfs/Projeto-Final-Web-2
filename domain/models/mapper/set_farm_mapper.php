<?php
class SetFarmMapper {
    public $farmId;
    public $farmName;
    public $farmDescription;
    public $farmImage;

    public function __construct($farmId, $farmName, $farmDescription, $farmImage) {
        $this->farmId = $farmId;
        $this->farmName = $farmName;
        $this->farmDescription = $farmDescription;
        $this->farmImage = $farmImage;
    }

    public static function fromJson($json) {
        $data = json_decode($json, true);

        $farmId = $data['farmId'];
        $farmName = $data['farmName'];
        $farmDescription = $data['farmDescription'];
        $farmImage = $data['farmImage'];

        return new self($farmId, $farmName, $farmDescription, $farmImage);
    }
}

?>