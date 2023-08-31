<?php
class SetPastureMapper {
    public $pastureId;
    public $farmId;
    public $pastureName;
    public $pastureDescription;
    public $pastureStatus;
    public $pastureImage;

    public function __construct($pastureId, $farmId, $pastureName, $pastureDescription, $pastureStatus, $pastureImage) {
        $this->pastureId = $pastureId;
        $this->farmId = $farmId;
        $this->pastureName = $pastureName;
        $this->pastureDescription = $pastureDescription;
        $this->pastureStatus = $pastureStatus;
        $this->pastureImage = $pastureImage;
    }

    public static function fromJson($json) {
        $data = json_decode($json, true);

        $pastureId = $data['pastureId'];
        $farmId = $data['farmId'];
        $pastureName = $data['pastureName'];
        $pastureDescription = $data['pastureDescription'];
        $pastureStatus = $data['pastureStatus'];
        $pastureImage = $data['pastureImage'];

        return new self($pastureId, $farmId, $pastureName, $pastureDescription, $pastureStatus, $pastureImage);
    }
}

?>