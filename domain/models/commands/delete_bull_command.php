<?php
class DeleteBullCommand {
    private $bullId;

    public function __construct($bullId) {
        $this->bullId = $bullId;
    }

    public function generateDeleteQuery() {
        $query = "DELETE FROM Bull WHERE bullId = " . $this->bullId;
        return $query;
    }
}

?>