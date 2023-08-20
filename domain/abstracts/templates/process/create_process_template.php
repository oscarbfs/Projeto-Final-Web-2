<?php
abstract class CreateProcessTemplate {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function create($command) {
        $this->validateData($command);
        $query = $this->generateInsertQuery($command);
        $this->executeQuery($query);
        $this->postCreateHook($command);
    }

    protected function validateData($command) { }
    protected abstract function generateInsertQuery($command);
    protected function executeQuery($query) { }
    protected function postCreateHook($command) { }
}
?>
