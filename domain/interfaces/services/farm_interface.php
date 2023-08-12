<?php
abstract class IFarmService {
    abstract public function search($farmId, $farmName);
    abstract public function create($command);
    abstract public function update($command);
    abstract public function delete($command);
}

?>