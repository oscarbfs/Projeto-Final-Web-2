<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/domain/models/commands/create_pasture_command.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/domain/models/commands/update_pasture_command.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/domain/models/commands/delete_pasture_command.php';

abstract class IPastureService {
    abstract public function search($pastureId, $farmId, $pastureName);
    abstract public function create(CreatePastureCommand $command);
    abstract public function update(UpdatePastureCommand $command);
    abstract public function delete(DeletePastureCommand $command);
}

?>