<?php
abstract class CreateElementTemplate {
    protected $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    // Método template que define a sequência de criação
    public function create($command) {
        $this->validateData($command);
        $query = $this->generateInsertQuery($command);
        $this->executeQuery($query);
        $this->postCreateHook($command);
    }

    // Hooks que as subclasses podem sobrescrever
    protected function validateData($command) { }
    protected abstract function generateInsertQuery($command);
    protected function executeQuery($query) { }
    protected function postCreateHook($command) { }
}
?>
