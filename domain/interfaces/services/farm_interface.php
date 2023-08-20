<?php
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/domain/models/commands/create_farm_command.php';
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/domain/models/commands/update_farm_command.php';
require_once 'C:/xampp/htdocs/ProjetoFinalWeb2/domain/models/commands/delete_farm_command.php';

abstract class IFarmService {
    abstract public function search($farmId, $farmName);
    abstract public function create(CreateFarmCommand $command);
    abstract public function update(UpdateFarmCommand $command);
    abstract public function delete(DeleteFarmCommand $command);
}

?>