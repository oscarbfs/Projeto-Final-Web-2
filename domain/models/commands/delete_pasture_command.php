<?php
class DeletePastureCommand {
    private $pastureId;

    public function __construct($pastureId) {
        $this->pastureId = $pastureId;
    }

    public function generateDeleteQuery() {
        $query = "DELETE FROM Pasture WHERE pastureId = " . $this->pastureId;
        return $query;
    }
}

?>