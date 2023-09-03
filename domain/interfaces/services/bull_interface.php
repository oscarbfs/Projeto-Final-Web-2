<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/domain/models/commands/create_bull_command.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/domain/models/commands/update_bull_command.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/Projeto-Final-Web-2/domain/models/commands/delete_bull_command.php';

abstract class IBullService {
    abstract public function search($bullId, $bullFarmId, $bullPastureId, $bullName);
    abstract public function create(CreateBullCommand $command);
    abstract public function update(UpdateBullCommand $command);
    abstract public function delete(DeleteBullCommand $command);
}

?>