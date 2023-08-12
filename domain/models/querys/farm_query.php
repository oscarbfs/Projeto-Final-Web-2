<?php
include("../mapper/set_farm_mapper.php");
class GetFarmQuery {
    private $farms;
    private $success;

    public function __construct($farms, $success) {
        $this->farms = $farms;
        $this->success = $success;
    }

    public static function fromDatabaseResponse($databaseResponse) {
        $farms = [];
        $success = false;

        if ($databaseResponse !== null) {
            $data = json_decode($databaseResponse, true);
            $success = true;

            foreach ($data as $farmData) {
                $farm = SetFarmMapper::fromJson(json_encode($farmData));
                $farms[] = $farm;
            }
        }

        return new self($farms, $success);
    }
}


?>