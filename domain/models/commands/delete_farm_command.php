<?php
class DeleteFarmCommand {
    private $farmId;

    public function __construct($farmId) {
        $this->farmId = $farmId;
    }

    public function generateDeleteQuery() {
        $query = "DELETE FROM Farm WHERE farmId = " . $this->farmId;
        return $query;
    }
}

?>